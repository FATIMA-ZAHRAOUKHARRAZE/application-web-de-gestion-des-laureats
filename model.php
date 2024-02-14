<?php
    require_once 'database.php';
    require_once "pagination.php";
    
    class Model
    {
        // Table de la base de données
        public $table;
        public $pagination;

        public function __construct()
        {
            $pdo = Database::getPDO();
            $class = str_replace( __NAMESPACE__.'\\', '', get_class($this) );
            $this->table = strtolower( str_replace( 'Model', '', $class ).'s');
            $this->pagination= new Pagination('',0,2);
           
        }

        public function setTable( $table )
        {
            $this->table = $table;
        }
        
        public function requete( string $sql, array $attributs = null )
        {
            $pdo = Database::getPDO();
            if ( $attributs !== null ) // il ya des attributs
            {
                $query = $pdo->prepare( $sql );
                $query->execute( $attributs );
            }
            else
                $query = $pdo->query( $sql );

            return $query;
        }

        public function getAll( $query )
        {
          
            $classe = get_class($this);
           

            $donnees = $query->fetchAll(PDO::FETCH_OBJ);
            return $donnees;
        }

        public function getOne( $query )
        {
            
            return $query->fetch(PDO::FETCH_OBJ);
        }

       

        // chercher touss les enregistrements
        

        // chercher un ou plusieurs enregistrements ayant les critères suivant
        public function findBy($param)
        {
            $sql = "DESCRIBE ".$this->table;
            $query = $this->requete( $sql);
            $liste = $this->getAll($query);
            
            $champs = [];
            $valeurs = [];

            // On boucle pour éclater le tableau
            foreach( $liste as $key => $value )
            {
                $champs[] = "$value->Field = ?";
                $valeurs[] = $param;
            }

            // On transforme le tableau "champs" en une chaine de caractères
            $liste_champs = implode(' OR ', $champs);
            $liste_valeurs = implode(' , ', $valeurs);
            
            // On exécute la requête
            $sql = 'SELECT * FROM '.$this->table.' WHERE '. $liste_champs;
           
            $query = $this->requete( $sql, $valeurs );
            
            return $this->getAll($query);
        }
        public function find(int $id)
        {
            $query = $this->requete("SELECT * FROM {$this->table} WHERE id = $id");
            
            $classe = get_class($this);
               

            return $this->getOne($query);
        }
        public function create( )
        {
            $champs = [];
            $inter = [];
            $valeurs = [];

            // On boucle pour éclater le tableau
            foreach( $this as $champ => $valeur )
            {
               
                if( $valeur !== null && $champ !== "db" && $champ !== "table" )
                {
                    $champs [] = $champ;
                    $inter [] = '?';
                    $valeurs [] = $valeur;
                }
            }
            // On transforme le tableau "champs" en une chaine de caractères
            $liste_champs = implode( ', ', $champs );
            $liste_inter = implode( ', ', $inter );
           
            // On exécute la requête
            $sql = "INSERT INTO ".$this->table." ( ". $liste_champs." ) VALUES (".$liste_inter.")";
            return $this->requete( $sql, $valeurs );
        }
        public function update( int $id, Model $model )
        {
            $champs = [];
            $valeurs = [];

            // On boucle pour éclater le tableau
            foreach($model as $champ => $valeur){
              
                if( $valeur !== null && $champ !== "b" && $champ !== "table" )
                {
                    $champs [] = $champ." = ?";
                    $valeurs [] = $valeur;
                }
            }
            $valeurs [] = $id;
            // On transforme le tableau "champs" en une chaine de caractères
            $liste_champs = implode( ', ', $champs );
            // On exécute la requête
            $sql = "UPDATE ".$this->table." SET ". $liste_champs." WHERE id = ?";
            return $this->requete( $sql, $valeurs);
        }
        public   function delete (int $id)
        {
            $sql = "DELETE FROM ". $this->table. " WHERE id = ?";
            return self::requete( $sql, [$id] );
        }
        public function hydrate( array $donnees )
        {
            foreach( $donnees as $key => $value )
            {
                // On récupère le nom du setter correspondant à la clé (key)
                
                $setter = "set".ucfirst( $key );
                
                // On vérifie si le setter existe
                if( method_exists( $this, $setter ) )
                {
                    // On appelle le setter
                    $this->$setter( $value );
                }
            }
            return $this;
        }
        public static function getNbreElements( $statement ) : int
        {
            $pdo = Database::getPDO();
            $sth = $pdo->query( $statement );
            if ( $sth === null )
                return 0;
            else
                return $sth->rowCount();
        }

      

        // chercher touss les enregistrements
        public function findAll($class=null,$istoshow=false)
        {
            $statement ="SELECT * FROM ".$this->table;
            $total = $this->getNbreElements( $statement );
            $this->pagination = new Pagination( $istoshow,$class."/index", $total, 3);
            $statement .= $this->pagination->get();
            $query = $this->requete( $statement );
            return $this->getAll( $query );           
        }
        
        
    }
?>