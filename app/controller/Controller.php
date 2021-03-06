<?php
namespace app\controller;


abstract class Controller {
    
function render(string $view) {

    if(isset($_SESSION['user'])) {
        $user = unserialize($_SESSION['user']);
        $role = $user['role_utilisateur'];
    } else {
        $role = 'visitor';
    }

    $connected = ($role != 'visitor') ? true : false;

    require 'app/view/template.php';
}

}