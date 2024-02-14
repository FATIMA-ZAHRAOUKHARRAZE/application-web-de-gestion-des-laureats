<?php
    $nombre = count($liste);
    if ( $nombre == 0 )
    {
        echo "<h3 style='color:#e74c3c;text-align:center'>liste vide des formations<h3>";
        ?>
        <a class="btn" style="background-color: #337ab7;color: white; margin-left:20px" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=formation/index"  style="margin-bottom: 20px;"><i class="material-icons">arrow_back</i></a>
     <?php
    }
    else
    {
        if ( $nombre == 1 )
        {
            $formation = $liste[0];
?>
<?php
                    $nom="";
                    $duree="";
                    $genre="";
                    if(!empty($_POST)){      
                        if(isset($_POST['modifier'])){
                            $id=$formation->id;
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
                <title> Tableau Formation</title>
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
                                            echo "<th class='text-center'style='width:160px;'> Operations</th>";
                                            echo"</tr>";
                                        }
                                    ?>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach( $liste as $formation )
                                        {
                                            echo "<tr>";
                                                echo "<td style='text-align:center'>";
                                                    echo $formation->id;
                                                echo "</td>";
                                                echo "<td style='text-align:center'>";
                                                    echo $formation->nom_formation;
                                                echo "</td>";
                                                echo "<td style='text-align:center'>";
                                                    echo $formation->duree_formation;
                                                echo "</td>";
                                                echo "<td style='text-align:center'>";
                                                    echo $formation->genre_formation;
                                                echo "</td>";
                                                echo "<td style='text-align:center'>";
                                                    echo $formation->idlaureat;
                                                echo "</td>";
                                                echo'<td style="text-align:center;width:160px;">
                                                        <a data-toggle="tooltip" data-placement="top" title="Afficher" class="btn" href="index.php?page=formation/show&id='.$formation->id.'"><i class="material-icons">visibility</i></a>
                                                    ';
                                                    if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
                                                    echo'<a class="btn" data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=formation/delete&id='.$formation->id.'"><i class="material-icons">delete_forever</i></a>
                                                        ';
                                                echo' </td>';
                                            echo "</tr>";
                                        }
                                    ?>
                                    <a  class="btn" href="index.php?page=formation/index" data-toggle="tooltip" data-placement="top" title="Annuler"  style="margin-bottom: 20px;" ><i class="material-icons">arrow_back</i></a>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </body>
            </html>
<?php
                }
            }
?>