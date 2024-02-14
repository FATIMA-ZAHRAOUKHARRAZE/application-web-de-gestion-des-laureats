<?php
$nom="";
$date="";
if(isset($_GET['id'])){   
        $id=$_GET['id'];
        if(isset($_POST['modifier'])){
                $nom=$_POST['nom'];
                $date=$_POST['date'];
                $values=[$nom,$date,$id];
                $m=new StatueLaureatModel();
                $m->Updatestatuelaureat($values);   
                header('Location:index.php?page=statuelaureat/index');
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
    <title>Afficher Statue Lauréat</title>
    <style type="text/css">
        .custom-centered{
                margin:0 auto;
                margin-bottom: 150px;
                margin-top: 130px;
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
                                <label for="txtnom" id="lblnom" name="lblnom">nom:</label>
                                <input type="text"  class="form-control"  placeholder="saisir le nom " value="<?=$statuelaureat->nom_statuelaureat?>" name="nom">

                                <label for="txtnom" id="lblnom" name="lblnom">date:</label>
                                <input type="date"  class="form-control"  placeholder="saisir la date  " value="<?=$statuelaureat->date_statuelaureat?>" name="date">
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
                                        <a class="btn"  data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=statuelaureat/index" ><i class="material-icons">arrow_back</i></a>
                        </div>
                </div>
                <div class="col-sm-1">
                </div>
        </div>
</form>
</body>
</html>