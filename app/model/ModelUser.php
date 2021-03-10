<?php
namespace app\model;

use app\entity\User;
use PDO;
use PDOException;


class ModelUser extends Dao {


        public function getUser(string $email) :User {
                try {
                        $bddConnect = $this->pdoConnect();

                        $requestLogin = "SELECT * FROM Utilisateur WHERE email_utilisateur=:email";
                        $statement = $bddConnect->prepare($requestLogin);
                
                        $statement->bindParam('email', $email);
                        $statement->execute();

                        if ($statement->rowCount() == 1) {
                                $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'app\entity\User');
                                echo '<br>'.'REQUEST SUCCESS';
                                return $statement->fetch();
                        
                        }

                } catch (PDOException $e) {
                        echo "Erreur : ".$e->getMessage();
                        
                }
        }

        public function newUser(User $user) {
                
                $email = $user->getEmail_utilisateur();
                $password = $user->getPassword_utilisateur();
                $pseudo = $user->getPseudo_utilisateur();
                $nom = $user->getNom_utilisateur();
                $prenom = $user->getPrenom_utilisateur();
                $role = $user->getRole_utilisateur();

                try {

                    $bddConnect = $this->pdoConnect();

                    $requestNew = "INSERT INTO Utilisateur (`email_utilisateur`,`password_utilisateur`,`pseudo_utilisateur`,`nom_utilisateur`,`prenom_utilisateur`,`role_utilisateur`)
                    VALUES (:email, :password, :pseudo, :nom, :prenom, :role)";

                       
                    $password = password_hash($password, PASSWORD_BCRYPT);
                

                    $statement = $bddConnect->prepare($requestNew);
                    $statement->bindParam('email', $email);
                    $statement->bindParam('password', $password);
                    $statement->bindParam('pseudo', $pseudo);
                    $statement->bindParam('nom', $nom);
                    $statement->bindParam('prenom', $prenom);
                    $statement->bindParam('role', $role);
                    $statement->execute();

                    $idUser = $bddConnect->lastInsertId();
                    $user->setId_utilisateur($idUser);


                } catch (PDOException $e) {
                        echo "Erreur : ".$e->getMessage();
                }
        }

}


