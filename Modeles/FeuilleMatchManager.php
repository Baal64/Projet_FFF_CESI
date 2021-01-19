<? php
class FeuilleMatchManager{

    public function readAll(){
        $s = "SELECT * FROM matchs";
        $r = $this->db->query($s);
        $matchCollection = [];
        while($matchData = $r->fetch(PDO::FETCH_ASSOC)){
            $match = new Match ($matchData);

            array_push($matchCollection, $match);
        }
        return $matchCollection;
    }

} 
?>