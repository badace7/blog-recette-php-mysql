<?php

namespace app\model;

use PDO;
use Exception;
use PDOException;
use app\entity\User;
use Error;

class ModelUser extends Model
{
    // Permet d'obtenir les données d'un utilisateur
    public function getUser(string $email): User
    {   
        // connexion à la base de donnée
        $bddConnect = $this->pdoConnect();

        try {

            // Requête permettant de retourner un utilisateur
            $requestLogin = "SELECT * FROM Utilisateur WHERE email_utilisateur=:email";

            // Prépare la requête et l'execute
            $statement = $bddConnect->prepare($requestLogin);
            $statement->bindParam('email', $email);
            $statement->execute();

            // Compte le nombre de ligne retournée
            $test = $statement->rowCount();
            
            // Si nombre de ligne == 0 retourne une erreur de type Exception
            if ($test == 0) {
                throw new Exception("L'email est inexistant");
            } elseif ($test == 1) {
                // Si nombre de ligne == 1 retourne les données utilisateur sous forme d'objet
                $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'app\entity\User');
                echo '<br>' . 'REQUEST SUCCESS';
                return $statement->fetch();
            }
        } catch (Error $e) {
            header("Location: index.php?action=error");
        }
    }


    // Crée un nouvel utilisateur
    public function newUser(User $user)
    {
        $email = $user->getEmail_utilisateur();
        $password = $user->getPassword_utilisateur();
        $pseudo = $user->getPseudo_utilisateur();
        $nom = $user->getNom_utilisateur();
        $prenom = $user->getPrenom_utilisateur();
        $role = $user->getRole_utilisateur();

        try {

            // Connexion à la base de donnée
            $bddConnect = $this->pdoConnect();

            // Requête d'insertion des données utilisateur lors de l'inscription 
            $requestNew = "INSERT INTO Utilisateur (`email_utilisateur`,`password_utilisateur`,`pseudo_utilisateur`,`nom_utilisateur`,`prenom_utilisateur`,`role_utilisateur`)
                    VALUES (:email, :password, :pseudo, :nom, :prenom, :role)";

            // Crypte le mot de passe en BCRYPT
            $password = password_hash($password, PASSWORD_BCRYPT);

            // Prépare la requête et l'execute
            $statement = $bddConnect->prepare($requestNew);
            $statement->bindParam('email', $email);
            $statement->bindParam('password', $password);
            $statement->bindParam('pseudo', $pseudo);
            $statement->bindParam('nom', $nom);
            $statement->bindParam('prenom', $prenom);
            $statement->bindParam('role', $role);
            $statement->execute();

            // Attribue le prochain id au donnée utilisateur
            $idUser = $bddConnect->lastInsertId();
            $user->setId_utilisateur($idUser);
        } catch (PDOException $e) {
                throw new Exception("ERREUR TEST");
        }
    }

    // Permet la mise à jour des données utilisateur
    public function updateUser(User $user) {

        $email = $user->getEmail_utilisateur();
        $password = $user->getPassword_utilisateur();
        $pseudo = $user->getPseudo_utilisateur();
        $nom = $user->getNom_utilisateur();
        $prenom = $user->getPrenom_utilisateur();
        $id = intval($user->getId_utilisateur());

        // Connexion à la base de donnée
        $bddConnect = $this->pdoConnect();

        // Requête de mise à jour de donnée utilisateur
        $requestUpdate = "UPDATE Utilisateur SET email_utilisateur=:email, pseudo_utilisateur=:pseudo, nom_utilisateur=:nom, prenom_utilisateur=:prenom, password_utilisateur=:password WHERE id_utilisateur=:id;";

        // Prépare la requête et l'execute
        $statement = $bddConnect->prepare($requestUpdate);
            $statement->bindParam('email', $email);
            $statement->bindParam('password', $password);
            $statement->bindParam('pseudo', $pseudo);
            $statement->bindParam('nom', $nom);
            $statement->bindParam('prenom', $prenom);
            $statement->bindParam('id', $id);
            $statement->execute();

    }


    // Récupère un tableau contenant des objets utilisateur
    public function getAllUser() :array {

        // Connexion à la base de donnée 
        $bddConnect = $this->pdoConnect();

        // Requête permettant de récupérer tous les utilisateur
        $requestAllUser = "SELECT `email_utilisateur`,`pseudo_utilisateur`, `id_utilisateur` FROM Utilisateur;";

        // Execcute la requête
        $statement = $bddConnect->query($requestAllUser);

        // retourne les données utilisateur sous forme d'objet
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'app\entity\User');
        return $statement->fetchAll();
    }

    // Efface un utilisateur de la base de donnée 
    public function delete($id):void {

        // Connexion à la base de donnée
        $bddConnect = $this->pdoConnect();

        // Requête permettant de supprimer un utilisateur en fonction d'un id
        $requestDeleteUser = "DELETE FROM Utilisateur WHERE id_utilisateur=:id";
 
        // Prépare la requête et l'execute
        $statement = $bddConnect->prepare($requestDeleteUser);
        $statement->bindParam('id', $id);
        $statement->execute();

    }
}
