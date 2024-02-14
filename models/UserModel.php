<?php
    require_once 'model.php';
    class UserModel extends Model
    {   
        
        
        public function __construct()
        {
            parent::__construct();
        }
        
        public function insertuser($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='(email,password,nom,prenom,role) values(?,?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
    }
?>