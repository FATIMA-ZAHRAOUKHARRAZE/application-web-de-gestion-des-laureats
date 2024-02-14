<?php
    require_once  "Controller.php";

    
    class UserController extends Controller
    {
        
        public function __construct( $view )
        {
            parent::__construct();
        }

        public function login()
        {
            $this->render('login',[]);
        }
        
        public function deconnecter()
        {
            
            $this->render('deconnecter',[]);
        }
        public function profil()
        {
            
            $this->render('profil',[]);
        }
        
        public function ajouter()
        {
            if(isset($_SESSION['logged']) && $_SESSION['role']=='admin')
            {
                $liste = $this->model->findAll();
                //envoiler la fonction a le view pour afficher
                $this->render('ajouter',['liste'=>$liste]);
            }
            else{
                header('Location:index.php?page=erreur/pageattention');
           }
        }
        
    }
?>