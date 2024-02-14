<?php
$nom="";
$prenom="";
$type="";
if(isset($_GET['id'])){   
        $id=$_GET['id'];
        if(isset($_POST['modifier'])){
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $type=$_POST['type'];
                $values=[$nom,$prenom,$type,$id];
                $m=new EncadreureModel();
                $m->modifierencadreure($values);   
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
    <title> Afficher Encadreur</title>
    <style type="text/css">
        .custom-centered{
                margin:0 auto;
                margin-bottom: 150px;
                margin-top: 120px;
        }
        .btn{
                background-color: #337ab7;
                color: white;
        }
   </style>  
</head>
<body>
<form method="post" class="custom-centered">
   <div class="container">
        <div class="row g-1 align-items-center">
                <div class="col-5">
                        <label for="txtNom" id="lblnom" name="lblnom" class="form-label">nom:</label>
                        <input type="text" class="form-control"  placeholder="saisir le nom  " value="<?=$encadreur->nom_encadreure ?>" name="nom">
        
                        <label for="txtprenom" id="lblprenom" name="lblprenom" class="form-label">prenom:</label>
                        <input type="text" class="form-control"   placeholder="saisir le Prenom" value="<?=$encadreur->prenom_encadreure?>" name="prenom">
        
                        <label for="txttype" id="lbltype" name="lbltype">type:</label>
                        <input type="text" class="form-control"  placeholder="saisir le type" name="type" value="<?=$encadreur->type_encadreure?>">
        
                </div>
                <div class="col-12">
                        <?php
                                if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
                                {
                                        ?>
                                <button  id="btmodifier" data-toggle="tooltip" data-placement="top" title="Modifier" class="btn" name="modifier" type="submit"><i class="material-icons">edit</i></button>
                                <?php
                                }
                        ?>
                                <a class="btn"data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=encadreure/index"><i class="material-icons">arrow_back</i></a>
                </div>
        </div>
        <div class="col-sm-1">
        </div>
    </div>
</form>
</body>
</html>