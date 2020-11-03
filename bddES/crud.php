<?php 

function inserUtil($username, $password, $profil) {
    $utilisateur1 = new Utilisateur();
    $utilisateur1->setUsername($username)->setPassword($password)->setProfil($profil);

    $id = $utilisateur1->getId();
    $username = $utilisateur1->getUsername();
    $password = $utilisateur1->getPassword();
    $profil = $utilisateur1->getProfil();


    $db = new mysqli('localhost', 'root', "", 'afpa_test');    
    
    //On vérifie la connexion
    if($db->connect_error){
        die('Erreur : ' .$db->connect_error);
    }
    echo 'Connexion réussie ';

    $stmt = $db->prepare("INSERT INTO utilisateur values ( NULL, ?, ?, ?)");


  /*   $query = "INSERT INTO utilisateur values(NULL, '$username', '$password', '$profil')";
    echo $query; */

   /*  $stmt = $db->prepare("INSERT INTO utilisateur (`id`, `username`, `password`, `profil`)"); */
    
   
    $stmt->bind_param("sss", $username, $password, $profil); 
    
     //* Verify request
    if($stmt->execute()){
        echo 'O.K';
    } else {
        echo 'K.O';
    }
   
    $db->close();

} 

function verif($username, $password) {
   
    if (isset($username)) {

    $db = new mysqli('localhost', 'root', "", 'afpa_test');    
 

            if($db->connect_error){
                die('Erreur : ' .$db->connect_error);
            }

            $query = "SELECT username,password FROM utilisateur WHERE username = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data= $rs->fetch_array(MYSQLI_ASSOC);

            if (isset($data) && isset($password)) 
            {
                
                $trouve = password_verify($password,$data['password']);
                echo "Connexion réussie"; 
                return $trouve;
                

            }else
            echo "echec connexion";
            

        mysqli_free_result($rs); 
        mysqli_close($db); 
    }
       
}

