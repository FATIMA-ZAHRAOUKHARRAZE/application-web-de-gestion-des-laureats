<?php
    if( !empty($_POST))
    {
        if(isset($_POST['chercher']))
        {
            $value = $_POST['chercher_value'];
            header('Location:index.php?page=experience/chercher&param='.$value);
        }
    }
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
        <form  class="mb-4" method="post"style="margin-top: 20px;">
        <?php
    if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
    {
        ?>
            <a href="index.php?page=experience/ajouter"  style="float: right;margin-right:10px;height:30px" data-toggle="tooltip" data-placement="top" title="Ajouter" name="ajouter" type="submit" class="btn"><i class="material-icons">add_circle_outline</i></a>
            <?php
    }
    ?>
            <input type="text"  name="chercher_value" style="float: left;margin-left:10px"> 
            <button style="float: left;margin-left:10px;height:30px" class="btn" data-toggle="tooltip" data-placement="top" title="Chercher" name="chercher" type="submit"><i class="material-icons">search</i>
            </button>
        </form>
    <div class='container'>
        <div class='matable' style="margin-top: 80px;">
            <caption>
                <h3 style="text-align:center; color:#e74c3c">Liste Des Experiences</h3>
            </caption>
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
                                            echo $experience->duree_experience	;
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>