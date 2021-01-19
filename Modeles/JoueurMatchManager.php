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
            $joueurMacth = new JoueurMatch($joueurMatchData);

            array_push($joueurMatchCollection, $joueurMacth);
        }
        return $joueurMatchCollection;
    }

}