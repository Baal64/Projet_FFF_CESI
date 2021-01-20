<?php


class EquipeMatchManager extends Manager
{

    public function readAll(){
        $s = "SELECT * FROM equipe_match";
        $r = $this->db->query($s);
        $equipematchCollection = [];
        while($equipematchData = $r->fetch(PDO::FETCH_ASSOC)){
            $equipematch = new EquipeMatch ($matchData);

            array_push($equipematchCollection, $equipematch);
        }
        return $equipematchCollection;
    }

    public function read($id_match){
        $s = "SELECT * FROM equipe_match WHERE id_match = :id_match";
        $r = $this->db->prepare($s);
        $r->BindValue(':id_match', $id_match, PDO::PARAM_INT);
        $r->execute();
        $data = $r->fetch(PDO::FETCH_ASSOC);
        return new EquipeMatch($data);
    }

	public function createEquipeMatch(EquipeMatch $ep){
        $s = "INSERT INTO equipe_match (id_match,equipe_domicile,equipe_exterieur)VALUES(?,?,?)";
        $r = $this->db->prepare($s);

        $r->bindValue(1,$ep->getid_match(),PDO::PARAM_INT);
        $r->bindValue(2,$ep->getequipe_domicile(),PDO::PARAM_INT);
        $r->bindValue(3,$ep->getequipe_exterieur(),PDO::PARAM_INT);


        $ok = $r->execute();
        var_dump($ok);
        if($ok){
            return true;

        }else{
            return false;
        }

    }

    public function updateEquipeMatch(EquipeMatch $ep){
        $s = "UPDATE equipe_match SET equipe_domicile=?, equipe_exterieur=? WHERE id_match=?";
        $r = $this->db->prepare($s);

        $r->bindValue(1,$ep->getequipe_domicile(),PDO::PARAM_INT);
        $r->bindValue(2,$ep->getequipe_exterieur(),PDO::PARAM_INT);
        $r->bindValue(3,$ep->getid_match(),PDO::PARAM_INT);

        $ok = $r->execute();

        if($ok){
            return true;

        }else{
            return false;
        }

    }
}