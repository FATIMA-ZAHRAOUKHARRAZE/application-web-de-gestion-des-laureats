<?php
    require_once  "Controller.php";
    class HomeController extends Controller
    {
       
        public function __construct( $view )
        {
            parent::__construct('home');
        }
        
        public function index()
        {
            $this->render('index');
        }

        
    }
?>