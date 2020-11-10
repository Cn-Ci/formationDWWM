<?php 
include_once('Utilisateur.php');

Class UtilisateurMysqliDAO {
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


    public function getId() : ?int
    {
        return $this->id;
    }

    public function setId(?int $id) : self
    {
        $this->id = $id;
        return $this;
    }


    static function inserUtil($username, $password) {
        $utilisateur1 = new UtilisateurModel();
        $utilisateur1->setUsername($username)->setPassword($password);

        $id = $utilisateur1->getId();
        $username = $utilisateur1->getUsername();
        $password = $utilisateur1->getPassword();

        $db = new mysqli('localhost', 'root', "", 'afpa_test');    
        if($db->connect_error)
        {
            die('Erreur : ' .$db->connect_error);
        }
        $stmt = $db->prepare("INSERT INTO utilisateur values ( NULL, ?, ?, 'utilisateur')");
        $stmt->bind_param("ss", $username, $password); 
        $stmt->execute();
        
        //* Verify request
        if(!$stmt->execute())
        {
            echo 'K.O';
        }
        $db->close();
    } 

    function researchutilisateurMail($username) {
        $db = new mysqli('localhost', 'root', "", 'afpa_test'); 

        if($db->connect_error){
            die('Erreur : ' .$db->connect_error);
        }
        $query = "SELECT * FROM utilisateur WHERE username = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data= $rs->fetch_array(MYSQLI_ASSOC);

        $rs->free();
        $db->close(); 

        return $data;
    }

    function showButton($url1, $url2, $nameButton1, $nameButton2) {
        echo "
            <br>
                <a type='button' class='btn btn-primary' href='$url1'>$nameButton1</a>
                <a type='button' class='btn btn-primary' href='$url2'>$nameButton2</a>
            <br>";
    }

}