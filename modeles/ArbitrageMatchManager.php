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

    public function createArbitrageMatch(ArbitrageMatch $ab){
        $s = "INSERT INTO arbitrage_match (id_match,arbitre_principal,arbitre_adj_un,arbitre_adj_deux)VALUES(?,?,?,?)";
        $r = $this->db->prepare($s);

        $r->bindValue(1,$ab->getid_match(),PDO::PARAM_INT);
        $r->bindValue(2,$ab->getarbitre_principal(),PDO::PARAM_INT);
        $r->bindValue(3,$ab->getarbitre_adj_un(),PDO::PARAM_INT);
        $r->bindValue(4,$ab->getarbitre_adj_deux(),PDO::PARAM_INT);


        $ok = $r->execute();

        if($ok){
            return true;

        }else{
            return false;
        }

    }

}