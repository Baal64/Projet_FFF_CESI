<?php



class JoueurManager extends Manager
{



    public function read($id_joueur){
        $s = "SELECT * FROM joueurs WHERE id_joueur = :id_joueur";
        $r = $this->db->prepare($s);
        $r->BindValue(':id_joueur', $id_joueur, PDO::PARAM_INT);
        $r->execute();
        $data = $r->fetch(PDO::FETCH_ASSOC);
        return new Joueur($data);
    }

    public function readAll(){
        $s = "SELECT * FROM joueurs";
        $r = $this->db->query($s);
        $joueurCollection = [];
        while($joueurData = $r->fetch(PDO::FETCH_ASSOC)){
            $joueur = new Joueur($joueurData);

            array_push($joueurCollection, $joueur);
        }
        return $joueurCollection;
    }





}