<?php
    require_once  "Controller.php";

    
    class DiplomeController extends Controller
    {
        
        public function __construct( $view )
        {
            parent::__construct();
        }

        public function show()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $diplome = $this->model->find($id);
            
            $this->render('show',["diplome"=>$diplome]);
            
        }

        public function delete()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            $diplome = $this->model->find($id);
            if($diplome){
                //$this->render('delete',["diplome"=>$diplome]);
                $m=new DiplomeModel();
                $m->delete($id);
                header('location:index.php?page=diplome/index');
            }
            else
             echo" diplome introvable";
        }

        public function chercher()
        {
            $param = (isset($_GET['param']) ? $_GET['param'] : '' );
            $liste = $this->model->chercherdiplome($param);
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
            else
            {
               header('Location:index.php?page=erreur/pageattention');
              
            }
        }
        
    }
?>