<?php
/**
 * @author Umar Riaz
 */
namespace App\Controllers;
use App\Models\DBModel;
use App\Libraries\SendEmail;
use CodeIgniter\HTTP\RequestInterface;

class AddCon extends BaseController
{
	protected $u_id;
	protected $p_id;
	protected $l_token;
	protected $u_email;
	protected $s_email;
	protected $u_firstname;
	protected $u_lastname;
	protected $p_email;
	// protected $u_role;

	function __construct(){
        $this->db = db_connect();
        $this->model = new DBModel($this->db);
		$this->s_email = new SendEmail();
		$this->pin_email = \Config\Services::email();
    }
	public function index()
	{
		return view('addCon/add');
	}

	public function sava_profile(){

        helper(['form', 'url']);
		if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $this->adduser();
			$p = $this->request->getVar('profile');

			$data =[
				'u_id' => $this->u_id,
				'p_name' => $this->request->getVar('p_name'),
				'pr_id' => $this->request->getVar('p_id'),
				'p_data' => $p
			];

		   $this->p_id =$this->model->insertItem('profile', $data);

		   if($this->p_id){

			$data['fname'] = $this->u_firstname;
			$data['lname'] = $this->u_lastname;
			// $data['role'] = $this->u_role;
			$data['email'] = $this->u_email;
			$data['token'] = $this->l_token;
			$data['id']=base64_encode($this->p_id);

			$this->session->set('fname', $this->u_firstname);
			$this->session->set('lname', $this->u_lastname);
			// $this->session->set('role', $this->u_role);
			$this->session->set('email', $this->u_email);
			$this->session->set('id', base64_encode($this->p_id));
			$this->session->set('previous_url', current_url());
			return view('addCon/donepage',$data);

		}

        }

		$data['fname'] = $this->session->get('fname');
		$data['lname'] =$this->session->get('lname');
		$data['role'] = $this->session->get('role');
		$data['email'] =$this->session->get('email');
		$data['id']=$this->session->get('id');

		$this->session->set('previous_url', current_url());
		return view('addCon/donepage', $data);

    }
	public function addmoredata(){

		helper(['form', 'url']);
		if ('POST' === $_SERVER['REQUEST_METHOD']) {

			$data['fname'] = $this->request->getVar('fname');
			$data['lname']= $this->request->getVar('lname');
			$data['role']= $this->request->getVar('role');
			$data['email']= $this->request->getVar('email');
			$data['id'] = $this->request->getVar('id');

		return view('addCon/add', $data);
	
	}


	}

    public function adduser(){
        helper(['form','url']);

        $fname = $this->request->getVar('u_fname');
        $lname = $this->request->getVar('u_lname');
        $email = $this->request->getVar('u_email');
        // $urole = $this->request->getVar('u_role');

        $this->u_firstname =$fname; $this->u_lastname=$lname;$this->u_email=$email;

        $where_user = [
			// 'u_fname =' => $fname,
			// 'u_lname =' => $lname,
			'u_email =' => $email,
		];

        $user_info = $this->model->getItem('userinfo', $where_user);

        if ($user_info) {
            $u_id = $user_info->{'u_id'};
			$this->u_id = $u_id;
            $link = $this->model->getItem('link', ['u_id =' => $u_id]);

            if($link){
				$t = $link->{'l_token'};
				$token_date = $link->{'created_at'};
				$token_date = strtotime($token_date) + 2592000;
				$cDate = strtotime(date('Y-m-d H:i:s'));
				if ($cDate > $token_date) {
					$this->model->deleteItems('link', ['l_token =' => $t], null, null);
					// $this->u_id = $u_id;
					$this->u_email = $user_info->{'u_email'};
					$this->addlink($u_id);
				} else {
					$this->u_email = $user_info->{'u_email'};
					$this->l_token = $t;
					$this->sendEmail($this->u_email,$this->l_token);
				}
			}else{
				$this->addlink($u_id);
			}

        }
        else {

			$user = ['u_fname' => $fname, 'u_lname' => $lname, 'u_email' => $email];
			$this->u_id= $this->model->insertItem('userinfo', $user);
			$this->u_email = $email;
			$this->addlink($this->u_id);
		}

        return $this->u_id;

    }

    public function addlink($u_id)
	{
		$tnew = $this->GenerateToken(7);
		$link = ['u_id' => $u_id, 'l_token' => $tnew];
		$this->model->insertItem('link', $link);
		$this->sendEmail($this->u_email,$tnew);
	}

    protected function flash($key, $value)
	{
		$session = session();
		$session->setFlashdata($key, $value);
		return true;
	}

	function generatePIN($digits = 4){
		$i = 0; //counter
		$pin = ""; //our default pin is blank.
		while($i < $digits){
			//generate a random number between 0 and 9.
			$pin .= mt_rand(0, 9);
			$i++;
		}
		return $pin;
	}

    function create_Token($min, $max)
	{
		$range = $max - $min;
		if ($range < 0) return $min; // not so random...
		$log = log($range, 2);
		$bytes = (int) ($log / 8) + 1; // length in bytes
		$bits = (int) $log + 1; // length in bits
		$filter = (int) (1 << $bits) - 1; // set all lower bits to 1
		do {
			$rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
			$rnd = $rnd & $filter; // discard irrelevant bits
		} while ($rnd >= $range);
		return $min + $rnd;
	}

	public function sendEmail($receiver,$token)
	{
		$this->s_email->send_email($receiver,$token);
	}
    // Saving Terms
	public function sava_terms(){
		helper(['form', 'url']);
		if ('POST' === $_SERVER['REQUEST_METHOD']) {
	      
			$data =[
				'u_email' => $this->request->getVar('email'),
				't_name' => $this->request->getVar('name'),
				'terms' => $this->request->getVar('terms'),
			];
		   $term = $this->model->insertItem('user_terms', $data);
		   if($term){

			$sp = $this->model->getItem('user_passcode', ['u_email =' =>$this->request->getVar('email')]);
			if($sp){
				$psscode = $sp->{'passcode'};
				$this->send_pin($this->request->getVar('email'), $psscode);

				$d =['pass'=> $psscode];
				$result = json_encode($d,JSON_UNESCAPED_SLASHES);
				return $this->response->setHeader("Content-Type", "application/json")->setBody($result);

			}else{
				$pin = $this->generatePIN();
				$p =[
					'u_email' => $this->request->getVar('email'),
					'passcode'=> $pin
				];
				$this->model->insertItem('user_passcode', $p);
				$this->send_pin($this->request->getVar('email'), $pin);

				$d =['pass'=> $pin];
				$result = json_encode($d,JSON_UNESCAPED_SLASHES);
				return $this->response->setHeader("Content-Type", "application/json")->setBody($result);
			}
		   }
		   
		}

	}
	// Updating Terms
	public function update_terms(){
		helper(['form', 'url']);
		if ('POST' === $_SERVER['REQUEST_METHOD']) 
		{
			$data =[
				'u_email' => $this->request->getVar('email'),
				't_name' => $this->request->getVar('name'),
				'terms' => $this->request->getVar('terms'),
			];

			$this->model->updateItem('user_terms',['id='=>$this->request->getVar('id')],$data);
			return;

		}

	}

	public function delete_terms(){
		helper(['form', 'url']);
		if ('POST' === $_SERVER['REQUEST_METHOD']) {
			// deleteItems
			$this->model->deleteItems('user_terms',['id='=>$this->request->getVar('id')]);
			return;
		}

	}
	function GenerateToken($length)
	{
		$token = "";
		$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
		$codeAlphabet .= "0123456789";
		for ($i = 0; $i < $length; $i++) {
			$token .= $codeAlphabet[$this->create_Token(0, strlen($codeAlphabet))];
		}
		return $token;
	}

	public function GetUserTerms(){
		helper(['form', 'url']);	
		$email = (string) $_GET['email'];
		$terms = $this->model->getItemMul('user_terms', ['u_email =' =>$email]);
		if($terms){
            $result = json_encode($terms,JSON_UNESCAPED_SLASHES);
            return $this->response->setHeader("Content-Type", "application/json")->setBody($result);
		}else{return "no data found";}
	}

	public function send_pin($rname,$message){
        $data =[
            'pass' => $message
        ];
        $config['protocol'] = 'ssmtp';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        // $config['smtp_host'] = 'ssl://ssmtp.gmail.com';
        $config['SMTPUser'] = 'DUC@leicester.ac.uk';
        $config['SMTPPass'] = '';
        $config['SMTPPort'] = '465';
		$config['mailType'] = 'html';
        $this->pin_email->initialize($config);
        $this->pin_email->setFrom('DUC@leicester.ac.uk', 'Duc_Profiler');
        $this->pin_email->setTo($rname);
        $this->pin_email->setSubject('Passcode for User Terms');
        $this->pin_email->setMessage(view('email/email',$data));
        $this->pin_email->send();

    }

}