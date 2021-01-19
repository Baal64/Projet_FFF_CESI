<?php


class UtilisateurManager extends Manager
{
    public function read($id_utilisateur){
        $s = "SELECT * FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
        $r = $this->db->prepare($s);
        $r->BindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $r->execute();
        $data = $r->fetch(PDO::FETCH_ASSOC);
        return new Utilisateur($data);
    }

    public function readAll(){
        $s = "SELECT * FROM utilisateurs";
        $r = $this->db->query($s);
        $utilisateurCollection = [];
        while($utilisateurData = $r->fetch(PDO::FETCH_ASSOC)){
            $utilisateur = new Utilisateur($utilisateurData);

            array_push($utilisateurCollection, $utilisateur);
        }
        return $utilisateurCollection;
    }

}