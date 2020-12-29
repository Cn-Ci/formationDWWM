<?php 
include_once ('Utilisateur.php');

        function inserUtil($username, $password) {
            $utilisateur1 = new Utilisateur();
            $utilisateur1->setUsername($username)->setPassword($password);

            $id = $utilisateur1->getId();
            $username = $utilisateur1->getUsername();
            $password = $utilisateur1->getPassword();


            $db = new mysqli('localhost', 'root', "", 'afpa_test');    
            
            //On vérifie la connexion
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

            
            
            
            
            

       

