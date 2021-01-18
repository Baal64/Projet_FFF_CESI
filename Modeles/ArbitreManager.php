<?php


class ArbitreManager
{

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=fff;charset=utf8','root','',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

    public function read($id_arbitre){
        $s = "SELECT * FROM arbitres WHERE id_arbitre = :id_arbitre";
        $r = $this->db->prepare($s);
        $r->BindValue(':id_arbitre', $id_arbitre, PDO::PARAM_INT);
        $r->execute();
        $data = $r->fetch(PDO::FETCH_ASSOC);
        return new Arbitre($data);
    }

    public function readAll(){
        $s = "SELECT * FROM arbitres";
        $r = $this->db->query($s);
        $arbitreCollection = [];
        while($arbitreData = $r->fetch(PDO::FETCH_ASSOC)){
            $arbitre = new Arbitre ($arbitreData);

            array_push($arbitreCollection, $arbitre);
        }
        return $arbitreCollection;
    }

}