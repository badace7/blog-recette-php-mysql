<?php
namespace app\controller;

use app\model\ModelLogin;
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

            if (password_verify($password, $user['password_utilisateur'])) {
                $_SESSION['user'] = serialize($user);
                header('Location: index.php');
            } else {
                echo '<h1>Mot de passe non valide</h1>';
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
            
            $model = new ModelUser();

            $user = $model->newUser($email, $password, $pseudo, $nom, $prenom);
            header('Location: index.php');
        }



    }



}