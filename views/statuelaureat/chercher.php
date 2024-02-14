<?php
    $nombre = count($liste);

    if ( $nombre == 0 )
    {
    echo "<h3 style='color:#e74c3c;text-align:center'>liste vide des statue laureats <h3>";
    ?>
        <a class="btn" style="background-color: #337ab7;color: white; margin-left:20px" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=statuelaureat/index"  style="margin-bottom: 20px;"><i class="material-icons">arrow_back</i></a>
     <?php
    }
    else
    {
        if ( $nombre == 1 )
        {
            $statuelaureat = $liste[0];
           ?>
                        <?php
                    $nom="";
                    $date="";
                    if(!empty($_POST)){      
                        if(isset($_POST['modifier'])){
                                    $id=$statuelaureat->id;
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
                    <div class='matable'  style="margin-top: 80px;">
                            <table  class='table table-bordered border-danger'>
                                    <thead >
                                        <?php
                                            if(count($liste)>0){
                                                $liste_indice=array_keys((array)$liste[0]);
                                                echo "<tr style='color:#337ab7';>";
                                                foreach ($liste_indice as $key => $value ){
                                                    echo"<th scope='col'>";
                                                    echo $value;
                                                    echo"</th>";
                                                }
                                                echo "<th class='text-center'>Operations</th>";
                                                echo"</tr>";
                                            }
                                            ?>
                                </thead>
                                <tbody>
                                <?php
                                        foreach( $liste as $statuelaureat )
                                        {
                                            echo "<tr>";
                                                echo "<td>";
                                                    echo $statuelaureat->id;
                                                echo "</td>";

                                                echo "<td>";
                                                    echo $statuelaureat->nom_statuelaureat;
                                                echo "</td>";

                                                echo "<td>";
                                                    echo $statuelaureat->date_statuelaureat;
                                                echo "</td>";

                                                echo "<td>";
                                                    echo $statuelaureat->idlaureat;
                                                echo "</td>";
                                                echo'<td>
                                                        <a class="btn" data-toggle="tooltip" data-placement="top" title="Afficher" href="index.php?page=statuelaureat/show&id='.$statuelaureat->id.'"><i class="material-icons">visibility</i></a>
                                                    ';
                                                    if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
                                                    echo'<a  class="btn" data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=statuelaureat/delete&id='.$statuelaureat->id.'"><i class="material-icons">delete_forever</i></a>
                                                        ';
                                                echo' </td>';
                                            echo "</tr>";
                                        }
                                ?>
                                 <a  class="btn" href="index.php?page=statuelaureat/index" data-toggle="tooltip" data-placement="top" title="Annuler"  style="margin-bottom: 20px;" ><i class="material-icons">arrow_back</i></a>
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