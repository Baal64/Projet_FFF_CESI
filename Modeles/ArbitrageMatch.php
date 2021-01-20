<?php


class ArbitrageMatch extends Entity
{
    private $id_match;
    private $id_arbitre;
    private $arbitre_principal;
    private $arbitre_adj_un;
    private $arbitre_adj_deux;

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
    public function getarbitre_principal()
    {
        return $this->arbitre_principal;
    }

    /**
     * @param mixed $arbitre_principal
     */
    public function setarbitre_principal($arbitre_principal)
    {
        $this->arbitre_principal = $arbitre_principal;
    }

    /**
     * @return mixed
     */
    public function getarbitre_adj_un()
    {
        return $this->arbitre_adj_un;
    }

    /**
     * @param mixed $arbitre_adj_un
     */
    public function setarbitre_adj_un($arbitre_adj_un)
    {
        $this->arbitre_adj_un = $arbitre_adj_un;
    }

    /**
     * @return mixed
     */
    public function getarbitre_adj_deux()
    {
        return $this->arbitre_adj_deux;
    }

    /**
     * @param mixed $arbitre_adj_deux
     */
    public function setarbitre_adj_deux($arbitre_adj_deux)
    {
        $this->arbitre_adj_deux = $arbitre_adj_deux;
    }



}