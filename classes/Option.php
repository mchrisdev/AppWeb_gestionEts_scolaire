<?php

class Option extends Database
{
    private $id_option;

    public function getOption()
    {
        $query = "SELECT * FROM t_option";
        $stmt = $this->setQuerry($query);
        return $stmt;
    }

    public function setInsertion($classe)
    {
        $query = "INSERT INTO t_option VALUES (?)";
        $stmt = $this->setQuerry($query, array($classe));
        return $stmt;
    }

    public function setUpdate($option)
    {
        $query = "UPDATE t_option SET id_option = ?";
        $stmt = $this->setQuerry($query, array($option));
        return $stmt;
    }

    public function setDelete($option)
    {
        $query = "DELETE FROM t_option WHERE id_option = ?";
        $stmt = $this->setQuerry($query, array($option));
        return $stmt;
    }
}