<?php

class Serveur
{
    private static $host;
    private static $db_name;
    private static $username;
    private static $password;
    private static $db;

    /**
     * 
     */
    public static function DbConnection($option= array())
    {
        $host     = "localhost"; 
        $db_name  = "gestion_ecoles";
        $username = "root";
        $password = "";
 
        $serveur = 'mysql:host='.$host.';dbname='.$db_name.';charset=utf8';
        try
        {
            self::$db = new PDO($serveur,$username, $password, $option);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$db;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * 
     */
    public static function setQuerry($sql, $data = array())
    {
        if (!empty($data)) 
        {
            $stmt = self::DbConnection()->prepare($sql);
            $stmt->execute($data);
        } 
        else 
        {
            $stmt = self::DbConnection()->query($sql);
        }
        return $stmt;
    }

    public function setVerifiEcolServeur($id_ecole) :bool
    {
        $querry = "SELECT * FROM t_ecole WHERE id_ecole = ?";
        $stmt = $this->setQuerry($querry, array($id_ecole));
        return $stmt->rowCount() == 1;
    }

    public function setEcoleInfosServeur($id_ecole)
    {
        $querry = "SELECT * FROM t_ecole WHERE id_ecole = ?";
        $stmt = $this->setQuerry($querry, array($id_ecole));
        return $stmt;
    }

    public function setEleve_serveur_id($id_eleve):bool
    {
        $querry = "SELECT * FROM t_eleve WHERE id_eleve = ?";
        $stmt = $this->setQuerry($querry, array($id_eleve));
        return $stmt->rowCount() == 1;
    }

    public function setEcole_serveur_id($id_eleve)
    {
        $querry = "SELECT * FROM t_eleve WHERE id_eleve = ?";
        $stmt = $this->setQuerry($querry, array($id_eleve));
        return $stmt;
    }

    public function getEcoleServeur()
    {
        $querry = "SELECT * FROM t_ecole";
        $stmt = $this->setQuerry($querry);
        return $stmt;
    }

    public function setInsert_Serveur(
        $id_ecole, $matricule, $nom, $postnom, $prenom, $sexe,
        $datenaisse, $lieunaisse, $nationalite)
    {
        $querry = "INSERT INTO `t_eleve`(`id_eleve`, `id_ecole`, `nom_eleve`, `postnom_eleve`, `prenom_eleve`, `sexe_eleve`, `datenaisse_eleve`, `lieunaisse_eleve`, `nationalite_eleve`, `date_enreg`) VALUES(?,?,?,?,?,?,?,?,?, CURDATE())";
        $data = array($matricule,$id_ecole, $nom, $postnom, $prenom, $sexe, $datenaisse, $lieunaisse, $nationalite);
        $this->setQuerry($querry, $data);
    }
}