<?php

abstract class Database
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
        $db_name  = "gestion_ets_scolaire_db";
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
}