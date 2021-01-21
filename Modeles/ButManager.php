<?php


class ButManager extends Manager
{

    public function read($id_but){
        $s = "SELECT * FROM but WHERE id_but = :id_but";
        $r = $this->db->prepare($s);
        $r->BindValue(':id_but', $id_but, PDO::PARAM_INT);
        $r->execute();
        $data = $r->fetch(PDO::FETCH_ASSOC);
        return new But($data);
    }

    public function readAll(){
        $s = "SELECT * FROM but";
        $r = $this->db->query($s);
        $butCollection = [];
        while($butData = $r->fetch(PDO::FETCH_ASSOC)){
            $but = new But($butData);

            array_push($butCollection, $but);
        }
        return $butCollection;
    }

    public function createBut(But $but){
        $s = "INSERT INTO but (temps_but,id_match,id_joueur)VALUES(?,?,?)";
        $r = $this->db->prepare($s);

        $r->bindValue(1,$but->gettemps_but(),PDO::PARAM_STR);
        $r->bindValue(2,$but->getid_match(),PDO::PARAM_INT);
        $r->bindValue(3,$but->getid_joueur(),PDO::PARAM_INT);


        $ok = $r->execute();
        if($ok){
            return true;

        }else{
            return false;
        }

    }

}