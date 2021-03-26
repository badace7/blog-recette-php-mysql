<?php
namespace app\controller;


abstract class Controller {
    
function render(string $view, array $param = []):void {

    extract($param);

    if(isset($_SESSION['user'])) {

        $user = unserialize($_SESSION['user']);
        $id = $user->getId_utilisateur();
        $email = $user->getEmail_utilisateur();
        $pseudo = $user->getPseudo_utilisateur();
        $prenom = $user->getPrenom_utilisateur();
        $nom = $user->getNom_utilisateur();
        $role = $user->getRole_utilisateur();

    } else {
        $role = 'visitor';
    }

    $connected = ($role != 'visitor') ? true : false;

    require 'app/view/template.php';
}

}