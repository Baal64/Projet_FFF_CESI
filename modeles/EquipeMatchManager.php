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


    /*public function readDom($id_dom)
    {
        $s = "SELECT * FROM equipe_match WHERE equipe_domicile = :id_dom";
    }*/

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

        $equipemanager = New EquipeManager();
        $domicile = $equipemanager->read($data['equipe_domicile']);
        $exterieur = $equipemanager->read($data['equipe_exterieur']);

        return [$domicile,$exterieur];

    }

    public function readIdClubs($id_match){
        $s = "SELECT * FROM equipe_match WHERE id_match = :id_match";
        $r = $this->db->prepare($s);
        $r->BindValue(':id_match', $id_match, PDO::PARAM_INT);
        $r->execute();
        $data = $r->fetch(PDO::FETCH_ASSOC);

        $equipemanager = New EquipeManager();
        $domicile = $data['equipe_domicile'];
        $exterieur = $data['equipe_exterieur'];

        return [$domicile,$exterieur];

    }

	public function createEquipeMatch(EquipeMatch $ep){
        $s = "INSERT INTO equipe_match (id_match,equipe_domicile,equipe_exterieur)VALUES(?,?,?)";
        $r = $this->db->prepare($s);

        $r->bindValue(1,$ep->getid_match(),PDO::PARAM_INT);
        $r->bindValue(2,$ep->getequipe_domicile(),PDO::PARAM_INT);
        $r->bindValue(3,$ep->getequipe_exterieur(),PDO::PARAM_INT);


        $ok = $r->execute();
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