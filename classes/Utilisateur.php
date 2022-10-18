<?php

class Utilisateur extends Database
{
    private $_id;
    private $_useName;
    private $_userPassword;
    private $_userToken;
    private $_userRole;
    private $_message;

    /**
     * Constructeur
     * initialisation de variable user_token 
    */
    public function __construct()
    {
        $this->_userToken = uniqid(mt_rand(1,10000)).rand(0,100000);
    }

    /**
     *  Méthode setInsertion permet de faire insertion de nouveau user
     */
    public function setInsertion($name, $password, $role)
    {
        if(!empty($name) AND !empty($password) AND !empty($role))
        {
            $passh = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO `t_utilisateur`(`user_name`, `user_password`, `user_role`, `token`) VALUES (?,?,?,?) ";
            $data = array($name, $passh, $role, $this->_userToken);
            $stmt = $this->setQuerry($query, $data);
            if($stmt)
            {
                $this->_message = '<label class="alert alert-success btn-block">Enregistrement avec success! </label>';
            }
            else
            {
                $this->_message = '<label class="alert alert-danger btn-block">Erreur d\'insertion </label>';
            }
        }
        else
        {
            $this->_message = '<label class="alert alert-danger btn-block">Veuillez remplir tous les chmaps  !</label>';
        }
    }

    public function setVerifyUser($name,$password)
    {
        if(!empty($name) AND !empty($password))
        {
            $query = "SELECT * FROM t_utilisateur WHERE user_name = '" . $name. "' ";
            $stmt = $this->setQuerry($query);
            if ($stmt->rowCount() > 0 ) 
            {
                $result = $stmt->fetchAll();
                foreach ($result as $row) 
                {
                    $_SESSION['id_user'] = $row['id_user'];
                    $_SESSION['token'] = $row['token'];
                    
                    if (password_verify($_POST["password"], $row["user_password"]))
                    {
                        header('Location:tableau-bord.php?id='.$_SESSION['token']);
                    }
                    else
                    {
                        $this->_message = '<label class="alert alert-danger btn-block">Votre Mot de passe est incorrect !</label>';
                    }
                }
            }
            else{
                $this->_message = '<label class="alert alert-danger btn-block">le numéro d\'inscription est incorrect !</label>';

            }
        }
        else
        {
            $this->_message = '<label class="alert alert-danger btn-block">Veuillez remplir tous les champs  !</label>';
        } 
    }

    public function setUser($token) 
    {
        $query = "SELECT * FROM t_utilisateur WHERE token = '".$token."'";
        $stmt = $this->setQuerry($query);
        $stmt->rowCount() == 1;
        return $stmt->fetchAll();
    }

    public function getUtilisateur()
    {
        $query = "SELECT * FROM t_utilisateur";
        $stmt = $this->setQuerry($query);
        return $stmt;
    }

    public function setDelete($id)
    {
        $query = "SELECT * FROM t_utilisateur WHERE id_user = ? ";
        $stmt = $this->setQuerry($query, array($id));
        if($stmt->rowCount() > 0)
        {
            $query = "DELETE FROM t_utilisateur WHERE id_user = ?";
            $stmt = $this->setQuerry($query, array($id));
        }
        else
        {
            header('Location:404.php');
        }
    }

    /**
     * Get the value of _id
     */ 
    public function get_id()
    {
        return $this->_id;
    }

    /**
     * Set the value of _id
     *
     * @return  self
     */ 
    public function set_id($_id)
    {
        $this->_id = $_id;

        return $this;
    }

    /**
     * Get the value of _useName
     */ 
    public function get_useName()
    {
        return $this->_useName;
    }

    /**
     * Set the value of _useName
     *
     * @return  self
     */ 
    public function set_useName($_useName)
    {
        $this->_useName = $_useName;

        return $this;
    }

    /**
     * Get the value of _userPassword
     */ 
    public function get_userPassword()
    {
        return $this->_userPassword;
    }

    /**
     * Set the value of _userPassword
     *
     * @return  self
     */ 
    public function set_userPassword($_userPassword)
    {
        $this->_userPassword = $_userPassword;

        return $this;
    }

    /**
     * Get the value of _message
     */ 
    public function get_message()
    {
        return $this->_message;
    }

    /**
     * Set the value of _message
     *
     * @return  self
     */ 
    public function set_message($_message)
    {
        $this->_message = $_message;
        return $this;
    }

    /**
     * Get the value of _userToken
     */ 
    public function getToken($token): bool 
    {
        $query = "SELECT * FROM t_utilisateur WHERE token = '".$token."'";
        $stmt = $this->setQuerry($query);
        return $stmt->rowCount() == 1;
    }

    /**
     * Set the value of _userToken
     *
     * @return  self
     */ 
    public function set_userToken($_userToken)
    {
        $this->_userToken = $_userToken;

        return $this;
    }
}
