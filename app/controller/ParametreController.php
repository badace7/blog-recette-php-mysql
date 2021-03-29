<?php

namespace app\controller;

use app\entity\User;
use app\model\ModelUser;

class ParametreController extends Controller {


    public function parametreView() {

        $this->render('user/parametre');

    }

    public function profil() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render('user/profil');
        } else {
            $user = unserialize($_SESSION['user']);

            $email = ($_POST['email'] == '') ? $user->getEmail_utilisateur() : $user->setEmail_utilisateur(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS));
            $password = ($_POST['password'] == '') ? $user->getPassword_utilisateur() : $user->setPassword_utilisateur(password_hash(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS), PASSWORD_BCRYPT));
            $pseudo = ($_POST['pseudo'] == '') ? $user->getPseudo_utilisateur() : $user->setPseudo_utilisateur(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS));
            $nom = ($_POST['nom'] == '') ? $user->getNom_utilisateur() : $user->setNom_utilisateur(filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS));
            $prenom = ($_POST['prenom'] == '') ? $user->getPrenom_utilisateur() : $user->setPrenom_utilisateur(filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS));
            


          $model = new ModelUser();

          $model->updateUser($user);

          $_SESSION['user'] = serialize($user);
          
          header('Location: index.php');

        }
    }


    public function gestionUser() {

        $user = unserialize($_SESSION['user']);

        if ($user->getRole_utilisateur() != 'ROLE_ADMIN') {
            header('Location : index.php');
        } else {
            

            $model = new ModelUser();
            $allUser = $model->getAllUser();

            $this->render('user/gestionuser', ['allUser' => $allUser]);
        }

    }

    public function deleteUser() {

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $id = intval($id);

        $model = new ModelUser();
        $model->delete($id);
        header('Location: index.php?action=gestion-user');
    }
}