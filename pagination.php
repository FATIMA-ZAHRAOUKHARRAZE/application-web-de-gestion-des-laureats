<?php    
    class Pagination
    {
        public $page;
        public $nep;
        public $total;
        public $path;
        public $istoshow=false;
        function __construct( $istoshow,$path, $total, $nep=5 )
        {
            $this->path = $path;
            $this->page = 1;
            $this->total = $total;
            $this->set($nep);
            $this->istoshow=$istoshow;
        }

        public function prev()
        {
            if ( $this->page>1) 
            {
                $this->page --;
                header("Location: index.php?page=".$this->path."&p=".$this->page."&n=".$this->nep );
            }
        }

        public function next()
        {
            if ( $this->page<$this->total/$this->nep)
            {
                $this->page ++;
                header("Location: index.php?page=".$this->path."&p=".$this->page."&n=".$this->nep );
            }
        }
        public function get()
        {
            $debut = $this->nep * ( $this->page-1 );
            
            if ( $this->total - $debut <= $this->nep )
                $ne = $this->total;
            else
                $ne = $this->nep;

            // ne = nombre d 'elment a afficher
            return " LIMIT $debut, $ne";
        }

        public function set( $nep = 5 )
        {
            if (isset($_GET['p']))
                $this->page = $_GET['p'];
            else
                $this->page = 1;
            
            if (isset($_GET['n']))
                $this->nep= $_GET['n'];
            else
                $this->nep = $nep;    
        }
    }
?>