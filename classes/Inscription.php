<?php

class Inscription extends Database
{
    private $id;
    private $message;


    public function setInsertion($id_eleve, $classe, $annescolaire, $option)
    {
        $querry = "INSERT INTO `t_inscrire`(`id_eleve`, `id_classe`, `aneescolaire`, `date_inscri`, `id_option`) VALUES (?,?,?, CURDATE(), ?)";
        $this->setQuerry($querry, array($id_eleve, $classe, $annescolaire, $option));
        $this->message = "Enregistrement avec succès !";
    }

    // public function setInsertAnneScolaire($annescolaire)
    // {
    //     $querry = "INSERT INTO `t_anneescolaire`(`anneescolaire`) VALUES (?)";
    //     $this->setQuerry($querry, array($annescolaire));
    //     $this->message = "Enregistrement avec succès !";
    // }



    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}