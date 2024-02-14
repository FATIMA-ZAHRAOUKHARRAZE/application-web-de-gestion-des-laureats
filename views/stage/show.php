<?php
$intitule="";
$datedebut="";
$datefin="";
$note="";
if(isset($_GET['id'])){   
        $id=$_GET['id'];
        if(isset($_POST['modifier'])){
                $intitule=$_POST['intitule'];
                $datedebut=$_POST['datedebut'];
                $datefin=$_POST['datefin'];
                $note=$_POST['note'];
                $values=[$intitule,$datedebut,$datefin,$note,$id];
                $m=new StageModel();
                $m->Updatestage($values);   
                header('Location:index.php?page=STAGE/index');
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
    <title>Afficher Stage</title>
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
<body>
<form method="post" class="custom-centered">
        <div class="container">
                <div class="row g-1 align-items-center">
                <div class="col-5">
                        <label for="txtintitulé" id="lblintitulé" name="lblintitulé" class="form-label">intitulé:</label>
                        <input type="text"  class="form-control"  placeholder="saisir l'intitulé " value="<?=$stage->intitule_stage ?>" name="intitule">
                        
                        <label for="txtdatedebut" id="lbldatedebut" name="lbldatedebut" class="form-label">date debut:</label>
                        <input type="date" class="form-control"  placeholder="saisir le date debut"value="<?=$stage->datedebut?>" name="datedebut">
                </div>  
                <div class="col-2"> 
                </div>
                <div class="col-5"> 
                        <label for="txtdatefin" id="lbldatefin" name="lbldatefin"  class="form-label">date fin:</label>
                        <input type="date" class="form-control"  placeholder="saisir le  date fin" value="<?=$stage->datefin ?>" name="datefin">

                        <label for="txtnote" id="lblnote" name="lblnote" class="form-label">note:</label> 
                        <input type="text" class="form-control" name="note" placeholder="saisir le  note" value="<?=$stage->note ?>">
                </div>
                <div class="col-12">
                        <?php
                                if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
                                {
                                        ?>
                                <button  id="btmodifier"  data-toggle="tooltip" data-placement="top" title="Modifier" class="btn" name="modifier" type="submit"><i class="material-icons">edit</i></button>
                                <?php
                        }
                                ?>
                                <a class="btn"  data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=stage/index" class="text-light"><i class="material-icons">arrow_back</i></a>
                </div>
        <div class="col-sm-1">
        </div>
        </div>
</form>
</body>
</html>