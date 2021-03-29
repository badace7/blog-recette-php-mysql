<?php

namespace app\model;

use PDO;
use Exception;
use PDOException;
use app\entity\User;
use Error;

class ModelUser extends Dao
{
    public function getUser(string $email): User
    {
        $bddConnect = $this->pdoConnect();

        try {
            $requestLogin = "SELECT * FROM Utilisateur WHERE email_utilisateur=:email";
            $statement = $bddConnect->prepare($requestLogin);
            $statement->bindParam('email', $email);

            $statement->execute();

            $test = $statement->rowCount();
            if ($test == 0) {
                throw new Exception("L'email est inexistant");
            } elseif ($test == 1) {
                $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'app\entity\User');
                echo '<br>' . 'REQUEST SUCCESS';
                return $statement->fetch();
            }
        } catch (Error $e) {
            header("Location: index.php?action=error");
        }
    }

    public function newUser(User $user)
    {
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
                throw new Exception("ERREUR TEST");
        }
    }


    public function updateUser(User $user) {

        $email = $user->getEmail_utilisateur();
        $password = $user->getPassword_utilisateur();
        $pseudo = $user->getPseudo_utilisateur();
        $nom = $user->getNom_utilisateur();
        $prenom = $user->getPrenom_utilisateur();
        $id = intval($user->getId_utilisateur());


        $bddConnect = $this->pdoConnect();


        $requestUpdate = "UPDATE Utilisateur SET email_utilisateur=:email, pseudo_utilisateur=:pseudo, nom_utilisateur=:nom, prenom_utilisateur=:prenom, password_utilisateur=:password WHERE id_utilisateur=:id;";

        $statement = $bddConnect->prepare($requestUpdate);
            $statement->bindParam('email', $email);
            $statement->bindParam('password', $password);
            $statement->bindParam('pseudo', $pseudo);
            $statement->bindParam('nom', $nom);
            $statement->bindParam('prenom', $prenom);
            $statement->bindParam('id', $id);
            $statement->execute();

    }

    public function getAllUser() :array {

        $bddConnect = $this->pdoConnect();

        $requestAllUser = "SELECT `email_utilisateur`,`pseudo_utilisateur`, `id_utilisateur` FROM Utilisateur;";
        $statement = $bddConnect->query($requestAllUser);
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'app\entity\User');
        return $statement->fetchAll();
    }

    public function delete($id):void {

        $bddConnect = $this->pdoConnect();

        $requestDeleteUser = "DELETE FROM Utilisateur WHERE id_utilisateur=:id";
        $statement = $bddConnect->prepare($requestDeleteUser);
        $statement->bindParam('id', $id);
        $statement->execute();

    }
}
