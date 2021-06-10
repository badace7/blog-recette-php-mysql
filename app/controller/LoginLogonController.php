<?php
namespace app\controller;

use app\entity\User;
use app\model\ModelUser;
use Exception;
use TypeError;

class LoginLogonController extends Controller {


    /*
        Affiche le formulaire de connexion lors d'une requête methode GET
        Permet de se connecter avec les bonnes données
    */
    function connect():void {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render('user/connect');
        } else {

            // Récupère l'email et le password
            $login = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

            $model = new ModelUser();
            

            try {
                try {
                    // Récupère les données d'un utilisateur lors de la connexion
                    $user = $model->getUser($login);
                    // Si mot de passe bon se connecte
                    if (password_verify($password, $user->getPassword_utilisateur())) {
                        
                        //Stock l'objet user dans la variable super globale de SESSION
                        $_SESSION['user'] = serialize($user);
                        

                        // Redireection vers la page home
                        header('Location: index.php');

                        // Si mot de passe mauvais redirection vers page de connexion
                    } elseif (!password_verify($password, $user->getPassword_utilisateur())) {
                        header('Location: index.php?action=connect');
                        exit();
                    }
                } catch (TypeError $e) {
                    header("Location: index.php?action=error");
                    exit();
                }

            } catch (Exception $e) {
                header("Location: index.php?action=connect");
                exit();
            }

        }
    }

    // Détruit et met fin à la session
    function deconnect() {
        session_destroy();
        header('Location: index.php');
        exit();
    }

    // Affiche le formulaire d'inscription lors d'un requête methode GET
    // Enregistre dans la base de donnée les donnée du formulaire lors d'une requête methode POST
    function inscription() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render('user/inscription');
        } else {
            // Récupère les données lors de l'inscription
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);
            $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);

            
            try {
                // Crée un objet utilsateur
                $user = new User($email, $password, $pseudo, $nom, $prenom);

                $model = new ModelUser();
                // Insert dans la base de donnée les donnée d'un utilisateur
                $model->newUser($user);
                
                // Stock en variable de session l'objet utilisateur pour qu'il soit connecté après inscription
                $_SESSION['user'] = serialize($user);

                // Redirection vers page home
                header('Location: index.php');

            } catch (Exception $e) {
                header('Location: index.php?action=inscription');
            }
            

        }
    }
}