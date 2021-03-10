<?php
namespace app\controller;


abstract class Controller {
    
function render(string $view) {

    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $id = $_SESSION['id'];
        $pseudo = $_SESSION['pseudo'];
        $email = $_SESSION['email'];
        $prenom = $_SESSION['prenom'];
        $nom = $_SESSION['nom'];
        $role = $_SESSION['role'];


    } else {
        $role = 'visitor';
    }

    $connected = ($role != 'visitor') ? true : false;

    require 'app/view/template.php';
}

}