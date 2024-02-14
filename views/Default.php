<?php
@session_start();

if ( !empty( $_POST)&& $this->model)
    {
        if ( isset( $_POST['prev']))
            $this->model->pagination->prev();
        
        if ( isset( $_POST['next']))
            $this->model->pagination->next();
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content =" site personnel">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    footer {
        position: fixed;
        height: 30px;
        bottom: 0;
        width: 100%;
        background-color: #337ab7;
    }  
  @media screen and (min-width: 992px) {
  .monnav {
    height:100px;
  }
}
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light monnav" style="background-color: #337ab7;">
        <div class="container-fluid">
            <img src="views/image/lg.png" width="100">  
            <a class="navbar-brand" style="color:white; margin-left:20px">GESTION DES LAUREATS</a>
            <?php
            if(!($this->model || isset($_SESSION['logged']))){
                echo'<a href="index.php?page=user/login"  class="nav-link" style="color:white;font-size:20px">se connecter</a>';
            }
            ?>
            <?php
                if(isset($_SESSION['logged']))
                {
                        ?>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php
                }
            ?>
            <?php 

            if(isset($_SESSION['logged']))
            {
                    ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?page=user/profil" style="color:white;"><i class="material-icons">home</i></a>
                            </li>
                            <?php
                                if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
                                    {
                                            ?>
                                            <li class="nav-item">
                                           
                                            <a class="nav-link active" style="color:white;" aria-current="page" href="index.php?page=user/ajouter">crée compte</a>
                                            </li>
                                            <?php
                                    }
                            ?>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;">
                                laureat
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php?page=laureat/index"style="color:#e74c3c;">Liste Laureats</a></li>
                                <li><a class="dropdown-item" href="index.php?page=statuelaureat/index"style="color:#e74c3c;">Liste Statue Laureat</a></li>

                            </ul>
                           
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;">
                                Stage
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php?page=stage/index"style="color:#e74c3c;">Liste Stage</a></li>
                                <li><a class="dropdown-item" href="index.php?page=encadreure/index"style="color:#e74c3c;">Liste Encadreur</a></li>
                                <li><a class="dropdown-item" href="index.php?page=societe/index"style="color:#e74c3c;">Liste Societe</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;">
                                Formation
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php?page=formation/index"style="color:#e74c3c;">Liste Formation</a></li>
                                <li><a class="dropdown-item" href="index.php?page=diplome/index"style="color:#e74c3c;">Liste Diplome</a></li>
                                <li><a class="dropdown-item" href="index.php?page=experience/index"style="color:#e74c3c;">Liste Experience</a></li>
                            </ul>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <table>
                                <tr>
                                    <td style="color: white; text-align:center">
                                    <?php echo $_SESSION['email'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="color: white; text-align:center">
                                        <?php echo $_SESSION['role'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <a class="nav-link" href="index.php?page=user/deconnecter"style="color:white;">
                                        <i class="material-icons">exit_to_app</i>se déconnecter
                                    </a>
                                    </td>   
                                </tr>
                            </table>
                        </form>
                    </div>
        </div>
                <?php
                        }
                        ?>   
    </nav>
    <?php   
    echo $view;
    ?> 
    <?php
        if($this->model && $this->model->pagination->istoshow){
            ?>
            <CENTER>
            <form method="POST" class="form">
                <button id="precedent" type="submit" class="btn"  name="prev" value="prev">precedent</button>
                <button id="next" type="submit" class="btn" name="next" value="next">suivant</button>
            </form></CENTER>
            <?php
        }
    ?>
  
    <?php 
                if(isset($_SESSION['logged']))
                {
                        ?>
    <footer>
                    <h5 style="text-align:center ;color: white;">
                    Faculté des Sciences et Techniques de Mohammedia&copy;2022
                    </h5>
    </footer>
    <?php
                }
                ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js'></script>
<script type="text/javascript">
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>
</html>
