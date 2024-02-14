<?php
@session_start();

    abstract class Controller
    {
        protected $model;
        protected $class;
        protected $view;

        protected function __construct( $model = null )
        {
            if ( $model === 'home' ){
                $this->class = 'home';
                $this->model=null;
            }
            else
            {
                $model = static::class;
                $model = str_replace( "Controllers\\", '', $model  );
                $model = str_replace( "Controller", '', $model  );
                $this->class = strtolower( $model );
                require_once ROOT."\\Models\\" . $model. "Model.php";
                $model = $model. "Model";  
                $this->model = new $model();            
                $this->model->setTable( $this->class.'s' );
                $this->model->pagination->istoshow=false;
            }   
        }

        public function index()
        {
           
            if(isset($_SESSION['logged']))// && $_SESSION['role']=='admin')
            {
                
                    $liste = $this->model->findAll($this->class,true); 
                    $this->render('index',['liste'=>$liste]);   
            }
            else
            {
                $msg=" vous n avez pas le droit d accé a cette page veuillez <a href='index.php?page=user/login'>se connecter</a>";
            
                $this->render('page403',['msg'=>$msg],'default','erreur'); 
            }
        }
        
        protected function getFilePath( $method )
        {
            $path = explode( '::', $method );
            return VIEWS . $this->class . '/' . $path[1] . '.php';
        }
        /**
         * Afficher une vue
         *
         * @param string $fichier
         * @param array $data
         * @return void
         */
        public function render( string $method, array $data = [], $template = 'default', $class='' )
        {
            if($class=='')
                $class=$this->class;

            $file = VIEWS.'\\'.$class.'\\'.$method.'.php';    
            extract($data); // Récupère les données et les extrait sous forme de variables
            ob_start(); // On démarre le baffer de sortie
            require_once( $file ); // Crée le chemin et inclut le fichier de vue
            $view= ob_get_clean(); // On stocke le contenu dans $content
            $default=VIEWS.'\\'.$template .'.php';
            require_once($default); // On fabrique le "template"
        }
    }
?>