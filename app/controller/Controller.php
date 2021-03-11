<?php
namespace app\controller;


abstract class Controller {
    
function render(string $view) {

    if(isset($_SESSION['user'])) {
        $user = unserialize($_SESSION['user']);
        $id = $user->getId_utilisateur();
        $email = $user->getEmail_utilisateur();
        $pseudo = $user->getPseudo_utilisateur();
        $prenom = $user->getPrenom_utilisateur();
        $nom = $user->getNom_utilisateur();
        $role = $user->getRole_utilisateur();
        // $id = $_SESSION['id'];
        // $pseudo = $_SESSION['pseudo'];
        // $email = $_SESSION['email'];
        // $prenom = $_SESSION['prenom'];
        // $nom = $_SESSION['nom'];
        // $role = $_SESSION['role'];
    } else {
        $role = 'visitor';
    }

    $connected = ($role != 'visitor') ? true : false;

    require 'app/view/template.php';
}

}