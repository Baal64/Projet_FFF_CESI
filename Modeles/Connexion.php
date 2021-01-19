<?php
//session_start();

class Connexion extends Manager{

    private $utilisateur;

    public function connect($identifiant,$mdp){
        if(isset($_SESSION['connected']) && $_SESSION['connected']==true) {
            $this->utilisateur = $_SESSION['data_connected_user'];
        }
        else {
            $s = "SELECT * FROM utilisateurs WHERE (BINARY id_connexion='$identifiant' OR email_utilisateur='$identifiant') AND BINARY mdp_connexion='$mdp'";
            $r = $this->db->query($s);
            if($utilisateurData = $r->fetch(PDO::FETCH_ASSOC)) {
                $this->utilisateur = new Utilisateur($utilisateurData);
                $_SESSION['connected'] = true;
                $_SESSION['data_connected_user'] = $utilisateurData;
            }
            return true;
        }
    }

    public function getUser(){
        return $this->utilisateur;
    }

}