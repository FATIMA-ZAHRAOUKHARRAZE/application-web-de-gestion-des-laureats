<?php
    require_once 'model.php';

    class StageModel extends Model
    {   
       
        public function __construct()
        {
            parent::__construct();
        }

        public function chercherstage($param)
        {
            $sql = "SELECT * FROM ". $this->table;
            $sql .= " WHERE intitule_stage=? OR datedebut=? OR datedebut=? OR note=? ";
            $query = $this->requete( $sql, [$param,$param,$param,$param]);
            return $this->getAll($query);
        }

        public function insertstage($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='(id,intitule_stage,datedebut,datefin,note,idsociete,idencadreur,idlaureat) values(?,?,?,?,?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        
        public function Updatestage($values)
        {
            $sql="UPDATE ".$this->table." SET intitule_stage=?,datedebut=?,datefin=?,note=? WHERE id = ? ";
            $query =$this->requete( $sql, $values);
        }

    }
?>