<?php

class Classe extends Database
{
    private $id_classe;


    public function getClasse()
    {
        $query = "SELECT * FROM t_classe";
        $stmt = $this->setQuerry($query);
        return $stmt;
    }

    public function setInsertion($classe)
    {
        $query = "INSERT INTO t_classe VALUES (?)";
        $stmt = $this->setQuerry($query, array($classe));
        return $stmt;
    }

    public function setUpdate($classe)
    {
        $query = "UPDATE t_classe SET id_classe=?";
        $stmt = $this->setQuerry($query, array($classe));
        return $stmt;
    }

}