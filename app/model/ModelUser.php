<?php
namespace app\model;

use app\entity\User;
use PDO;
use Exception;


class ModelUser extends Dao {


        public function getUser(string $email) {
                try {
                        $bddConnect = $this->pdoConnect();

                        $requestLogin = "SELECT * FROM Utilisateur WHERE email_utilisateur=:email";
                        $statement = $bddConnect->prepare($requestLogin);
                
                        $statement->bindParam('email', $email);
                        $statement->execute();

                        if ($statement->rowCount() == 1) {
                                $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'app\entity\User.php');
                                echo '<br>'.'REQUEST SUCCESS';
                                return $statement->fetch();
                        
                        }

                } catch (Exception $e) {
                        throw new Exception("Error Request", 1);
                        
                }
        }

        public function newUser(string $email, string $password, string $pseudo, string $nom, string $prenom) {
                try {
                    $bddConnect = $this->pdoConnect();

                    $requestNew = "INSERT INTO Utilisateur (`email_utilisateur`,`password_utilisateur`,`pseudo_utilisateur`,`nom_utilisateur`,`prenom_utilisateur`,`role_utilisateur`)
                    VALUES (:email, :password, :pseudo, :nom, :prenom, :role)";

                       
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $role = 'ROLE_USER'; 

                    $statement = $bddConnect->prepare($requestNew);
                    $statement->bindParam('email', $email);
                    $statement->bindParam('password', $password);
                    $statement->bindParam('pseudo', $pseudo);
                    $statement->bindParam('nom', $nom);
                    $statement->bindParam('prenom', $prenom);
                    $statement->bindParam('role', $role);
                    $statement->execute();


                } catch (Exception $e) {
                    throw new Exception("Error Request", 1);
                }
        }

}


