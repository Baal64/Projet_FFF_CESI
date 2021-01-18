<?php

require('Entity.php');

class Joueur extends Entity
{

    private $id_joueur;
    private $nom_joueur;
    private $prenom_joueur;
    private $num_joueur;
    private $statut_joueur;
    private $poste_joueur;
    private $ancien_joueur;
    private $id_equipe;





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
    public function getnom_joueur()
    {
        return $this->nom_joueur;
    }

    /**
     * @param mixed $nom_joueur
     */
    public function setnom_joueur($nom_joueur)
    {
        $this->nom_joueur = $nom_joueur;
    }

    /**
     * @return mixed
     */
    public function getprenom_joueur()
    {
        return $this->prenom_joueur;
    }

    /**
     * @param mixed $prenom_joueur
     */
    public function setprenom_joueur($prenom_joueur)
    {
        $this->prenom_joueur = $prenom_joueur;
    }

    /**
     * @return mixed
     */
    public function getnum_joueur()
    {
        return $this->num_joueur;
    }

    /**
     * @param mixed $num_joueur
     */
    public function setnum_joueur($num_joueur)
    {
        $this->num_joueur = $num_joueur;
    }

    /**
     * @return mixed
     */
    public function getstatut_joueur()
    {
        return $this->statut_joueur;
    }

    /**
     * @param mixed $statut_joueur
     */
    public function setstatut_joueur($statut_joueur)
    {
        $this->statut_joueur = $statut_joueur;
    }

    /**
     * @return mixed
     */
    public function getposte_joueur()
    {
        return $this->poste_joueur;
    }

    /**
     * @param mixed $poste_joueur
     */
    public function setposte_joueur($poste_joueur)
    {
        $this->poste_joueur = $poste_joueur;
    }

    /**
     * @return mixed
     */
    public function getancien_joueur()
    {
        return $this->ancien_joueur;
    }

    /**
     * @param mixed $ancien_joueur
     */
    public function setancien_joueur($ancien_joueur)
    {
        $this->ancien_joueur = $ancien_joueur;
    }

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




}

