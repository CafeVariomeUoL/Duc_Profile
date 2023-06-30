
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Duc Profiler Passcode</title>
  </head>
  <body>
    <div style="border: 1px solid #ccc; border-radius: 5px; padding: 20px; width: 400px;">
      <div style="display: flex; align-items: center; margin-bottom: 20px;">
        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('public/img/Duc_logo6.png') ?>" alt="Duc Team" style="height: 50px; margin-right: 10px;"></a> 
        <h2 style="margin: 0;">Passcode for your terms</h2>
      </div>
      <p>This passcode will require to use, edit, and delete your terms in future. Please do not share it with anyone</p>
      <p style="text-alignment:center;"><strong><?php echo $pass?></strong></p>   
    </div>
  </body>
</html>