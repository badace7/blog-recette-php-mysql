<?php
namespace app\controller;

use app\entity\User;
use app\model\ModelUser;


class LoginLogon extends Controller {



    function connect() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render('user/connect');
        } else {
            $login = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

            $model = new ModelUser();
        
            $user = $model->getUser($login);

            if (password_verify($password, $user->getPassword_utilisateur())) {
                $_SESSION['user'] = $user;
                $_SESSION['id'] = $user->getId_utilisateur();
                $_SESSION['role'] = $user->getRole_utilisateur();
                $_SESSION['pseudo'] = $user->getPseudo_utilisateur();
                $_SESSION['email'] = $user->getEmail_utilisateur();
                $_SESSION['prenom'] = $user->getPrenom_utilisateur();
                $_SESSION['nom'] = $user->getNom_utilisateur();
                header('Location: index.php');
            } else {
                header('Location: index.php?action=connect');
            }
        }
    }


    function deconnect() {
        session_destroy();
        header('Location: index.php');
        exit();
    }


    function inscription() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render('user/inscription');
        } else {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);
            $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
            
            
            $user = new User($email, $password, $pseudo, $nom, $prenom);

            $model = new ModelUser();

            $createUser = $model->newUser($user);
            header('Location: index.php');
        }



    }



}