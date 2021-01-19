<?php


class Equipe extends Entity
{

    private $id_equipe;
    private $nom_club;
    private $ville_club;
    private $stade_club;
    private $logo_club;
    private $entrain_equipe;
    private $adj_entrain_equipe;
    private $maillot_dom;
    private $maillot_ext;
    private $maillot_gard;

    /**
     * @return mixed
     */
    public function getid_equipe()
    {
        return $this->id_equipe;
    }

    /**
     * @param mixed $id_equipe
     */
    public function setid_equipe($id_equipe)
    {
        $this->id_equipe = $id_equipe;
    }

    /**
     * @return mixed
     */
    public function getnom_club()
    {
        return $this->nom_club;
    }

    /**
     * @param mixed $nom_club
     */
    public function setnom_club($nom_club)
    {
        $this->nom_club = $nom_club;
    }

    /**
     * @return mixed
     */
    public function getville_club()
    {
        return $this->ville_club;
    }

    /**
     * @param mixed $ville_club
     */
    public function setville_club($ville_club)
    {
        $this->ville_club = $ville_club;
    }

    /**
     * @return mixed
     */
    public function getstade_club()
    {
        return $this->stade_club;
    }

    /**
     * @param mixed $stade_club
     */
    public function setstade_club($stade_club)
    {
        $this->stade_club = $stade_club;
    }

    /**
     * @return mixed
     */
    public function getlogo_club()
    {
        return $this->logo_club;
    }

    /**
     * @param mixed $logo_club
     */
    public function setlogo_club($logo_club)
    {
        $this->logo_club = $logo_club;
    }

    /**
     * @return mixed
     */
    public function getentrain_equipe()
    {
        return $this->entrain_equipe;
    }

    /**
     * @param mixed $entrain_equipe
     */
    public function setentrain_equipe($entrain_equipe)
    {
        $this->entrain_equipe = $entrain_equipe;
    }

    /**
     * @return mixed
     */
    public function getadj_entrain_equipe()
    {
        return $this->adj_entrain_equipe;
    }

    /**
     * @param mixed $adj_entrain_equipe
     */
    public function setadj_entrain_equipe($adj_entrain_equipe)
    {
        $this->adj_entrain_equipe = $adj_entrain_equipe;
    }

    /**
     * @return mixed
     */
    public function getmaillot_dom()
    {
        return $this->maillot_dom;
    }

    /**
     * @param mixed $maillot_dom
     */
    public function setmaillot_dom($maillot_dom)
    {
        $this->maillot_dom = $maillot_dom;
    }

    /**
     * @return mixed
     */
    public function getmaillot_ext()
    {
        return $this->maillot_ext;
    }

    /**
     * @param mixed $maillot_ext
     */
    public function setmaillot_ext($maillot_ext)
    {
        $this->maillot_ext = $maillot_ext;
    }

    /**
     * @return mixed
     */
    public function getmaillot_gard()
    {
        return $this->maillot_gard;
    }

    /**
     * @param mixed $maillot_gard
     */
    public function setmaillot_gard($maillot_gard)
    {
        $this->maillot_gard = $maillot_gard;
    }


}