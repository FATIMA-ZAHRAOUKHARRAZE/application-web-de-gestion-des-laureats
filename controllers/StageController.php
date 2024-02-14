<?php
    require_once  "Controller.php";
    require_once "models/StageModel.php";

    class StageController extends Controller
    {
        
        public function __construct( $view )
        {
            parent::__construct();
        }

        public function show()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            $stage = $this->model->find($id);
            $this->render('show',["stage"=>$stage]);
        }

        public function delete()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            $stage = $this->model->find($id);
            if($stage){
                //$this->render('delete',["stage"=>$stage]);
                $m=new StageModel();
                $m->delete($id);
                header('location:index.php?page=stage/index');
            }
            else
             echo" stage introvable";
        }

        public function chercher()
        {
            $param = (isset($_GET['param']) ? $_GET['param'] : '' );
            $liste = $this->model->chercherstage($param);
            $this->render('chercher',['liste'=>$liste]);

        }
        
        public function update(){
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            $stage = $this->model->find($id);
            if($stage){
                //$this->render('delete',["diplome"=>$diplome]);
                $m=new StageModel();
                $m->delete($id);
                header('location:index.php?page=stage/index');
            }
            else
             echo" stage introvable";
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