<?php
require_once("connexion.php");
class departement extends cnx {
    private $id;
    private $nom;
    public function getId()
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
    public function ajouter()
    {
        if(!isset($this->nom))
            return false ;
        $q="INSERT INTO departements (nom ) VALUES( '$this->nom' )";
        $stmt=$this->connexion()->exec($q);
        if(!$stmt)
            return ('echec insertion'.$this->connexion()->errorInfo());

            
    }
    public function selectionner_tout()
    {
        $res=$this->connexion()->query("SELECT * FROM departements ");
        $les_departements=$res->fetchAll();
        return $les_departements ;
    }
    public function modifier ($id)
    {
        $n=$this->getNom();
        $q="UPDATE departements SET nom='$n' WHERE id=$id";
        $stmt=$this->connexion()->exec($q);
        return $stmt;

    }
    public function supprimer ($id)
    {
        $q="DELETE FROM departements WHERE id=$id";
        $stmt=$this->connexion()->exec($q);
        if(!$stmt)
            echo ('echec de suppression '.$this->connexion()->errorInfo());
        else
            return $stmt ;
    }
    public function selectionner($id)
    {
        $res=$this->connexion()->query("SELECT *FROM departements WHERE id=$id");
        $le_departement=res->fetchAll();
        return $le_departement ;
    }
}
?>

