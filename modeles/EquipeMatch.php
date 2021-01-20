<?php


class EquipeMatch extends Entity
{

    private $equipe_domicile;
    private $equipe_exterieur;
    private $id_match;


    /**
     * @return mixed
     */
    public function getequipe_domicile()
    {
        return $this->equipe_domicile;
    }

    /**
     * @param mixed $equipe_domicile
     */
    public function setequipe_domicile($equipe_domicile)
    {
        $this->equipe_domicile = $equipe_domicile;
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
    public function getequipe_exterieur()
    {
        return $this->equipe_exterieur;
    }

    /**
     * @param mixed $equipe_exterieur
     */
    public function setequipe_exterieur($equipe_exterieur)
    {
        $this->equipe_exterieur = $equipe_exterieur;
    }


}