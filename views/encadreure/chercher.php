<?php
    $nombre = count($liste);

    if ( $nombre == 0 )
    {
    echo "<h3 style='color:#e74c3c;text-align:center'>liste vide des encadreures<h3>";
    ?>
        <a class="btn" style="background-color: #337ab7;color: white; margin-left:20px" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=encadreure/index"  style="margin-bottom: 20px;"><i class="material-icons">arrow_back</i></a>
     <?php
    }
    else
    {
        if ( $nombre == 1 )
        {
            $encadreur = $liste[0];
?>
<?php
                        $nom="";
                        $prenom="";
                        $type="";
                        if(!empty($_POST)){      
                            if(isset($_POST['modifier'])){
                                        $id=$encadreur->id;
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
                <title>Tableau Encadreure</title>
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
                                <thead>
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
                                <tbody >
                                    <?php
                                        foreach( $liste as $encadreur )
                                        {
                                            echo "<tr style='text-align:center'>";
                                                echo "<td>";
                                                    echo $encadreur->id;
                                                echo "</td>";

                                                echo "<td style='text-align:center'>";
                                                    echo $encadreur->nom_encadreure;
                                                echo "</td>";

                                                echo "<td style='text-align:center'>";
                                                    echo $encadreur->prenom_encadreure;
                                                echo "</td>";

                                                echo "<td style='text-align:center'>";
                                                    echo $encadreur->type_encadreure;
                                                echo "</td>";
                                                
                                                echo'<td style="text-align:center;width:160px;">
                                                        <a  class="btn" data-toggle="tooltip" data-placement="top" title="Afficher" href="index.php?page=encadreure/show&id='.$encadreur->id.'" ><i class="material-icons">visibility</i></a>
                                                    ';
                                                    if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
                                                    echo'<adata-toggle="tooltip" data-placement="top" title="Supprimer"  class="btn" href="index.php?page=encadreure/delete&id='.$encadreur->id.'" > <i class="material-icons">delete_forever</i></a>
                                                        ';
                                                echo' </td>';
                                            echo "</tr>";
                                        }  
                                    ?>
                                    <a  class="btn" href="index.php?page=encadreure/index" data-toggle="tooltip" data-placement="top" title="Annuler"  style="margin-bottom: 20px;" ><i class="material-icons">arrow_back</i></a>
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