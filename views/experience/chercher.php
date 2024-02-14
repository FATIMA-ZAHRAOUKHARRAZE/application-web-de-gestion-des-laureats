<?php
    $nombre = count($liste);

    if ( $nombre == 0 )
    {
       echo "<h3 style='color:#e74c3c;text-align:center'>liste vide des experiences<h3>";
       ?>
        <a class="btn" style="background-color: #337ab7;color: white; margin-left:20px" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=experience/index"  style="margin-bottom: 20px;"><i class="material-icons">arrow_back</i></a>
     <?php
    }
    else
    {
        if ( $nombre == 1 )
        {
            $experience = $liste[0];
?>
<?php
                        $nom="";
                        $duree="";
                        if(!empty($_POST)){      
                            if(isset($_POST['modifier'])){
                                        $id=$experience->id;
                                        $nom=$_POST['nom'];
                                        $duree=$_POST['duree'];
                                        $values=[$nom,$duree,$id];
                                        $m=new ExperienceModel();
                                        $m->Updateexperience($values);   
                                        header('Location:index.php?page=experience/index');
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
                <title> Afficher Experience</title>
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
                                            <label for="txtNom" id="lblnom" name="lblnom" class="form-label">nom:</label>
                                            <input type="text"  class="form-control"  placeholder="saisir le nom" value="<?=$experience->nom_experience ?>" name="nom">

                                            <label for="txtduree" id="lblduree" name="lblduree"  class="form-label">duree:</label>
                                            <input type="text" class="form-control"   placeholder="saisir la duree" value="<?=$experience->duree_experience?>" name="duree">
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
                                            <a class="btn" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=experience/index" ><i class="material-icons">arrow_back</i></a>
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
                <title>Tableau Experience</title>
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
                                                echo"<th scope='col'>";
                                                echo $value;
                                                echo"</th>";
                                            }
                                            echo "<th class='text-center'style='width:160px;'>Operations</th>";
                                            echo"</tr>";
                                        }
                                    ?>
                                </thead>
                                <tbody>
                                    <?php
                                            foreach( $liste as $experience )
                                            {
                                                echo "<tr>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $experience->id;
                                                    echo "</td>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $experience->nom_experience;
                                                    echo "</td>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $experience->duree_experience;
                                                    echo "</td>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $experience->idlaureat;
                                                    echo "</td>";
                                                    echo'<td style="text-align:center;width:160px;">
                                                            <a  class="btn" data-toggle="tooltip" data-placement="top" title="Afficher" href="index.php?page=experience/show&id='.$experience->id.'" ><i class="material-icons">visibility</i></a>
                                                        ';
                                                        if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
                                                        echo'<a  class="btn"  data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=experience/delete&id='.$experience->id.'" ><i class="material-icons">delete_forever</i></a>
                                                            ';
                                                    echo' </td>';
                                                echo "</tr>";
                                            }
                                    ?>
                                    <a  class="btn" href="index.php?page=experience/index" data-toggle="tooltip" data-placement="top" title="Annuler"  style="margin-bottom: 20px;" ><i class="material-icons">arrow_back</i></a>
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