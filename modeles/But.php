<?php


class But extends Entity
{
    private $id_but;
    private $temps_but;
    private $id_match;
    private $id_joueur;

    /**
     * @return mixed
     */
    public function getid_but()
    {
        return $this->id_but;
    }

    /**
     * @param mixed $id_but
     */
    public function setid_but($id_but)
    {
        $this->id_but = $id_but;
    }

    /**
     * @return mixed
     */
    public function gettemps_but()
    {
        return $this->temps_but;
    }

    /**
     * @param mixed $temps_but
     */
    public function settemps_but($temps_but)
    {
        $this->temps_but = $temps_but;
    }

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
    public function getid_joueur()
    {
        return $this->id_joueur;
    }

    /**
     * @param mixed $id_joueur
     */
    public function setid_joueur($id_joueur)
    {
        $this->id_joueur = $id_joueur;
    }


}