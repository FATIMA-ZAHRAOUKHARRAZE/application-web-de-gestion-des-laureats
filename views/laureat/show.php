<?php
$nom="";
$email="";
$prenom="";
$datenaissance="";
$tel="";
if(isset($_GET['id'])){   
        $id=$_GET['id'];
        if(isset($_POST['modifier'])){
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $email=$_POST['email'];
                $datenaissance=$_POST['datenaissance'];
                $tel=$_POST['tel'];
                $values=[$nom,$prenom,$datenaissance,$tel,$email,$id];
                $m=new LaureatModel();
                $m->Updatelaureat($values);
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
    <title>Afficher Lauréat</title>
    <style type="text/css">
        .custom-centered{
                margin:0 auto;
                margin-bottom: 100px;
                margin-top: 40px;
        }
        .btn{
                background-color: #337ab7;
                color: white;
        }
      </style>
</head>
<body>
                       <?php
                       echo $menu;
                       ?>
<form method="post" class="custom-centered">
<img src='../../projet/views/image/laureat/<?= $laureat->photo_laureat?>' style=margin-left:50px width=7%>
   <div class="container">
        <div class="row g-1 align-items-center">
                <div class="col-5">
                                <label for="txtNom" id="lblnom" name="lblnom">nom:</label>
                                <input type="text" id="txtNom" class="form-control" placeholder="saisir le nom" value="<?=$laureat->nom_laureat?>" name="nom">

                                <label for="txtprenom" id="lblprenom" name="lblprenom">prenom:</label>
                                <input type="text" class="form-control"   placeholder="saisir le Prenom" value="<?= $laureat->prenom_laureat?>" name="prenom">
                        
                                <label for="txtdate" id="lbldate" name="lbldate">date de naissance:</label>
                                <input type="date" class="form-control"  placeholder="saisir la date de Naissance" value="<?=$laureat->datenaiss_laureat ?>" name="datenaissance">
                                </div>     
                <div class="col-2"> 
                </div>
                <div class="col-5"> 
                                
                                <label for="txttel" id="lblteltel" name="lbl" class="form-label">telephone:</label>
                                <input type="tel" class="form-control"   placeholder="saisir le telephone" value="<?=$laureat->tel_laureat?>" name="tel">
                                
                                <label for="txtemail" id="lblemail" name="lblemail"class="form-label">email:</label> 
                                <input type="email" class="form-control"  placeholder="saisir  l'email" value="<?=$laureat->email_laureat ?>" name="email">
                </div>
                <div class="col-12">
                        <?php
                                if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
                                {
                                        ?>
                                        <button  id="btmodifier"  class="btn" data-toggle="tooltip" data-placement="top" title="Modifier" name="modifier" type="submit" ><i class="material-icons">edit</i></button>
                                        <?php
                                }
                        ?>
                                <a class="btn"  data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=laureat/index" class="text-light" ><i class="material-icons">arrow_back</i></a>
                </div>
        </div>
        <div class="col-sm-1">
        </div>
   </div>
</form>
</body>
</html>



