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
            $carton = new Carton($cartonData);

            array_push($cartonCollection, $carton);
        }
        return $cartonCollection;
    }

    public function createCarton(Carton $carton){
        $s = "INSERT INTO cartons (couleur_carton,temps_carton,id_match,id_joueur)VALUES(?,?,?,?)";
        $r = $this->db->prepare($s);

        $r->bindValue(1,$carton->getcouleur_carton(),PDO::PARAM_STR);
        $r->bindValue(2,$carton->gettemps_carton(),PDO::PARAM_STR);
        $r->bindValue(3,$carton->getid_match(),PDO::PARAM_INT);
        $r->bindValue(4,$carton->getid_joueur(),PDO::PARAM_INT);


        $ok = $r->execute();
        if($ok){
            return true;

        }else{
            return false;
        }

    }
}