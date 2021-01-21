<?php


class JoueurMatch extends Entity
{
    private $id_joueur;
    private $id_match;
    private $statut_match;
    private $poste_match;
    private $placement_match;
    private $capitaine;
    private $capitaine_sup;

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
    public function getstatut_match()
    {
        return $this->statut_match;
    }

    /**
     * @param mixed $statut_match
     */
    public function setstatut_match($statut_match)
    {
        $this->statut_match = $statut_match;
    }

    /**
     * @return mixed
     */
    public function getposte_match()
    {
        return $this->poste_match;
    }

    /**
     * @param mixed $poste_match
     */
    public function setposte_match($poste_match)
    {
        $this->poste_match = $poste_match;
    }

    /**
     * @return mixed
     */
    public function getcapitaine()
    {
        return $this->capitaine;
    }

    /**
     * @param mixed $capitaine
     */
    public function setcapitaine($capitaine)
    {
        $this->capitaine = $capitaine;
    }

    /**
     * @return mixed
     */
    public function getcapitaine_sup()
    {
        return $this->capitaine_sup;
    }

    /**
     * @param mixed $capitaine_sup
     */
    public function setcapitaine_sup($capitaine_sup)
    {
        $this->capitaine_sup = $capitaine_sup;
    }

    /**
     * @return mixed
     */
    public function getplacement_match()
    {
        return $this->placement_match;
    }

    /**
     * @param mixed $placement_match
     */
    public function setplacement_match($placement_match)
    {
        $this->placement_match = $placement_match;
    }




}