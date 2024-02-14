<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_POST['email']))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="select * from users where email =?";
		$model=new UserModel();
		$res=$model->requete( $sql,[$email]);
		$user=$model->getOne($res);
		
        if ($user )
        {
            if ($user && password_verify($password, $user->password))
            {

				$_SESSION['logged']=true;
                $_SESSION['email']=$user->email;
				$_SESSION['role']=$user->role;
				header('Location: index.php?page=user/profil');
            }
            else
            {
                echo "Impossible de se connecter";
            }
        }
        else
        {
            echo "Impossible de se connecter";
        }
	}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="views/user/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<div class="img">
			<img src=" views/user/img/authentication.svg">
		</div>
		<div class="login-content">
			<form method="post">
				<img src="views/user/img/avatar.png">
				<h2 class="title" >BIENVENUE</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
					  <h5>Email</h5>
           		   		<input type="text" class="input" name="email">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password">
            	   </div>
            	</div>
            	
            	<input type="submit" class="btn" value="Se Connecter">
				
            </form>
        </div>
    </div>
    <script type="text/javascript" src="views/user/js/main.js"></script>
</body>
</html>