<?php

namespace app\controller;

use app\entity\User;
use app\model\ModelUser;

class ParametreController extends Controller {

    // Affiche la page de paramètre utilisateur
    public function parametreView():void {

        $this->render('user/parametre');

    }

    /*
        Affiche la page de profil en requête methode GET
        Update les données utilisateur en requête methode POST
    */
    public function profil():void {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render('user/profil');
        } else {

            //Récupère les données d'un utilisateur connecté
            $user = unserialize($_SESSION['user']);

            // Récupère les données utilisateur changée, ou réattribue les mêmes données
            $email = ($_POST['email'] == '') ? $user->getEmail_utilisateur() : $user->setEmail_utilisateur(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS));
            $password = ($_POST['password'] == '') ? $user->getPassword_utilisateur() : $user->setPassword_utilisateur(password_hash(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS), PASSWORD_BCRYPT));
            $pseudo = ($_POST['pseudo'] == '') ? $user->getPseudo_utilisateur() : $user->setPseudo_utilisateur(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS));
            $nom = ($_POST['nom'] == '') ? $user->getNom_utilisateur() : $user->setNom_utilisateur(filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS));
            $prenom = ($_POST['prenom'] == '') ? $user->getPrenom_utilisateur() : $user->setPrenom_utilisateur(filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS));
            


          $model = new ModelUser();
         // Met à jour les données utilisateur
          $model->updateUser($user);

          // Met à jour la session d'utilisateur
          $_SESSION['user'] = serialize($user);
          
          // Redirection vers la page home
          header('Location: index.php');
          exit();

        }
    }

    // Affiche la page de gestion utilisateur !! Accessible uniquement à l'administrateur
    public function gestionUser():void {
        
        $user = unserialize($_SESSION['user']);

        if ($user->getRole_utilisateur() != 'ROLE_ADMIN') {

            header('Location : index.php?action=error');
            exit();

        } else {
            

            $model = new ModelUser();
            // Récupère des données utilisateur [Email, pseudo]
            $allUser = $model->getAllUser();

            // Affiche la page de gestion utilisateur, et les données concernées
            $this->render('user/gestionuser', ['allUser' => $allUser]);
        }

    }

    // Supprime un utilisateur
    public function deleteUser():void {

        $user = unserialize($_SESSION['user']);

        if ($user->getRole_utilisateur() != 'ROLE_ADMIN') {
            header('Location : index.php?action=error');
            exit();
        } else {

        // Récupère l'id de l'utilisateur à supprimer
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
            $id = intval($id);

            $model = new ModelUser();
            //Supprime l'utilisateur
            $model->delete($id);

            // Redirection vers la page de gestion d'utilisateur
            header('Location: index.php?action=gestion-user');
            exit();
        }
    }
}