<?php
namespace app\controller;

use app\model\ModelLogin;

class LoginLogon extends Controller {



    function connect() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render('user/connect');
        } else {
            $login = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

            $model = new ModelLogin();
        
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
        $this->render('user/inscription');
    }



}