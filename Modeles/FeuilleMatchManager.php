<?php

class FeuilleMatchManager extends Manager
{
    public function read($id_match){
        $s = "SELECT * FROM matchs WHERE id_match = :id_match";
        $r = $this->db->prepare($s);
        $r->BindValue(':id_match', $id_match, PDO::PARAM_INT);
        $r->execute();
        $data = $r->fetch(PDO::FETCH_ASSOC);
        return new FeuilleMatch($data);
    }

    public function readAll(){
        $s = "SELECT * FROM matchs";
        $r = $this->db->query($s);
        $matchCollection = [];
        while($matchData = $r->fetch(PDO::FETCH_ASSOC)){
            $match = new FeuilleMatch($matchData);

            array_push($matchCollection, $match);
        }
        return $matchCollection;
    }

} 