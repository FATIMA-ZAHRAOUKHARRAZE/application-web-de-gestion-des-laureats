<?php
$nom="";
$duree="";
$genre="";
if(isset($_GET['id'])){   
        $id=$_GET['id'];
        if(isset($_POST['modifier'])){
                $nom=$_POST['nom'];
                $duree=$_POST['duree'];
                $genre=$_POST['genre'];
                $values=[$nom,$duree,$genre,$id];
                $m=new FormationModel();
                $m->Updateformation($values);   
                header('Location:index.php?page=formation/index');
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
    <title> Afficher Formation</title>
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
                                <label for="txtnom" id="lblnom" name="lblnom" class="form-label">nom:</label>
                                <input type="text"  class="form-control" placeholder="saisir le nom " value="<?=$formation->nom_formation ?>" name="nom">
                        
                                <label for="txtdurée" id="lbldurée" name="lbldurée" class="form-label">durée:</label>
                                <input type="number" class="form-control"  placeholder="saisir la durée" value="<?=$formation->duree_formation?>" name="duree">
                        
                                <label for="txtgenre" id="lblgenre" name="lblgenre" class="form-label">genre:</label> 
                                <input type="text" class="form-control"   placeholder="saisir le genre" value="<?=$formation->genre_formation?>" name="genre">
                        </div>
                        <div class="col-12">
                                <?php
                                        if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
                                        {
                                                ?>
                                        <button  id="btmodifier"   data-toggle="tooltip" data-placement="top" title="Modifier" class="btn" name="modifier" type="submit" ><i class="material-icons">edit</i></button>
                                        <?php
                                        }
                                ?>
                                        <a class="btn"  data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=formation/index"><i class="material-icons">arrow_back</i></a>
                        </div>
                </div>
                <div class="col-sm-1">
                </div>
        </div>
</form>
</body>
</html>