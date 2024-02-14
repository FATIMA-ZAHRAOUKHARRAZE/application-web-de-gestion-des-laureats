<?php
    require_once  "Controller.php";
    
    class FormationController extends Controller
    {
        
        public function __construct( $view )
        {
           parent::__construct();
        }

        public function show()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $formation = $this->model->find($id);
            
            $this->render('show',["formation"=>$formation]);
        }

        public function delete()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            $formation = $this->model->find($id);
            if($formation){
                //$this->render('delete',["diplome"=>$diplome]);
                $m=new FormationModel();
                $m->delete($id);
                header('location:index.php?page=formation/index');
            }
            else
             echo" formation introvable";
        }

        public function chercher()
        {
            $param = (isset($_GET['param']) ? $_GET['param'] : '' );
            
            $liste = $this->model->chercherformation($param);
            
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