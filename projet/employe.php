<?php
    require_once("connexion.php");
    class employe extends cnx {
        private $id;
        private $nom;
        private $profil;
        private $dept_id;
        private $email;
        private $mdp;
        private $genre;

        public function getId(){
            return $this->id;
        }
        public function getNom(){
            return $this->nom;   
           }
           public function setNom($n){
            $this->nom=$n;
            }
        public function getProfil(){
            return $this->profil;   
        }
        public function setProfil($l){
            $this->profil=$l;
       }

        public function getDeptId(){
            return $this->dept_id;   
        }
        public function setDeptId($d){
            $this->dept_id=$d;
       }
        public function getEmail(){
            return $this->email;    
        }
        public function setEmail($e){
            $this->email=$e;
        }
        public function getMdp(){
            return $this->mdp;    
        }
        public function setMdp($p){
            $this->mdp=$p;
        }
        public function getGenre(){
            return $this->genre;    
        }
        public function setGenre($g){
            $this->genre=$g;
        }
        public function ajouter(){
            if(!isset($this->nom) || !isset($this->profil) ||!isset($this->dept_id) ||!isset($this->email) || !isset($this->mdp)  )
            return false;
            $q = "INSERT INTO employes (nom, profil, dept_id, email, mdp , genre) VALUES ('$this->nom','$this->profil','$this->dept_id','$this->email','$this->mdp' , '$this->genre')";
            $stmt = $this->connexion()->exec($q);
            if(!$stmt)
                echo('echec insertion'.$this->connexion()->errorInfo());
            else{
                $r= 1;
                return $r;
            }
        }
        public function editAll(){
            $res=$this->connexion()->query("SELECT * from employes");
            //Extraire (fech) toutes les lignes 
            $les_employes= $res->fetchAll();
            return $les_employes;
        }
        public function supprimer($id){
            $q="DELETE FROM employes WHERE id = $id";
            $stmt=$this->connexion()->exec($q);
            if(!$stmt)
                echo('echec de suppression'.$this->connexion()->errorInfo());
            else 
            return $stmt;
        }
        public function editBy($id){
            $q = "SELECT * FROM employes WHERE id=$id";
            $res = $this->connexion()->query($q);
            $le_employee=$res->fetch();
            return $le_employee;
        }
        public function modifier($id){
            $fn=$this->getNom();
            $ln=$this->getProfil();
            $d=$this->getDeptId();
            $e=$this->getEmail();
            $p=$this->getMdp();
            $q="UPDATE employes SET nom='$fn' , profil='$ln' , dept_id='$d' ,  email='$e' , mdp='$p' WHERE id=$id";
            $stmt=$this->connexion()->exec($q);
            return $stmt;
        }

        public function changer($id){
            $p=$this->getMdp();
            $q="UPDATE employes SET  mdp='$p' WHERE id=$id";
            $stmt=$this->connexion()->exec($q);
            return $stmt;
        }
    }
?>