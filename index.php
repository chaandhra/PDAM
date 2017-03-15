<?php
session_start();
require_once("pegawai/model/class.user2.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('home');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$name = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$name,$upass))
	{
		$login->redirect('home');
	}
	else
	{
		$error = "Wrong Details !";
	}	
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PDAM TIRTA MEDAL</title>
<link rel="shortcut icon" href="bootstrap/image/logotirtamedal.jpg"/>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="bootstrap/css/style.css" type="text/css"  />
</head>
<body>
<style type="text/css">
body{
    background-image: url("bootstrap/image/kantor.jpg");
     background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center; 
    opacity: 0.7;
}


</style>


<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
    
        <h2 class="form-signin-heading"> PDAM Tirta Medal - Sumedang</h2><hr />
        
        <div id="error">
        <?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
			}
		?>
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" name="txt_uname_email" placeholder="Username" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" name="btn-login" class="btn btn-default">
                	<i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
            </button>
        </div>  
      	<br />
          <CENTER>Copyright - 2017</CENTER>  
      </form>

    </div>
    
</div>




</body>
</html>