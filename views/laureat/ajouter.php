<?php
if( !empty($_POST))
{
    if(isset($_POST['btajouter']))
    {
        $nom=$_POST["txtNom"];
        $prenom=$_POST["txtprenom"];
        $datenaissance=$_POST['txtdate'];
        $tel=$_POST['txttel'];
        $email=$_POST["txtemail"];
        $photo=$_POST['txtphoto'];
        $values=[$nom, $prenom, $datenaissance,$tel,$email,$photo];
        $m=new LaureatModel();
        $m->insertlaureat($values);
        header('Location:index.php?page=laureat/index');
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
                    <label for="txtNom" id="lblnom" name="lblnom"  class="col-form-label">nom:</label>
                    <input type="text"   id="txtNom"  class="form-control" placeholder="saisir le nom" name="txtNom">

                    <label for="txtprenom" id="lblprenom" name="lblprenom"class="col-form-label">prenom:</label>
                    <input type="text" class="form-control" name="txtprenom"  placeholder="saisir le Prenom">

                    <label for="txtdate" id="lbldate" name="lbldate"class="form-label">date de naissance:</label>
                    <input type="date" class="form-control" name="txtdate" placeholder="saisir la date de Naissance">
            </div>     
            <div class="col-2"> 
            </div>
            <div class="col-5"> 
                    <label for="txttel" id="lblteltel" name="lbl" class="form-label">telephone:</label>
                    <input type="tel" class="form-control" name="txttel"  placeholder="saisir le telephone">

                    <label for="txtemail" id="lblemail" name="lblemail"class="form-label">email:</label> 
                    <input type="email" class="form-control" name="txtemail" placeholder="saisir l'email">
                    
                    <label for="txtphoto" id="lblphoto" name="lblphoto"class="form-label">photo:</label> 
                    <input type="file" id="photo" class="form-control" name="txtphoto" placeholder="saisir l'image">
            </div>
            <div class="col-12">
                    <button id="btajouter" data-toggle="tooltip" data-placement="top" title="Ajouter" name="btajouter" type="submit" class="btn"><i class="material-icons">add_box</i></button>
                    <a href="index.php?page=laureat/index"   data-toggle="tooltip" data-placement="top" title="Annuler"class="btn"><i class="material-icons">arrow_back</i></a>
            </div> 
        </div>  
    </div>  
</form>
</body>
</html>