<?php

class Tuteur extends Database
{

    private $id_tuteur;
    
    public function setInsertion($nom, $prenom, $profession, $phone, $adresse)
    {
        $querry = "INSERT INTO `t_tuteur`(`nom_tuteur`, `prenom_tuteur`, `profession_tuteur`, `phone_tuteur`, `adresse`) VALUES (?,?,?,?,?)";
        $this->setQuerry($querry, array($nom, $prenom, $profession, $phone, $adresse));
    }

    public function VerifyIdTuteur($phone): bool
    {
        $querry = "SELECT * FROM t_tuteur WHERE phone_tuteur =? ";
        $stmt = $this->setQuerry($querry, array($phone));
        $stmt->rowCount() == 1;
        return $stmt;
    }

    public function setUpdate($id, $nom, $prenom, $profession, $phone, $adresse)
    {
        $querry ="";
        $this->setQuerry($querry, array($nom, $prenom, $profession, $phone, $adresse));
    }



    /**
     * Get the value of id_tuteur
     */ 
    public function getId_tuteur()
    {
        return $this->id_tuteur;
    }

    /**
     * Set the value of id_tuteur
     *
     * @return  self
     */ 
    public function setId_tuteur($id_tuteur)
    {
        $this->id_tuteur = $id_tuteur;

        return $this;
    }
}