<?php
    
    require_once 'models/SocieteModel.php';
    require_once 'models/EncadreureModel.php';
    function getSociete($id)
    {
        $societe=new SocieteModel();
        $societe=$societe->getSocieteById($id);
        return $societe->nom_societe;
    }
    function getEncadreur($id)
    {
        $encadreur=new EncadreureModel();
        $encadreur=$encadreur->getEncadreurById($id);
        return $encadreur->nom_encadreure;
    }
    $nombre = count($stages);
    if ( $nombre == 0 )
       {
        echo "<h3 style='color:#e74c3c;text-align:center'>liste vide des stages<h3>";
        ?>

        <a class="btn" style="background-color: #337ab7;color: white;margin-left:20px" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=laureat/show&id=<?= $laureat->id ?>"  style="margin-bottom: 20px;"><i class="material-icons">arrow_back</i></a>
     <?php
       }
    else
    {
        if ( $nombre == 1 )
        {
            $stage = $stages[0];
?>
<?php
                    $intitule="";
                    $datedebut="";
                    $datefin="";
                    $note="";
                    if(!empty($_POST)){      
                        if(isset($_POST['modifier'])){
                                    $id=$stage->id;
                                    $intitule=$_POST['intitule'];
                                    $datedebut=$_POST['datedebut'];
                                    $datefin=$_POST['datefin'];
                                    $note=$_POST['note'];
                                    $values=[$intitule,$datedebut,$datefin,$note,$id];
                                    $m=new LaureatModel();
                                    $m->Updatestagelaureat($values);   
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
                        <title>Afficher Stage</title>
                        <style type="text/css">
                            .custom-centered{
                                    margin:0 auto;
                                    margin-bottom: 150px;
                                    margin-top: 80px;
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
                                                if(count($stages)>0){
                                                    $liste_indice=array_keys((array)$stages[0]);
                                                    echo "<tr style='color:#337ab7;text-align:center';>";
                                                    foreach ($liste_indice as $key => $value ){
                                                        if($value!='idlaureat'){
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
                                        foreach( $stages as $stage )
                                        {
                                            echo "<tr>";
                                                echo "<td style='text-align:center'>";
                                                    echo $stage->id;
                                                echo "</td>";

                                                echo "<td style='text-align:center'>";
                                                    echo $stage->intitule_stage;
                                                echo "</td>";

                                                echo "<td style='text-align:center'>";
                                                    echo $stage->datedebut;
                                                echo "</td>";
                                                echo "<td style='text-align:center'>";
                                                    echo $stage->datefin;
                                                echo "</td>";
                                                echo "<td style='text-align:center'>";
                                                    echo $stage->note;
                                                echo "</td>";
                                                echo "<td style='text-align:center'>";
                                                    echo getSociete($stage->idsociete);
                                                echo "</td>";
                                                echo "<td style='text-align:center'>";
                                                    echo getEncadreur($stage->idencadreur);
                                                echo "</td>";
                                                echo'<td style="text-align:center;width:160px;">
                                                        <a class="btn" data-toggle="tooltip" data-placement="top" title="Afficher" href="index.php?page=stage/show&id='.$stage->id.'"><i class="material-icons">visibility</i></a>
                                                    ';
                                                    if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
                                                    echo'<a class="btn" data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=stage/delete&id='.$stage->id.'"><i class="material-icons">delete_forever</i></a>
                                                        ';
                                                echo' </td>';
                                            echo "</tr>";
                                        }
                                    ?>
                                    
                                    <a class="btn" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=laureat/show&id=<?= $laureat->id ?>"style="margin-bottom: 20px;" ><i class="material-icons">arrow_back</i></a>
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