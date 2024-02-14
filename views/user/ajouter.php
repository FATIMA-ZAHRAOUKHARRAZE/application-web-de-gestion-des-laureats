<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if( !empty($_POST))
{
    if(isset($_POST['btajouter']))
    {
        $email=$_POST["txtusername"];
        $sql="select * from users where email =?";
		$model=new UserModel();
		$res=$model->requete( $sql,[$email]);
		$user=$model->getOne($res);
        if ($user )
        {
            echo "se compte est deja pris";
        }
        else{
            $nom=$_POST["txtNom"];
            $prenom=$_POST["txtprenom"];
            $password =password_hash( $_POST['txtpassword'], PASSWORD_BCRYPT );
            $username=$_POST['txtusername'];
            $role=$_POST["txtrole"];
            $values=[$username,$password,$nom, $prenom, $role];
            $m=new UserModel();
            $m->insertuser($values);
            header('Location:index.php?page=user/profil');
        }
       
    }
}
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Ajouter Laureat</title>
    <style type="text/css">
        .btn{
            background-color: #337ab7;
            color: white;
        }                   
    </style>
</head>
<body>
<form method="post" class="custom-centered" style="margin-top:90px;">
    <div class="container">
        <div class="row g-1 align-items-center">
            <div class="col-5" style="margin-top:20px;">

                     <label for="txtusername" id="lblusername" name="lblusername"class="form-label">email:</label>
                    <input type="text" class="form-control" name="txtusername" placeholder="saisir username">

                    <label for="txtpassword" id="lblpassword" name="lblpassword" class="form-label">password:</label>
                    <input type="password" class="form-control" name="txtpassword"  placeholder="saisir le telephone">

                    <label for="txtNom" id="lblnom" name="lblnom"  class="col-form-label">nom:</label>
                    <input type="text"   id="txtNom"  class="form-control" placeholder="saisir le nom" name="txtNom">   
            </div>     
            <div class="col-2"> 
            </div>
            <div class="col-5"> 

                    <label for="txtprenom" id="lblprenom" name="lblprenom"class="col-form-label">prenom:</label>
                    <input type="text" class="form-control" name="txtprenom"  placeholder="saisir le Prenom">


                    <label for="txtrole" id="lblrole" name="lblrole"class="form-label">role:</label> 
                    <input type="text" class="form-control" name="txtrole" placeholder="saisir l'email">
            </div>
            <div class="col-12">
                    <button id="btajouter" data-toggle="tooltip" data-placement="top" title="Ajouter" name="btajouter" type="submit" class="btn"><i class="material-icons">add_box</i></button>
                    <a href="index.php?page=user/profil" data-toggle="tooltip" data-placement="top" title="Annuler" class="btn"><i class="material-icons">arrow_back</i></a>
            </div> 
        </div>  
    </div>  
</form>
</body>
</html>