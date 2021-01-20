<?php


class EquipeMatchManager extends Manager
{

    public function readAll(){
        $s = "SELECT * FROM equipe_match";
        $r = $this->db->query($s);
        $equipematchCollection = [];
        while($equipematchData = $r->fetch(PDO::FETCH_ASSOC)){
            $equipematch = new EquipeMatch ($equipematchData);

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

    public function readDom($equipe_domicile){
        $s = "SELECT * FROM equipe_match WHERE equipe_domicile = :equipe_domicile";
        $r = $this->db->prepare($s);
        $r->BindValue(':id_dom', $equipe_domicile, PDO::PARAM_INT);
        $r->execute();
        $data = $r->fetch(PDO::FETCH_ASSOC);
        return new EquipeMatch($data);
    }

    public function readNomClubs($id_match){
        $s = "SELECT * FROM equipe_match WHERE id_match = :id_match";
        $r = $this->db->prepare($s);
        $r->BindValue(':id_match', $id_match, PDO::PARAM_INT);
        $r->execute();
        $data = $r->fetch(PDO::FETCH_ASSOC);

        $equipemanager = New EquipeManager;
        $domicile = $equipemanager->read($data['equipe_domicile']);
        $exterieur = $equipemanager->read($data['equipe_exterieur']);

        return [$domicile,$exterieur];

    }

	public function createEquipeMatch(EquipeMatch $ep){
        $s = "INSERT INTO equipe_match (id_match,equipe_domicile,equipe_exterieur)VALUES(?,?,?)";
        $r = $this->db->prepare($s);

        $r->bindValue(1,$ep->getIdMatch(),PDO::PARAM_INT);
        $r->bindValue(2,$ep->getDom(),PDO::PARAM_INT);
        $r->bindValue(3,$ep->getExt(),PDO::PARAM_INT);


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

        $r->bindValue(1,$ep->getdom(),PDO::PARAM_INT);
        $r->bindValue(2,$ep->getext(),PDO::PARAM_INT);
        $r->bindValue(3,$ep->getIdMatch(),PDO::PARAM_INT);

        $ok = $r->execute();

        if($ok){
            return true;

        }else{
            return false;
        }

    }
}