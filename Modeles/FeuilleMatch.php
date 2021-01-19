<?php

class FeuilleMatch extends Entity
{
    private $feuilleMatch;
    private $equipeDom;
    private $equipeExt;

    private $arbitreP;
    private $arbitreAss1;
    private $arbitreAss2;

    private $lieu;
    private $date;


    /**
     * @return mixed
     */
    public function getfeuillematch()
    {
        return $this->feuilleMatch;
    }

    /**
     * @param mixed $feuilleMatch
     */
    public function setfeuillematch($lieu, $date)
    {
        $match =
        $s = "SELECT * FROM matchs WHERE lieu_match = :$lieu AND date_match = :$date";
        $r = $this->db->prepare($s);
        $r->BindValue(':$lieu', $lieu, ':$date', $date, PDO::PARAM_INT);
        $r->execute();
        $this->feuilleMatch = $r->fetch(PDO::FETCH_ASSOC);
        return $this->feuilleMatch;
    }

    // Louis II
    // La Mosson

    // Allianz Riviera
    // Parc des Princes
}

?>