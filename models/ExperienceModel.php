<?php
    require_once 'model.php';

    class ExperienceModel extends Model
    {   
        
        public function __construct()
        {
            parent::__construct();
        }

        public function chercherexperience($param)
        {
            $sql = "SELECT * FROM ". $this->table;
            $sql .= " WHERE nom_experience=? OR duree_experience	=? ";
            $query = $this->requete( $sql, [$param,$param]);
            return $this->getAll($query);
        }

        public function insertexperience($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='(id,nom_experience,duree_experience	,idlaureat ) values(?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        
        public function Updateexperience($values)
        {
            $sql="UPDATE ".$this->table." SET nom_experience=?,duree_experience	=? WHERE id = ? ";
            $query =$this->requete( $sql, $values);
        }


    }
?>