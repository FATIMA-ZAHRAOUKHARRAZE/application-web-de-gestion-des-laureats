<?php
    require_once 'model.php';

    class StatueLaureatModel extends Model
    {   
       
        public function __construct()
        {
            parent::__construct();
        }

        public function chercherstatuelaureat($param)
        {
            $sql = "SELECT * FROM ". $this->table;
            $sql .= " WHERE nom_statuelaureat=? ";
            $query = $this->requete( $sql, [$param]);
            return $this->getAll($query);
        }
        
        public function insertstatuelaureat($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='(id,nom_statuelaureat,date_statuelaureat,idlaureat) values(?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        
        public function Updatestatuelaureat($values)
        {
            $sql="UPDATE ".$this->table." SET nom_statuelaureat=?,date_statuelaureat=? WHERE id = ? ";
            $query =$this->requete( $sql, $values);
        }

        

    }
?>