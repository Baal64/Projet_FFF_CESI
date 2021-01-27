<?php


class JoueurMatchManager extends Manager
{

    public function read($id_joueur){
        $s = "SELECT * FROM joueur_match WHERE id_joueur = :id_joueur";
        $r = $this->db->prepare($s);
        $r->BindValue(':id_joueur', $id_joueur, PDO::PARAM_INT);
        $r->execute();
        $data = $r->fetch(PDO::FETCH_ASSOC);
        return new JoueurMatch($data);
    }

    public function readAll(){
        $s = "SELECT * FROM joueur_match";
        $r = $this->db->query($s);
        $joueurMatchCollection = [];
        while($joueurMatchData = $r->fetch(PDO::FETCH_ASSOC)){
            $joueurMatch = new JoueurMatch($joueurMatchData);

            array_push($joueurMatchCollection, $joueurMatch);
        }
        return $joueurMatchCollection;
    }

    public function readByMatch($id_match){
        $s = "SELECT * FROM joueur_match WHERE id_match = :id_match";
        $r = $this->db->prepare($s);
        $r->BindValue(':id_match', $id_match, PDO::PARAM_INT);
        $r->execute();
        $joueurMatchCollection = [];
        while($joueurMatchData = $r->fetch(PDO::FETCH_ASSOC)){
            var_dump($joueurMatchData);
            $joueurMatch = new JoueurMatch($joueurMatchData);

            array_push($joueurMatchCollection, $joueurMatch);
        }
        return $joueurMatchCollection;
    }

    public function createJoueurMatch(JoueurMatch $jm){
        $s = "INSERT INTO joueur_match (id_joueur,id_match,statut_match,poste_match,placement_match,capitaine,capitaine_sup)VALUES(?,?,?,?,?,?,?)";
        $r = $this->db->prepare($s);

        $r->bindValue(1,$jm->getid_joueur(),PDO::PARAM_INT);
        $r->bindValue(2,$jm->getid_match(),PDO::PARAM_INT);
        $r->bindValue(3,$jm->getstatut_match(),PDO::PARAM_STR);
        $r->bindValue(4,$jm->getposte_match(),PDO::PARAM_STR);
        $r->bindValue(5,$jm->getplacement_match(),PDO::PARAM_STR);
        $r->bindValue(6,$jm->getcapitaine(),PDO::PARAM_BOOL);
        $r->bindValue(7,$jm->getcapitaine_sup(),PDO::PARAM_BOOL);


        $ok = $r->execute();
        if($ok){
            return true;

        }else{
            return false;
        }

    }

    public function createJoueursMatch(Array $joueurs_match){
        for($i=0; $i<count($joueurs_match); $i++){
            $this->createJoueurMatch($joueurs_match[$i]);
        }
    }

}