<?php
    require_once  "Controller.php";
    
    class SocieteController extends Controller
    {
        
        public function __construct( $view )
        {
            parent::__construct();
        }

        public function show()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $societe = $this->model->find($id);
            
            $this->render('show',["societe"=>$societe]);
        }

        public function delete()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            $societe = $this->model->find($id);
            if($societe){
                //$this->render('delete',["diplome"=>$diplome]);
                $m=new SocieteModel();
                $m->delete($id);
                header('location:index.php?page=societe/index');
            }
            else
             echo" societe introvable";
        }

        public function chercher()
        {
            $param = (isset($_GET['param']) ? $_GET['param'] : '' );
            
            $liste = $this->model->cherchersociete($param);
            
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