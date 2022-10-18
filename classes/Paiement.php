<?php

class Paiement extends Database
{
    private $id;
    private $message;


    public function setInsertion($eleve, $frais, $montant)
    {
        $querry = "INSERT INTO `t_paiement`(`id_eleve`, `id_frais`, `montant_paie`, `date_paie`) VALUES (?,?,?, CURDATE())";
        $this->setQuerry($querry, array($eleve, $frais, $montant));
        $this->message = '<label class="alert alert-success btn-block">Enregistrement avec suucès ! !</label>';
    }




    public function gteFrais()
    {
        $query = "SELECT * FROM t_frais";
        $stmt = $this->setQuerry($query);
        return $stmt;
    }

    public function getCountPaiement()
    {
        $querry = "SELECT COUNT(*) as nbre FROM t_paiement";
        $stmt = Database::setQuerry($querry);
        foreach($stmt as $row)
        {
            return $row['nbre'];
        }
    }
    

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