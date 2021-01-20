<?php


class EquipeMatch extends Entity
{
    private $id_match;
    private $id_equipe;
    private $dom;
    private $ext;

    /**
     * @return mixed
     */

    public function getIdMatch()
    {
        return $this->id_match;
    }

    /**
     * @return mixed
     */
    public function getIdEquipe()
    {
        return $this->id_equipe;
    }

    /**
     * @return mixed
     */
    public function getDom()
    {
        return $this->dom;
    }

    /**
     * @return mixed
     */
    public function getExt()
    {
        return $this->ext;
    }
}