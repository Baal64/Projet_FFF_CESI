<?php



class Arbitre extends Entity
{

    private $id_arbitre;
    private $nom_arbitre;
    private $prenom_arbitre;
    private $nat_arbitre;


    /**
     * @return mixed
     */
    public function getid_arbitre()
    {
        return $this->id_arbitre;
    }

    /**
     * @param mixed $id_arbitre
     */
    public function setid_arbitre($id_arbitre)
    {
        $this->id_arbitre = $id_arbitre;
    }

    /**
     * @return mixed
     */
    public function getnom_arbitre()
    {
        return $this->nom_arbitre;
    }

    /**
     * @param mixed $nom_arbitre
     */
    public function setnom_arbitre($nom_arbitre)
    {
        $this->nom_arbitre = $nom_arbitre;
    }

    /**
     * @return mixed
     */
    public function getprenom_arbitre()
    {
        return $this->prenom_arbitre;
    }

    /**
     * @param mixed $prenom_arbitre
     */
    public function setprenom_arbitre($prenom_arbitre)
    {
        $this->prenom_arbitre = $prenom_arbitre;
    }

    /**
     * @return mixed
     */
    public function getnat_arbitre()
    {
        return $this->nat_arbitre;
    }

    /**
     * @param mixed $nat_arbitre
     */
    public function setnat_arbitre($nat_arbitre)
    {
        $this->nat_arbitre = $nat_arbitre;
    }

}