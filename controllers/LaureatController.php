<?php
    require_once  "Controller.php";
    
    class LaureatController extends Controller
    {
        public $m;
        
        public function __construct( $view )
        {
           parent::__construct();
           $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
           $this->m=$this->menu($id);
        }
        
        public function show()
        {

            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $laureat = $this->model->find($id);
            
            $this->render('show',["menu"=>$this->m ,"laureat"=>$laureat]);
        }
        
        public function statue()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $laureat = $this->model->find($id);
            $statues=$this->model->chercherStatuelaureat($id);
            
            $this->render('statue',["menu"=>$this->m ,"statues"=>$statues,"laureat"=>$laureat]);
        }

        public function stage()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $laureat = $this->model->find($id);
            $stages=$this->model->chercherStage($id);
            
            $this->render('stage',["menu"=>$this->m ,"stages"=>$stages,"laureat"=>$laureat]);
        }

        public function experience()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $laureat = $this->model->find($id);
            $experiences=$this->model->chercherExperience($id);
            $this->render('experience',["menu"=>$this->m ,"experiences"=>$experiences,"laureat"=>$laureat]);
        }

        public function diplome()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $laureat = $this->model->find($id);
            $diplomes=$this->model->chercherdiplome($id);
            
            $this->render('diplome',["menu"=>$this->m ,"diplomes"=>$diplomes,"laureat"=>$laureat]);
        }

        public function formation()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $laureat = $this->model->find($id);
            $formation=$this->model->chercherformation($id);
            
            $this->render('formation',["menu"=>$this->m ,"formation"=>$formation,"laureat"=>$laureat]);
        }
       
        public function chercher()
        {
            $param = (isset($_GET['param']) ? $_GET['param'] : '' );
            
            $liste = $this->model->chercherlaureat($param);
            
            $this->render('chercher',['liste'=>$liste]);
        }

        public function delete()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            $laureat = $this->model->find($id);
            if($laureat){
                //$this->render('delete',["diplome"=>$diplome]);
                $m=new LaureatModel();
                $m->delete($id);
                header('location:index.php?page=laureat/index');
            }
            else
             echo" laureat introvable";
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
        public function menu($id){
            $m='
            <nav class="navbar navbar-expand-lg navbar-mainbg" >
            <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                            <a class="nav-link"  name="" href="index.php?page=laureat/stage&id='.$id.'">Stage</a>
                            </li>
                            <li class="nav-item ">
                            <a class="nav-link" href="index.php?page=laureat/statue&id='.$id.'">Statue</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="index.php?page=laureat/formation&id='.$id.'">Formation</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="index.php?page=laureat/diplome&id='.$id.'">Diplome</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="index.php?page=laureat/experience&id='.$id.'">Experience</a>
                            </li>
                    </ul>
            </div>
    </nav>
    '; 
    return $m;
        }
        
    }
?>