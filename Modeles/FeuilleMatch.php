<?php

class FeuilleMatch extends Entity
{
    private $id_match;
    private $lieu_match;
    private $lieu_substitut;
    private $date_match;

    /**
     * @return mixed
     */
    public function getid_match()
    {
        return $this->id_match;
    }

    /**
     * @param mixed $id_match
     */
    public function setid_match($id_match)
    {
        $this->id_match = $id_match;
    }


    /**
     * @return mixed
     */
    public function getlieu_match()
    {
        return $this->lieu_match;
    }

    /**
     * @param mixed $lieu_match
     */
    public function setlieu_match($lieu_match)
    {
        $this->lieu_match = $lieu_match;
    }

    /**
     * @return mixed
     */
    public function getdate_match()
    {
        return $this->date_match;
    }

    /**
     * @param mixed $date
     */
    public function setdate_match($date_match)
    {
        $this->date_match = $date_match;

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