<?php 

Class Utilisateur {
    private $id;
    private $username;
    private $password;
    private $profil;

    public function __toString() :string
    {
        return " \n\n[id] : " . $this->id 
             . " [username] : " . $this->username
             . " [password] : " . $this->password 
             . " [profil] : " . $this->profil 
             . "\n";
    }

    public function getUsername() : string
    {
        return $this->username;
    }
    public function setUsername(string $username) : self
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword() :string 
    {
        return $this->password;
    }
    public function setPassword(string $password) : self
    {
        $this->password = $password;
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


    public function getId() : int
    {
        return $this->id;
    }
    public function setId(int $id) : self
    {
        $this->id = $id;
        return $this;
    }
}