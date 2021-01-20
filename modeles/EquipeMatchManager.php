<?php


class EquipeMatchManager extends Manager
{
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
}