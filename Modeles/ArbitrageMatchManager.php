<?php


class ArbitrageMatchManager extends Manager
{

    public function read($id_match){
        $s = "SELECT * FROM arbitrage_match WHERE id_match = :id_match";
        $r = $this->db->prepare($s);
        $r->BindValue(':id_match', $id_match, PDO::PARAM_INT);
        $r->execute();
        $data = $r->fetch(PDO::FETCH_ASSOC);
        return new ArbitageMatch($data);
    }

    public function readAll(){
        $s = "SELECT * FROM arbitrage_match";
        $r = $this->db->query($s);
        $arbitrageMatchCollection = [];
        while($arbitrageMatchData = $r->fetch(PDO::FETCH_ASSOC)){
            $arbitrageMatch = new Equipe($arbitrageMatchData);

            array_push($arbitrageMatchCollection, $arbitrageMatch);
        }
        return $arbitrageMatchCollection;
    }



}