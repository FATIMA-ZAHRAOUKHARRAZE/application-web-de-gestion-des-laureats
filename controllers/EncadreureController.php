<?php

    require_once  "Controller.php";
    
    class EncadreureController extends Controller
    {
        
        public function __construct( $view )
        {
            parent::__construct();
        }

        public function show()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $encadreur = $this->model->find($id);
            
            $this->render('show',["encadreur"=>$encadreur]);
        }

        public function delete()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $encadreur = $this->model->find($id);
            if($encadreur){
                //$this->render('delete',["stage"=>$stage]);
                $m=new EncadreureModel();
                $m->delete($id);
                header('location:index.php?page=encadreure/index');
            }
            else
             echo" encadreur introvable";
        }

        public function chercher()
        {
            $param = (isset($_GET['param']) ? $_GET['param'] : '' );
            
            $liste = $this->model->chercherencadreure($param);
            
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