<?php


class Carton extends Entity
{

    private $id_carton;
    private $couleur_carton;
    private $temps_carton;
    private $id_match;
    private $id_joueur;

    /**
     * @return mixed
     */
    public function getid_carton()
    {
        return $this->id_carton;
    }

    /**
     * @param mixed $id_carton
     */
    public function setid_carton($id_carton)
    {
        $this->id_carton = $id_carton;
    }

    /**
     * @return mixed
     */
    public function getcouleur_carton()
    {
        return $this->couleur_carton;
    }

    /**
     * @param mixed $couleur_carton
     */
    public function setcouleur_carton($couleur_carton)
    {
        $this->couleur_carton = $couleur_carton;
    }

    /**
     * @return mixed
     */
    public function gettemps_carton()
    {
        return $this->temps_carton;
    }

    /**
     * @param mixed $temps_carton
     */
    public function settemps_carton($temps_carton)
    {
        $this->temps_carton = $temps_carton;
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