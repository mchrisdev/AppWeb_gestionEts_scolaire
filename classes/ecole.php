<?php
class Ecole extends Database
{
    private $id_ecole;
    private $_serveur;

    public function setEcole($id, $nom, $ville, $province, $type)
    {

        $querry = "SELECT * FROM t_ecole WHERE id_ecole = ? ";
        $stmt = $this->setQuerry($querry, array($id));
        if($stmt->rowCount() == 1)
        {
            $this->setId_ecole($id);
        }
        else
        {
            $querry = "INSERT INTO `t_ecole`(`id_ecole`, `nom_ecole`, `ville_ecole`, `province_ecole`, `tyoe_ecole`) VALUES (?,?,?,?,?)";
            $this->setQuerry($querry, array($id, $nom, $ville, $province, htmlspecialchars( $type)));
        }
    }

    public function setIdEcole($id)
    {
        $querry = "SELECT * FROM t_ecole WHERE id_ecole = ? ";
        $stmt = $this->setQuerry($querry, array($id));
        if($stmt->rowCount() == 1)
        {
            $result = $stmt->fetchAll();
            foreach($result as $donne)
            {
                return $this->id_ecole = $donne[''];
            }
            $this->setId_ecole($id);
        }
    }

    /**
     * Get the value of id_ecole
     */ 
    public function getId_ecole()
    {
        return $this->id_ecole;
    }

    /**
     * Set the value of id_ecole
     *
     * @return  self
     */ 
    public function setId_ecole($id_ecole)
    {
        $this->id_ecole = $id_ecole;

        return $this;
    }
}