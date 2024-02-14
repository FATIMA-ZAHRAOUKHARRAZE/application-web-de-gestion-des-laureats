<?php
    require_once 'model.php';

    class SocieteModel extends Model
    {  
        public function __construct()
        {
            parent::__construct();
        }

        public function cherchersociete($param)
        {
            $sql = "SELECT * FROM ". $this->table;
            $sql .= " WHERE nom_societe=? OR ville_societe=? OR tel_societe=? OR email_societe=? ";
            $query = $this->requete( $sql, [$param,$param,$param,$param]);
            return $this->getAll($query);
        }

        public function getSocieteById($id)
        {
            $sql = "SELECT * FROM ". $this->table . " WHERE id=?";
            $query = $this->requete( $sql, [$id]);
            return $this->getOne($query);
        }

        public function insertsociete($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='(id, nom_societe, ville_societe, tel_societe, email_societe) values(?,?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        
        public function Updatesociete($values)
        {
            $sql="UPDATE ".$this->table." SET nom_societe=?,ville_societe=?,tel_societe=?,email_societe=? WHERE id = ? ";
            $query =$this->requete( $sql, $values);
        }

    }
?>