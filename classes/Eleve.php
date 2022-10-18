<?php

class Eleve extends Database
{
    private $_matricule;
    private $nom;
    private $message;

    /**
     * 
     */
    public function setInsertion($id, $nom, $postnom, $prenom, $sexe,
     $datenaisse, $lieunaisse, $nationalite, $id_tuteur, $id_ecole)
    {
        $querry = "INSERT INTO `t_eleve`(`id_eleve`, `nom_eleve`, `postnom_eleve`, `prenom_eleve`, `sexe_eleve`, `datenaisse_eleve`, `lieunaisse_eleve`, `nationalite_eleve`, `id_tuteur`, `id_ecole`, `date_enreg`) VALUES(?,?,?,?,?,?,?,?,?,?, CURDATE())";
        $data = array($id, $nom, $postnom, $prenom, $sexe,
        $datenaisse, $lieunaisse, $nationalite, $id_tuteur, $id_ecole);
        $this->setQuerry($querry, $data);
    }

    /**
     * 
     */
    public function setUpdate()
    {
        
    }

    /**
     * 
    */
    public function getEleve()
    {
        $query = "SELECT t_inscrire.id_eleve, `nom_eleve`, `postnom_eleve`, `prenom_eleve`, sexe_eleve, `datenaisse_eleve`, `lieunaisse_eleve`, `nationalite_eleve`, t_inscrire.id_classe, `date_enreg` FROM `t_eleve`, t_inscrire WHERE t_eleve.id_eleve = t_inscrire.id_eleve;";
        $stmt = $this->setQuerry($query);
        return $stmt;
    }

    public function getEleveFull()
    {
        $query = "SELECT t_eleve.id_eleve, nom_eleve, postnom_eleve, prenom_eleve, id_classe, t_paiement.id_frais, montant_paie, date_paie FROM t_eleve, t_inscrire, t_paiement WHERE t_inscrire.id_eleve = t_eleve.id_eleve AND t_eleve.id_eleve = t_paiement.id_eleve;";
        $stmt = $this->setQuerry($query);
        return $stmt;
    }

    public function getEleveInscrit()
    {
        $query = "SELECT id_inscri, t_inscrire.id_classe as classe, `aneescolaire`, `date_inscri`,`nom_eleve`, `postnom_eleve`,`prenom_eleve`, `nationalite_eleve`, t_inscrire.id_option as option, `nom_ecole` FROM t_classe, t_eleve, t_inscrire,t_option, t_ecole WHERE t_option.id_option = t_inscrire.id_option AND t_classe.id_classe = t_inscrire.id_classe AND t_eleve.id_eleve = t_inscrire.id_eleve AND t_eleve.id_ecole = t_ecole.id_ecole";
        $stmt = $this->setQuerry($query);
        return $stmt;
    }

    public function getCountEleve(): int
    {
        $querry = "SELECT COUNT(*) as nombre FROM t_eleve";
        $stmt = $this->setQuerry($querry);
        foreach($stmt as $count)
        {
            return $count['nombre'];
        }
    }

    public function getCountInscrit(): int
    {
        $querry = "SELECT COUNT(*) as nombre FROM t_inscrire";
        $stmt = $this->setQuerry($querry);
        foreach($stmt as $count)
        {
            return $count['nombre'];
        }
    }

    /**
     * Get the value of _matricule
     */ 
    public function get_matricule()
    {
        return $this->_matricule;
    }

    /**
     * Set the value of _matricule
     *
     * @return  self
     */ 
    public function set_matricule($_matricule)
    {
        $this->_matricule = $_matricule;
        return $this;
    }
}