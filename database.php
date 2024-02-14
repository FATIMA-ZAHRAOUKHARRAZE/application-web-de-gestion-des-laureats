<?php
   
    // On "importe" PDO
    

    class Database
    {
        // Informations de connexion
        private const DBHOST = 'localhost';
        private const DBUSER = 'root';
        private const DBPASS = '';
        private const DBNAME = 'gestion';

        protected static $pdo = null;
        
        private function __construct()
        {            
            $this->getPDO();
        }

        public static function getPDO()
        {
            if( self::$pdo === null )
            {
                // DSN de connexion
                $_dsn = 'mysql:dbname='. self::DBNAME . ';host=' . self::DBHOST.';charset=utf8';

                // On appelle le constructeur de la classe PDO
                try
                {                    
                    self::$pdo = new PDO( $_dsn, self::DBUSER, self::DBPASS );

                    self::$pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
                   
                    self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
                }
                catch(PDOException $e)
                {
                    die($e->getMessage());
                }
            }

            return self::$pdo;
        }
        
    }
?>