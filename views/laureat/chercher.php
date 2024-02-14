<?php
    $nombre = count($liste);

    if ( $nombre == 0 ){
        echo "<h3 style='color:#e74c3c;text-align:center'>liste vide des laureats <h3>";
    ?>
        <a class="btn" style="background-color: #337ab7;color: white; margin-left:20px" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=laureat/index"  style="margin-bottom: 20px;"><i class="material-icons">arrow_back</i></a>
     <?php
    }
        
    else
    {
        if ( $nombre == 1 )
        {
            $laureat = $liste[0];
?>
<?php
                    $nom="";
                    $email="";
                    $prenom="";
                    $datenaissance="";
                    $tel="";
                    if(!empty($_POST)){      
                        if(isset($_POST['modifier'])){
                                    $id=$laureat->id;
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
                                    if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
                                    {
                                            ?>
                                            <nav class="navbar navbar-expand-lg navbar-mainbg" >
                                                    <div class="collapse navbar-collapse">
                                                            <ul class="navbar-nav ml-auto">
                                                                    <li class="nav-item">
                                                                    <a class="nav-link"  name="" href="index.php?page=laureat/stage&id=<?= $laureat->id ?>">Stage</a>
                                                                    </li>
                                                                    <li class="nav-item ">
                                                                    <a class="nav-link" href="index.php?page=laureat/statue&id=<?= $laureat->id ?>">Statue</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                    <a class="nav-link" href="index.php?page=laureat/formation&id=<?= $laureat->id ?>">Formation</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                    <a class="nav-link" href="index.php?page=laureat/diplome&id=<?= $laureat->id ?>">Diplome</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                    <a class="nav-link" href="index.php?page=laureat/experience&id=<?= $laureat->id ?>">Experience</a>
                                                                    </li>
                                                            </ul>
                                                    </div>
                                            </nav>
                                            <?php
                                    }
                                    ?>
                    <form method="post" class="custom-centered">
                    <img src='../../projet/views/image/laureat/<?= $laureat->photo_laureat?>' style=margin-left:100px width=10%>
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
<?php
              }
        else
        {
?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <style>
                    .btn{
                    background-color: #337ab7;
                    color: white;
                                    }
                    </style>
            </head>
            <body>
                <div class='container'>
                    <div class='matable' style="margin-top: 80px;">
                        <div class="table-responsive">
                            <table  class='table table-bordered border-danger'>
                                <thead style="color:#e74c3c">
                                    <?php
                                        if(count($liste)>0){
                                            $liste_indice=array_keys((array)$liste[0]);
                                            echo "<tr style='color:#337ab7;text-align:center'>";
                                            foreach ($liste_indice as $key => $value ){
                                                if($value!='photo_laureat'){
                                                    echo"<th scope='col'>";
                                                    echo $value;
                                                    echo"</th>"; 
                                                }
                                            }
                                            echo "<th class='text-center'style='width:160px;'> Operations</th>";
                                            echo"</tr>";
                                        }
                                        ?>
                                </thead>
                                <tbody> 
                                <?php 
                                    foreach( $liste as $laureat )
                                    {
                                        echo "<tr>";
                                            echo "<td style='text-align:center'>";
                                                echo $laureat->id;
                                            echo "</td>";
                                            echo "<td style='text-align:center'>";
                                                echo $laureat->nom_laureat;
                                            echo "</td>";
                                            echo "<td style='text-align:center'>";
                                                echo $laureat->prenom_laureat;
                                            echo "</td>";
                                            echo "<td style='text-align:center'>";
                                                echo $laureat->datenaiss_laureat;
                                            echo "</td>";
                                            echo "<td style='text-align:center'>";
                                                echo $laureat->tel_laureat;
                                            echo "</td>";
                                            echo "<td style='text-align:center'>";
                                                echo $laureat->email_laureat;
                                            echo "</td>";
                                            echo'<td style="text-align:center;width:160px;">
                                                    <a class="btn" data-toggle="tooltip" data-placement="top" title="Afficher" href="index.php?page=laureat/show&id='.$laureat->id.'" ><i class="material-icons">visibility</i></a>
                                                ';
                                                if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
                                                echo'
                                                    <a class="btn" data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=laureat/delete&id='.$laureat->id.'" ><i class="material-icons">delete_forever</i></a>
                                                    ';
                                            echo' </td>';
                                        echo "</tr>";
                                    }
                                ?>
                                    <a  class="btn" href="index.php?page=laureat/index" data-toggle="tooltip" data-placement="top" title="Annuler"  style="margin-bottom: 20px;" ><i class="material-icons">arrow_back</i></a>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </body>
            </html>
<?php
        }
    }
?>