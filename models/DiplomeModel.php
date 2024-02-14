<?php
    require_once 'model.php';

    class DiplomeModel extends Model
    {     
        public function __construct()
        {
            parent::__construct();
        }

        public function chercherdiplome($param)
        {
            $sql = "SELECT * FROM ". $this->table;
            $sql .= " WHERE intitule_diplome=? OR nometablissement=?";
            $query = $this->requete( $sql, [$param,$param]);
            return $this->getAll($query);
        }

        public function insertdiplome($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='(id,intitule_diplome,dateaubtenssion,nometablissement,idlaureat ) values(?,?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        
        public function modifierdiplome($values){
            $sql="UPDATE ".$this->table." SET intitule_diplome=?,dateaubtenssion=?,nometablissement=? WHERE id= ? ";
            $query =$this->requete( $sql, $values);
        }

    }
?>