<?php

class FeuilleMatchManager extends Manager
{

    public function readAll(){
        $s = "SELECT * FROM matchs";
        $r = $this->db->query($s);
        $matchCollection = [];
        while($matchData = $r->fetch(PDO::FETCH_ASSOC)){
            $match = new FeuilleMatch ($matchData);

            array_push($matchCollection, $match);
        }
        return $matchCollection;
    }

    public function read($id_match){
        $s = "SELECT * FROM matchs WHERE id_match = :id_match";
        $r = $this->db->prepare($s);
        $r->BindValue(':id_match', $id_match, PDO::PARAM_INT);
        $r->execute();
        $data = $r->fetch(PDO::FETCH_ASSOC);
        return new FeuilleMatch($data);
    }


    public function createFeuilleMatch(FeuilleMatch $fm){
        $s = "INSERT INTO matchs (date_match,lieu_match)VALUES(?,?)";
        $r = $this->db->prepare($s);

        $r->bindValue(1,$fm->getdate_match(),PDO::PARAM_STR);
        $r->bindValue(2,$fm->getlieu_match(),PDO::PARAM_STR);


        $ok = $r->execute();

        if($ok){
            return $this->db->lastInsertId();

        }else{
            return false;
        }

    }

    public function updateFeuilleMatch(FeuilleMatch $fm){
        $s = "UPDATE matchs SET date_match=?, lieu_match=? WHERE id_match=?";
        $r = $this->db->prepare($s);

        $r->bindValue(1,$fm->getdate_match(),PDO::PARAM_STR);
        $r->bindValue(2,$fm->getlieu_match(),PDO::PARAM_STR);
        $r->bindValue(3,$fm->getid_match(),PDO::PARAM_INT);


        $ok = $r->execute();

        if($ok){
            return $this->db->lastInsertId();

        }else{
            return false;
        }

    }


    public function createJoueurMatch($id_match,$statut_match,$poste_match,$capitaine,$capitaine_sup){
        $s = "INSERT INTO joueur_match (id_match,statut_match,poste_match,capitaine,capitaine_sup)VALUES(?,?,?,?,?)";
        $r = $this->db->prepare($s);

        $r->bindValue(1,$id_match,PDO::PARAM_INT);
        $r->bindValue(2,$statut_match,PDO::PARAM_STR);
        $r->bindValue(1,$poste_match,PDO::PARAM_STR);
        $r->bindValue(2,$capitaine,PDO::PARAM_BOOL);
        $r->bindValue(1,$capitaine_sup,PDO::PARAM_BOOL);

        $ok = $r->execute();

        if($ok){
            return $this->db->lastInsertId();
        }else{
            return false;
        }

    }}


