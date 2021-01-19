<?php

class FeuilleMatch extends Entity
{

    private $lieu;
    private $date;


    /**
     * @return mixed
     */
    public function getlieu()
    {
        return $this->lieu;
    }

    /**
     * @param mixed $lieu
     */
    public function setlieu($lieu)
    {
        $this->lieu = $lieu;
    }

    /**
     * @return mixed
     */
    public function getdate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setdate($date)
    {
        $this->date = $date;
    }



}

?>