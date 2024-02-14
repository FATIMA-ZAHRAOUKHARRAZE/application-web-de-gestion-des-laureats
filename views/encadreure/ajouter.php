<?php

if( !empty($_POST))
{
    if(isset($_POST['btajouter']))
    {
                $id=$_POST['txtid'];
                $nom=$_POST["txtNom"];
                $prenom=$_POST["txtprenom"];
                $type=$_POST["txttype"];
                $values=[$id, $nom, $prenom, $type];
                $m=new EncadreureModel();
                $m->insertencadreure($values);
                header('Location:index.php?page=encadreure/index');
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
    <title> Ajouter Encadreur</title>
    <style type="text/css">
        .btn{
                background-color: #337ab7;
                color: white;
        }                 
   </style>
</head>
<body>
<form method="post" class="custom-centered" style="margin-top:140px;">
   <div class="container">
        <div class="row g-1 align-items-center">
                <div class="col-5"> 
                        <label for="txtid" id="lblid" name="lblid" class="form-label">id:</label>
                        <input type="text" class="form-control" name="txtid" placeholder="saisir le id">

                        <label for="txtNom" id="lblnom" name="lblnom" class="form-label">nom:</label>
                        <input type="text" class="form-control" name="txtNom" placeholder="saisir le nom">
                </div>
                <div class="col-2"> 
                </div>
                <div class="col-5"> 
                        <label for="txtprenom" id="lblprenom" name="lblprenom" class="form-label">prenom:</label>
                        <input type="text" class="form-control"  name="txtprenom"  placeholder="saisir le prenom">

                        <label for="txttype" id="lbltype" name="lbltype">type:</label>
                        <select name="txttype" class="form-control">
                                <option>E</option>
                                <option>S</option>
                        </select>
                </div>
                <div class="col-12">
                        <button id="btajouter" class="btn"  data-toggle="tooltip" data-placement="top" title="Ajouter"name="btajouter" type="submit"><i class="material-icons">add_box</i></button>
                        <a href="index.php?page=encadreure/index" data-toggle="tooltip" data-placement="top" title="Annuler"  class="btn"><i class="material-icons">arrow_back</i></a>
                </div> 
        </div> 
   </div>
</form>
</div>   
</body>
</html>