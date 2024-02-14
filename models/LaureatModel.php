<?php
    require_once 'model.php';
    class LaureatModel extends Model
    {   
         
        public function __construct()
        {
            parent::__construct();
        }

        public function findByNom(int $id,$tel,string $nom ,$prenom,$email)
        {
            $sql= "SELECT * FROM {$this->table} WHERE nom= '$nom'or  prenom='$prenom'or id=$id or email='$email' or tel=$tel";
            $query = $this->requete($sql);
            $classe = get_class($this);
            $query->setFetchMode( PDO::FETCH_CLASS, $classe );

            return $this->getAll($query);
        }

        public function chercherlaureat($param)
        {
            $sql = "SELECT * FROM ". $this->table;
            $sql .= " WHERE nom_laureat=? OR prenom_laureat=? OR email_laureat =? OR tel_laureat=? OR datenaiss_laureat=? OR photo_laureat=?";
            $query = $this->requete( $sql, [$param,$param,$param,$param,$param,$param]);
            return $this->getAll($query);
        }

        public function chercherStatuelaureat($id)
        {
            $sql = "SELECT * FROM statuelaureats where idlaureat=?";
            $query = $this->requete( $sql, [$id]);
            return $this->getAll($query);
        }

        public function chercherStage($id)
        {
            $sql = "SELECT * FROM stages where idlaureat=?";
            $query = $this->requete( $sql, [$id]);
            return $this->getAll($query);
        }

        public function chercherDiplome($id)
        {
            $sql = "SELECT * FROM diplomes where idlaureat=?";
            $query = $this->requete( $sql, [$id]);
            return $this->getAll($query);
        }

        public function chercherFormation($id)
        {
            $sql = "SELECT * FROM formations where idlaureat=?";
            $query = $this->requete( $sql, [$id]);
            return $this->getAll($query);
        }

        public function chercherExperience($id)
        {
            $sql = "SELECT * FROM experiences where idlaureat=?";
            $query = $this->requete( $sql, [$id]);
            return $this->getAll($query);
        }

        public function insertlaureat($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='(nom_laureat, prenom_laureat, datenaiss_laureat, tel_laureat, email_laureat, photo_laureat) values(?,?,?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }

        public function Updatelaureat($values)
        {
            $sql="UPDATE ".$this->table." SET nom_laureat=?,prenom_laureat=?,datenaiss_laureat=?,tel_laureat=?,email_laureat=? WHERE id = ? ";
            $query =$this->requete( $sql, $values);
        }

        public function modifierdiplomelaureats($values){
            $sql="UPDATE diplomes SET intitule_diplome=?,dateaubtenssion=?,nometablissement=? WHERE id= ? ";
            $query =$this->requete( $sql, $values);
        }

        public function Updateexperiencelaureat($values)
        {
            $sql="UPDATE experiences SET nom_experience=?,duree_experience=? WHERE id = ? ";
            $query =$this->requete( $sql, $values);
        }

        public function Updateformationlaureat($values)
        {
            $sql="UPDATE formations SET nom_formation=?,duree_formation=?,genre_formation=? WHERE id = ? ";
            $query =$this->requete( $sql, $values);
        }

        public function Updatestagelaureat($values)
        {
            $sql="UPDATE stages SET intitule_stage=?,datedebut=?,datefin=?,note=? WHERE id = ? ";
            $query =$this->requete( $sql, $values);
        }
        
        public function Updatestatuelaureat($values)
        {
            $sql="UPDATE statuelaureats SET nom_statuelaureat=?,date_statuelaureat=? WHERE id = ? ";
            $query =$this->requete( $sql, $values);
        }
    }

?>