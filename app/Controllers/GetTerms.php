<?php namespace App\Controllers;

/**
 * GetTerms.php
 *
 * Created : 09/02/2023
 *
 * @author Umar Riaz
*/

use CodeIgniter\HTTP\Message;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\DBModel;




class GetTerms extends ResourceController{
    protected $model,  $request;
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->db = db_connect();
		$this->model = new DBModel($this->db);
		$this->request = $request;
    }

	public function userterms($email){
		$terms = $this->model->getItemMul('user_terms', ['u_email =' =>$email]);
		if($terms){
            $result = json_encode($terms,JSON_UNESCAPED_SLASHES);
            return $this->response->setHeader("Content-Type", "application/json")->setBody($result);
		}else{
            $r = [];
            $result = json_encode($r,JSON_UNESCAPED_SLASHES);
            return $this->response->setHeader("Content-Type", "application/json")->setBody($result);
        }
	}

    public function CheckPassCode()
    {
        $email = $test = $_GET['email'];
        $passcode = $test = $_GET['passcode'];
        # code...
        $r =[];
        $validUser = $this->model->getItem('user_passcode',['u_email ='=> $email, 'passcode =' => $passcode ]);

        if($validUser){
            
            $r = ['validUser' => true ];

        }else{
            $r = ['validUser' => false ];
        }

        $result = json_encode($r,JSON_UNESCAPED_SLASHES);
        return $this->response->setHeader("Content-Type", "application/json")->setBody($result);

    }
    


}

?>