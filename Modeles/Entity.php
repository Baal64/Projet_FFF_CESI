<?php


abstract class Entity{

   /* public function hydrate($donnees)
    {
        foreach ($donnees as $attribut => $valeur)
        {
            $methode = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));

            if (is_callable(array($this, $methode)))
            {
                $this->$methode($valeur);
            }
        }
    }*/

    public function hydrate(array $infos)
    {
        foreach ($infos as $clef => $donnee) {
            // On récupère le nom du setter correspondant à l'attribut.
            $methode = 'set' . $clef;
            // Si le setter correspondant existe.
            if (method_exists($this, $methode))
            {
                // On appelle le setter.
                $this->$methode($donnee);
            }
        }
    }


}