<?php
    require_once  "Controller.php";

    
    class ExperienceController extends Controller
    {
        
        public function __construct( $view )
        {
            parent::__construct();
        }

        public function show()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $experience = $this->model->find($id);
            
            $this->render('show',["experience"=>$experience]);
        }

        public function delete()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            $experience = $this->model->find($id);
            if($experience){
                $m=new ExperienceModel();
                $m->delete($id);
                header('location:index.php?page=experience/index');
            }
            else
             echo" experience introvable";
        }

        public function chercher()
        {
            $param = (isset($_GET['param']) ? $_GET['param'] : '' );
            
            $liste = $this->model->chercherexperience($param);
            
            $this->render('chercher',['liste'=>$liste]);

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