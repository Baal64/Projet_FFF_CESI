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
            $but = new Equipe($butequipeData);

            array_push($butCollection, $but);
        }
        return $butCollection;
    }


}