<?php
require_once("connexion.php");
class objet extends cnx {
    private $id ;
    private $nom ;
    private $dept_id ;
    public function getId ()
    {
        return $this->id;
    }
    public function getNom ()
    {
        return $this->nom;
    }
    public function setNom ($n)
    {
        $this->nom=$n;
    }
    public function getDeptId ()
    {
        return $this->dept_id;
    }
    public function setDeptId ($d)
    {
        $this->dept_id=$d;
    }
    public function ajouter ()
    {
        if(!isset($this->nom)||!isset($this->dept_id))
            return false ;
        $q="INSERT INTO objets (nom , dept_id) VALUES ( '$this->nom' , '$this->dept_id')";
        $stmt=$this->connexion()->exec($q);
        if(!$stmt)
            echo ( "echec insertion".$this->connexion()->erreurinfo() );
        else{
            $r=1;
            return $r;}
    }
    public function selectionner_tout()
    {
        $res=$this->connexion()->query("SELECT * FROM objets");
        $les_objets=$res->fetchAll();
        return $les_objets;
    }
    public function supprimer($id)
    {
        $q="DELETE FROM objets WHERE id=$id";
        $stmt=$this->connexion()->exec($q);
        if(!$stmt)
            echo ('echec de suppression '.$this->connexion()->errorInfo()) ;
        else
            return $stmt ;
    }
    public function selectionner ($id)
    {
        $res=$this->connexion()->query("SELECT * FROM objets WHERE id=$id");
        $le_objet=$res->fetchAll();
        return $le_objet;
    }
    public function modifier ($id)
    {
        $nom=$this->getNom();
        $dept_id=$this->getDeptId();
        $q="UPDATE objets SET  nom='$nom' , dept_id=$dept_id WHERE id=$id";
        $stmt=$this->connexion()->exec($q);
        return $stmt;
    }
}
?>