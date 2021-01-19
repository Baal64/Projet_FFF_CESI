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


   public function createFeuilleMatch($db,$date,$lieu){
        $s = "INSERT INTO matchs (date_match,lieu_match)VALUES(?,?)";
        $r = $db->prepare($s);

        $r->bindValue(1,$date,PDO::PARAM_STR);
        $r->bindValue(2,$lieu,PDO::PARAM_STR);


        $ok = $r->execute();

        if($ok){
            return $db->lastInsertId();

        }else{
            return false;
        }

    }


    public function createJoueurMatch($db,$id_match,$statut_match,$poste_match,$capitaine,$capitaine_sup){
        $s = "INSERT INTO joueur_match (id_match,statut_match,poste_match,capitaine,capitaine_sup)VALUES(lastInsertId(),?,?,?,?)";
        $r = $db->prepare($s);

        $r->bindValue(1,$id_match,PDO::PARAM_INT);
        $r->bindValue(2,$statut_match,PDO::PARAM_STR);
        $r->bindValue(1,$poste_match,PDO::PARAM_STR);
        $r->bindValue(2,$capitaine,PDO::PARAM_BOOL);
        $r->bindValue(1,$capitaine_sup,PDO::PARAM_BOOL);

        $ok = $r->execute();

        if($ok){
            return $db->lastInsertId();
            $nouvelId = $db->lastInsertId();
        }else{
            return false;
        }

    }}


