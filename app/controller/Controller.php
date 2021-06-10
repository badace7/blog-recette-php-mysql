<?php
namespace app\controller;

//Class Abstraite non instanciable dont va hérité tous les controllers
abstract class Controller {

/*
    Affiche la vue du pattern MVC 
 */

    function render(string $view, array $param = []):void {

        // Récupère les objets stocké
        extract($param);

        // Si session utilisateur existante rend les données utilisateur disponible et attribue un role à l'utilisateur
        if(isset($_SESSION['user'])) {

            $user = unserialize($_SESSION['user']);
            $id = $user->getId_utilisateur();
            $email = $user->getEmail_utilisateur();
            $pseudo = $user->getPseudo_utilisateur();
            $prenom = $user->getPrenom_utilisateur();
            $nom = $user->getNom_utilisateur();
            $role = $user->getRole_utilisateur();

        } else {

            // Sinon attribue un role de visiteur
            $role = 'visitor';
        }


        // Variable permettant d'effectuer des vérifications si un utilisateur est connecté ou non
        $connected = ($role != 'visitor') ? true : false;
        
        require 'app/view/template.php';
    }

}