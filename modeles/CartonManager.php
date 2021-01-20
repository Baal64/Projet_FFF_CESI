<?php


class CartonManager extends Manager
{

    public function read($id_carton){
        $s = "SELECT * FROM cartons WHERE id_carton = :id_carton";
        $r = $this->db->prepare($s);
        $r->BindValue(':id_carton', $id_carton, PDO::PARAM_INT);
        $r->execute();
        $data = $r->fetch(PDO::FETCH_ASSOC);
        return new Carton($data);
    }

    public function readAll(){
        $s = "SELECT * FROM cartons";
        $r = $this->db->query($s);
        $cartonCollection = [];
        while($cartonData = $r->fetch(PDO::FETCH_ASSOC)){
            $carton = new Equipe($cartonData);

            array_push($cartonCollection, $carton);
        }
        return $cartonCollection;
    }


}