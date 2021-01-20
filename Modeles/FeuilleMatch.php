<?php

class FeuilleMatch extends Entity
{

    private $lieu;
    private $lieu_substitut;
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
    
    /**
     * @return mixed
     */
    public function getlieu_substitut()
    {
        return $this->lieu_substitut;
    }

    /**
     * @param mixed $lieu_substitut
     */
    public function setlieu_substitut($lieu_substitut)
    {
        $this->lieu_substitut = $lieu_substitut;
    }



}

?>