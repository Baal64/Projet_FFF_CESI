<?php
//session_start();

class Connexion extends Manager{

    private $utilisateur;

    public function connect($identifiant,$mdp){
        $s = "SELECT * FROM utilisateurs WHERE (BINARY id_connexion='$identifiant' OR email_utilisateur='$identifiant') AND BINARY mdp_connexion='$mdp'";
        $r = $this->db->query($s);
        if($utilisateurData = $r->fetch(PDO::FETCH_ASSOC))
            return $utilisateurData;
            //$this->utilisateur = new Utilisateur($utilisateurData);
        //return $this->utilisateur;
    }

}