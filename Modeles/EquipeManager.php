<?php



class EquipeManager extends Manager
{
    public function read($id_equipe){
        $s = "SELECT * FROM equipes WHERE id_equipe = :id_equipe";
        $r = $this->db->prepare($s);
        $r->BindValue(':id_equipe', $id_equipe, PDO::PARAM_INT);
        $r->execute();
        $data = $r->fetch(PDO::FETCH_ASSOC);
        return new Equipe($data);
    }

    public function readAll(){
        $s = "SELECT * FROM equipes";
        $r = $this->db->query($s);
        $equipeCollection = [];
        while($equipeData = $r->fetch(PDO::FETCH_ASSOC)){
            $equipe = new Equipe($equipeData);

            array_push($equipeCollection, $equipe);
        }
        return $equipeCollection;
    }
}

