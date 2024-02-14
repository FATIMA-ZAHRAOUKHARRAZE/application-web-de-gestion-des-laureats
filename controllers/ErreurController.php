<?php
    require_once  "Controller.php";

    
    class ErreurController extends Controller
    {
        
        public function __construct( )
        {
            parent::__construct('erreur');
        }

        public function page404()
        {
            
            $this->render('page404',[]);
            
        }

        public function page403()
        {
            
            $this->render('page403',[]);
            
        }
        
        public function pageattention()
        {
            
            $this->render('pageattention',[]);
            
        }
    }
?>