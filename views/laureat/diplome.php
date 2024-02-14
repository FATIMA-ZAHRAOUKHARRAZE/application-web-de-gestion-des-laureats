<?php
    $nombre = count($diplomes);

    if ( $nombre == 0 )
    {
        echo "<h3 style='color:#e74c3c;text-align:center'>liste vide des diplomes<h3>";
        ?>

        <a class="btn" style="background-color: #337ab7;color: white;margin-left:20px" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=laureat/show&id=<?= $laureat->id ?>"  style="margin-bottom: 20px;"><i class="material-icons">arrow_back</i></a>
     <?php
    }
  
    else
    {
        if ( $nombre == 1 )
        {
            $diplome = $diplomes[0];
?>
<?php
            $intitule="";
            $dateaubtenssion="";
            $nometablissement="";
            if(!empty($_POST)){      
                if(isset($_POST['modifier'])){
                    $id=$diplome->id;
                    $intitule=$_POST['intitule'];
                    $dateaubtenssion=$_POST['dateaubtenssion'];
                    $nometablissement=$_POST['nometablissement'];
                    $values=[$intitule,$dateaubtenssion,$nometablissement,$id];
                    $m=new LaureatModel();
                    $m->modifierdiplomelaureats($values);   
                    header('Location:index.php?page=laureat/index');
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
                            margin-top:60px;
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
                <div class="container">
                    <div class="row g-1 align-items-center">
                            <div class="col-5">
                                    <label for="txtintitulé" id="lblintitulé" name="lblintitulé" class="form-label">intitulé:</label>
                                    <input type="text"  class="form-control"  placeholder="saisir l'intitulé " value="<?=$diplome->intitule_diplome?>" name="intitule">
                            
                                    <label for="txtdateaubtenssion" id="lbldateaubtenssion" name="lbldatedebut" class="form-label">date aubtenssion:</label>
                                    <input type="date" class="form-control" placeholder="saisir le date aubtenssion" value="<?=$diplome->dateaubtenssion ?>" name="dateaubtenssion">
                    
                                    <label for="nometablissement" id="lblnometablissement" name="lblencadretab" class="form-label">nom etablisement:</label> 
                                    <input type="text" class="form-control"  placeholder="saisir le nom etablisement" value="<?=$diplome->nometablissement?>" name="nometablissement">
                            </div>
                            <div class="col-12">
                            <?php
                                            if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
                                            {
                                                    ?>
                                            <button  id="btmodifier" data-toggle="tooltip" data-placement="top" title="Modifier" class="btn" name="modifier" type="submit" ><i class="material-icons">edit</i></button>
                                            <?php
                                            }
                                    ?>
                                            <a class="btn" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=laureat/show&id=<?= $laureat->id ?>" ><i class="material-icons">arrow_back</i></a>
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
            <?php
                       echo $menu;
                       ?>
                    <div class='container'>
                        <div class='matable' style="margin-top: 80px;">
                            <div class="table-responsive">
                                <table  class='table table-bordered border-danger'>
                                    <thead style="color:#e74c3c">
                                        <?php
                                            if(count($diplomes)>0){
                                                $liste_indice=array_keys((array)$diplomes[0]);
                                                echo "<tr style='color:#337ab7;text-align:center'>";
                                                foreach ($liste_indice as $key => $value ){
                                                    if($value!='idlaureat'){
                                                        echo"<th scope='col'>";
                                                        echo $value;
                                                        echo"</th>"; 
                                                    }
                                                }
                                                echo "<th class='text-center'style='width:160px;'>Operations</th>";
                                                echo"</tr>";
                                    }
                                    ?>
                                    </thead>
                                    <tbody >
                                        <?php
                                                foreach( $diplomes as $diplome )
                                                {
                                                    echo "<tr>";
                                                        echo "<td style='text-align:center'>";
                                                            echo $diplome->id;
                                                        echo "</td>";
                                                        echo "<td style='text-align:center'>";
                                                            echo $diplome->intitule_diplome;
                                                        echo "</td>";
                                                        echo "<td style='text-align:center'>";
                                                            echo $diplome->dateaubtenssion;
                                                        echo "</td>";
                                                        echo "<td style='text-align:center'>";
                                                            echo $diplome->nometablissement;
                                                        echo "</td>";
                                                        echo'<td style="text-align:center;width:160px;">
                                                            <a class="btn"  data-toggle="tooltip" data-placement="top" title="Afficher" href="index.php?page=diplome/show&id='.$diplome->id.'"><i class="material-icons">visibility</i></a>
                                                            ';
                                                            if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
                                                            echo'
                                                            <a class="btn"  data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=diplome/delete&id='.$diplome->id.'"><i class="material-icons">delete_forever</i></a>
                                                                ';
                                                    echo' </td>';
                                                }  
                                            ?>
                                            <a class="btn" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=laureat/show&id=<?= $laureat->id ?>" style="margin-bottom: 20px;"><i class="material-icons">arrow_back</i></a>
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
