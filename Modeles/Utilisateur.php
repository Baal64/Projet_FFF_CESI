<?php


class Utilisateur extends Entity
{

    private $id;
    private $nom_utilisateur;
    private $prenom_utilisateur;
    private $role_utilisateur;
    private $email_utilisateur;
    private $id_connexion;
    private $mdp_connexion;
    private $id_club;

    /**
     * @return mixed
     */
    public function getIdClub()
    {
        return $this->id_club;
    }

    /**
     * @return mixed
     */
    public function getid()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setid($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getnom_utilisateur()
    {
        return $this->nom_utilisateur;
    }

    /**
     * @param mixed $nom_utilisateur
     */
    public function setnom_utilisateur($nom_utilisateur)
    {
        $this->nom_utilisateur = $nom_utilisateur;
    }

    /**
     * @return mixed
     */
    public function getprenom_utilisateur()
    {
        return $this->prenom_utilisateur;
    }

    /**
     * @param mixed $prenom_utilisateur
     */
    public function setprenom_utilisateur($prenom_utilisateur)
    {
        $this->prenom_utilisateur = $prenom_utilisateur;
    }

    /**
     * @return mixed
     */
    public function getrole_utilisateur()
    {
        return $this->role_utilisateur;
    }

    /**
     * @param mixed $role_utilisateur
     */
    public function setrole_utilisateur($role_utilisateur)
    {
        $this->role_utilisateur = $role_utilisateur;
    }

    /**
     * @return mixed
     */
    public function getemail_utilisateur()
    {
        return $this->email_utilisateur;
    }

    /**
     * @param mixed $email_utilisateur
     */
    public function setemail_utilisateur($email_utilisateur)
    {
        $this->email_utilisateur = $email_utilisateur;
    }

    /**
     * @return mixed
     */
    public function getid_connexion()
    {
        return $this->id_connexion;
    }

    /**
     * @param mixed $id_connexion
     */
    public function setid_connexion($id_connexion)
    {
        $this->id_connexion = $id_connexion;
    }

    /**
     * @return mixed
     */
    public function getmdp_connexion()
    {
        return $this->mdp_connexion;
    }

    /**
     * @param mixed $mdp_connexion
     */
    public function setmdp_connexion($mdp_connexion)
    {
        $this->mdp_connexion = $mdp_connexion;
    }




}