<?php
    require_once("connexion.php");
    class tache extends cnx {
        private $id;
        private $priorite;
        private $date_c;
        private $donnee;
        private $obj_id;
        private $details;
        private $etat;
        private $date_l;
        private $recu;
        public function getId(){
            return $this->id;
        }
        public function getPriorite(){
            return $this->priorite;   
        }
        public function setPriorite($p){
            $this->priorite=$p;
       }
       public function getDateC(){
        return $this->date_c;   
       }
       public function setDate_C($cd){
        $this->date_c=$cd;
        }
        public function getDonnee(){
            return $this->donnee;   
        }
        public function setDonnee($g){
            $this->donnee=$g;
       }
        public function getObjet(){
            return $this->objet;    
        }
        public function setObjet($o){
            $this->objet=$o;
        }
        public function getDetails(){
            return $this->details;    
        }
        public function setDetails($d){
            $this->details=$d;
        }
        public function getEtat(){
            return $this->etat;    
        }
        public function setEtat($s){
            $this->etat=$s;
        }
        public function getDateL(){
            return $this->date_l;    
        }
        public function setDate_L($dl){
            $this->date_l=$dl;
        }
        public function getRecu(){
            return $this->recu;    
        }
        public function setRecu($d){
            $this->recu=$d;
        }
        public function ajouter(){
            if(!isset($this->priorite) ||   !isset($this->objet) || !isset($this->details) || !isset($this->date_l) || !isset($this->recu) )
            return false;
            $q = "INSERT INTO taches (priorite, date_c, donnee, obj_id, details, etat , date_l , recu)
             VALUES ('$this->priorite','$this->date_c',$this->donnee,$this->objet,'$this->details','$this->etat','$this->date_l' , $this->recu) " ;
            $stmt = $this->connexion()->exec($q);
            if(!$stmt)
                echo('echec insertion'.$this->connexion()->errorInfo());
            else{
                $r= 1;
                return $r;
            }
        }
        public function editAll(){
            $res=$this->connexion()->query("SELECT * from taches WHERE etat!='Demande envoyée'");
            $les_tasks= $res->fetchAll();
            return $les_tasks;
        }
        public function edits1(){
            $res=$this->connexion()->query("SELECT * from taches WHERE etat='Términée' ");
            $les_tasks= $res->fetchAll();
            return $les_tasks;
        }
        public function edits11($id){
            $res=$this->connexion()->query("SELECT * from taches WHERE etat='Términée' AND recu=$id");
            $les_tasks= $res->fetchAll();
            return $les_tasks;
        }
        public function edits21($id){

            $res=$this->connexion()->query("SELECT * FROM taches WHERE etat!='Términée' AND etat!='Demande envoyée' AND date_l < ( SELECT CURRENT_DATE FROM DUAL) AND recu=$id");
            $les_tasks= $res->fetchAll();
            return $les_tasks;
        }
        public function edits2(){

            $res=$this->connexion()->query("SELECT * FROM taches WHERE etat!='Términée'AND etat!='Demande envoyée' AND date_l < ( SELECT CURRENT_DATE FROM DUAL)");
            $les_tasks= $res->fetchAll();
            return $les_tasks;
        }
        public function edits3(){
            $res=$this->connexion()->query("SELECT * from taches where etat!='Términée' AND etat!='Demande envoyée' AND date_l BETWEEN (select CURRENT_DATE FROM DUAL) and (select CURRENT_DATE FROM DUAL)+ 3");
            $les_tasks= $res->fetchAll();
            return $les_tasks;
        }
        public function edits31($id){
            $res=$this->connexion()->query("SELECT * from taches where etat!='Términée' AND etat!='Demande envoyée' AND  (date_l BETWEEN (select CURRENT_DATE FROM DUAL) and (select CURRENT_DATE FROM DUAL)+ 3) AND recu=$id");
            $les_tasks= $res->fetchAll();
            return $les_tasks;
        }
        public function editAll2($id){
            $res=$this->connexion()->query("SELECT * from taches WHERE recu=$id AND etat!='Demande envoyée'");
            $les_tasks= $res->fetchAll();
            return $les_tasks;
        }

        public function demande($id){
            $res=$this->connexion()->query("SELECT * from taches WHERE recu=$id AND etat='Demande envoyée'");
            $les_tasks= $res->fetchAll();
            return $les_tasks;
        }


        public function editAll3($id){
            $res=$this->connexion()->query("SELECT * from taches WHERE donnee=$id AND etat!='Demande envoyée'");
            $les_tasks= $res->fetchAll();
            return $les_tasks;
        }
        public function supprimer($id){
            $q="DELETE FROM taches WHERE id = $id";
            $stmt=$this->connexion()->exec($q);
            if(!$stmt)
                echo('echec de suppression'.$this->connexion()->errorInfo());
            else 
            return $stmt;
        }
        public function editBy($id){
            $q = "SELECT * FROM taches WHERE id=$id";
            $res = $this->connexion()->query($q);
            $la_tache=$res->fetch();
            return $la_tache;
        }
        public function modifier($id){
            $p=$this->getPriorite();
            $d=$this->getDetails();
            $s=$this->getEtat();
            $dl=$this->getDateL();
            $dw=$this->getRecu();
            $q="UPDATE taches SET priorite='$p' , details='$d' , etat='$s' , date_l='$dl' , recu='$dw'  WHERE id=$id";
            $stmt=$this->connexion()->exec($q);
            return $stmt;
        }
        public function accepter($id){
            $s="En cours";
            $q="UPDATE taches SET  etat='$s'   WHERE id=$id";
            $stmt=$this->connexion()->exec($q);
            return $stmt;
        }
        public function verifier($id1 , $id2){
            $q1 = "SELECT dept_id FROM objets WHERE id=$id1";
            $res1 = $this->connexion()->query($q1);
            $q2 = "SELECT dept_id FROM employes WHERE id=$id2";
            $res2 = $this->connexion()->query($q2);
            if($res1==$res2)
                return true;
            else 
                return false;
        }
        
    }
?>
</body>
</html>