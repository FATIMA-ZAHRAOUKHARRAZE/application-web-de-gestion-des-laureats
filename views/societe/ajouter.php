<?php

if( !empty($_POST))
{
    if(isset($_POST['btajouter']))
    {
        $id=$_POST['txtid'];
        $nom=$_POST['txtnom'];
        $ville=$_POST['txtville'];
        $tel=$_POST['txttel'];
        $email=$_POST['txtemial'];
        $values=[$id, $nom, $ville, $tel,$email];
        $m=new SocieteModel();
        $m->insertsociete($values);
        header('Location:index.php?page=societe/index');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Ajouter Societe</title>
    <style type="text/css">
        .btn{
                background-color: #337ab7;
                color: white;
            }                 
      </style>
</head>
<body>
<form method="post" class="custom-centered" style="margin-top: 120px;">
    <div class="container">
        <div class="row g-1 align-items-center">
            <div class="col-5">  
                <label for="txtid" id="lblid" name="lblid"  class="form-label">id:</label>
                    <input type="text"  name="txtid"   class="form-control"placeholder="saisir le id ">

                    <label for="txtnom" id="lblnom" name="lblnom"  class="form-label">nom:</label>
                    <input type="text"  name="txtnom"  class="form-control"placeholder="saisir le nom ">

                    <label for="txtville" id="lblville" name="lblville" class="form-label">ville:</label>
                    <input type="text"  name="txtville" class="form-control" placeholder="saisir la ville">
                    </div>
            <div class="col-2"> 
            </div>
            <div class="col-5"> 
                    <label for="txttel" id="lbltel" name="lbltel" class="form-label">tel:</label>
                    <input type="tel"  name="txttel"  class="form-control"placeholder="saisir le tel">

                    <label for="txtemail" id="lblemail" name="lblemail" class="form-label">email:</label>
                    <input type="email"  name="txtemial" class="form-control" placeholder="saisir l'email">
                    </div>
            <div class="col-12">
                    <button id="btajouter" name="btajouter"  data-toggle="tooltip" data-placement="top" title="Ajouter"class="btn " type="submit"><i class="material-icons">add_box</i></button>
                    <a href="index.php?page=societe/index" data-toggle="tooltip" data-placement="top" title="Annuler" class="btn" class="text-light"><i class="material-icons">arrow_back</i></a>
            </div> 
        </div>  
    </div>  
</form>
</body>
</html>
