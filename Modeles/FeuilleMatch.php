<?php

class FeuilleMatch extends Entity
{
    // private $feuilleMatch;
    private $equipeDom;
    private $equipeExt;

    private $arbitreP;
    private $arbitreAss1;
    private $arbitreAss2;

    private $lieu;
    private $date;


   
    // /**
    // * @return mixed
    //  */
    // public function getFeuilleMatch()
    // {
    //     return $this->feuilleMatch;
    // }

    // /**
    //  * @param mixed $feuilleMatch
    //  */
    // public function setFeuilleMatch($feuilleMatch)
    // {
    //     $this->feuilleMatch = $feuilleMatch;
    // }

    /**
     * @return mixed
     */
    public function getEquipeDom()
    {
        return $this->equipeDom;
    }

    /**
     * @param mixed $equipeDom
     */
    public function setEquipeDom($equipeDom)
    {
        $this->equipeDom = $equipeDom;
    }

    /**
     * @return mixed
     */
    public function getEquipeExt()
    {
        return $this->equipeExt;
    }

    /**
     * @param mixed $equipeExt
     */
    public function setEquipeExt($equipeExt)
    {
        $this->equipeExt = $equipeExt;
    }

    /**
     * @return mixed
     */
    public function getArbitreP()
    {
        return $this->arbitreP;
    }

    /**
     * @param mixed $arbitreP
     */
    public function setArbitreP($arbitreP)
    {
        $this->arbitreP = $arbitreP;
    }

    /**
     * @return mixed
     */

    public function getArbitreAss1()
    {
        return $this->arbitreAss1;
    }

    /**
     * @param mixed $arbitreAss1
     */
    public function setArbitreAss1($arbitreAss1)
    {
        $this->arbitreAss1 = $arbitreAss1;
    }

    /**
     * @return mixed
     */
    public function getArbitreAss2()
    {
        return $this->arbitreAss2;
    }

    /**
     * @param mixed $arbitreAss2
     */
    public function setArbitreAss2($arbitreAss2)
    {
        $this->arbitreAss2 = $arbitreAss2;
    }

    /**
     * @return mixed
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param mixed $lieu
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
}

?>