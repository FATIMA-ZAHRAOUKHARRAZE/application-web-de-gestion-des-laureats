<?php
    require_once 'model.php';

    class FormationModel extends Model
    {   
       
       
        public function __construct()
        {
            parent::__construct();
        }

        public function chercherformation($param)
        {
            $sql = "SELECT * FROM ". $this->table;
            $sql .= " WHERE nom_formation=? OR duree_formation=? OR genre_formation=? ";
            $query = $this->requete( $sql, [$param,$param,$param]);
            return $this->getAll($query);
        }

        public function insertformation($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='(id,nom_formation,duree_formation,genre_formation,idlaureat) values(?,?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        
        public function Updateformation($values)
        {
            $sql="UPDATE ".$this->table." SET nom_formation=?,duree_formation=?,genre_formation=? WHERE id = ? ";
            $query =$this->requete( $sql, $values);
        }


    }
?>