<?php
    require_once 'model.php';

    class EncadreureModel extends Model
    {   
        public function __construct()
        {
            parent::__construct();
        }

        public function chercherencadreure($param)
        {
            $sql = "SELECT * FROM ". $this->table;
            $sql .= " WHERE nom_encadreure=? OR prenom_encadreure=? OR type_encadreure =? ";
            $query = $this->requete( $sql, [$param,$param,$param]);
            return $this->getAll($query);
        }

        public function insertencadreure($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='(id,nom_encadreure,prenom_encadreure,type_encadreure) values(?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }

        public function modifierencadreure($values){
            $sql="UPDATE ".$this->table." SET nom_encadreure=?,prenom_encadreure=?,type_encadreure=? WHERE id= ? ";
            $query =$this->requete( $sql, $values);
        }
        
        public function getEncadreurById($id)
        {
            $sql = "SELECT * FROM ". $this->table . " WHERE id=?";
            $query = $this->requete( $sql, [$id]);
            return $this->getOne($query);
        }

    }
?>