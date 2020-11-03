<?php 

Class Utilisateur {
    private $id;
    private $username;
    private $password;
    public static $profil = 'utilisateur';


    public function __toString() :string
    {
        return " \n\n[id] : " . $this->id 
             . " [username] : " . $this->username
             . " [password] : " . $this->password 
             . " [profil] : " . $this->profil 
             . "\n";
    }


    /**
     * Get the value of username
     */ 
    public function getUsername() : string
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername(string $username) : self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword() :string 
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword(string $password) : self
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);

        return $this;
    }

    
    public function getProfil():string
    {
        return self::$profil;
    }

   
    public function setProfil(string $profil):self
    {
        self::$profil = $profil;

        return $this;
    }

  

    /**
     * Get the value of id
     */ 
    public function getId() : ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(?int $id) : self
    {
        $this->id = $id;

        return $this;
    }
}