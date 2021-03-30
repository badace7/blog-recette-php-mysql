<?php
// Permet d'éviter de répéter le namespace lors de l'instanciation
use app\controller\HomeController;
use app\controller\ErrorController;
use app\controller\CommentController;
use app\controller\RecetteController;
use app\controller\LastPostController;
use app\controller\ParametreController;
use app\controller\LoginLogonController;

//Permet de garder la session active sur toute les pages
session_start();

// Appelle la classe au moment de l'instanciation de la classe
spl_autoload_register(function ($class) {
    $class = 'app\\' . substr($class, 4) . '.php';
    $class = str_replace('\\', '/', $class);
    require $class;
});

// Récupère le 1er paramètre de l'url (Uniforme Ressource Locator)
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'home';



// Le paramètre permet l'instanciation d'un controller qui fera appel au model et rendra la vue
// index.php -> controller.php -> model.php -> controller.php -> view
switch ($action) {

    case 'home':
        // Affiche la page accueil avec les 6 dernières publications ajoutées 
        $controller = new HomeController();
        $controller->home();

        break;

    case 'apropos':
        // Affiche la page à propos
        $controller = new HomeController();
        $controller->about();

        break;


    case 'rubrique':
        // Affiche les pages rubriques et les publications concérnée
        $type_recette = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        $controller = new RecetteController();
        $controller->recettes($type_recette);

        break;



    case 'connect':
        // Affiche la page connect et permet la connection à un compte existant
        $controller = new LoginLogonController();
        $controller->connect();

        break;

    case 'deconnect':
        // Met fin à la session existante
        $controller = new LoginLogonController();
        $controller->deconnect();

        break;

    case 'parametre':
        // Affiche la page de paramètre utilisateur 
        $controller = new ParametreController();
        $controller->parametreView();

        break;

    case 'profil':
        // Affiche la page de profil utilisateur et permet l'update des données utilisateur
        $controller = new ParametreController();
        $controller->profil();

        break;

    case 'gestion-user':
        // Affiche la page de gestion d'utilisateur
        $controller = new ParametreController();
        $controller->gestionUser();

        break;

    case 'deleteUser':
        // Permet de supprimer les utilisateurs
        $controller = new ParametreController();
        $controller->deleteUser();

        break;

    case 'comment':
        // Permet d'ajouter un commentaire
        $id_recette = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $controller = new CommentController();
        $controller->addComment($id_recette);

        break;
    
    case 'deleteComment':
        // Permet de supprimer un commentaire
        $id_commentaire = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $id_recette = filter_input(INPUT_GET, 'id2', FILTER_SANITIZE_SPECIAL_CHARS);
        $controller = new CommentController();
        $controller->deleteComment($id_commentaire, $id_recette);

        break;

    case 'error':
        // Affiche une vue d'erreur
        $controller = new ErrorController();
        $controller->errorNotFound();

        break;

    case 'inscription':
        // Affiche le formulaire d'inscription et permet l'ajout de donnée utilisateur
        $controller = new LoginLogonController();
        $controller->inscription();

        break;

    case 'ajout_recette':
        // Permet d'ajouter une recette dans la base de donnée
        $controller = new RecetteController();
        $controller->addRecette();

        break;

    case 'delete':
        // Permet d'éffacer une recette dans la base de donnée
        $controller = new RecetteController();
        $controller->deleteRecette();

        break;

    case 'recette':
        // Permet d'afficher une recette 
        $id_recette = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $controller = new RecetteController();
        $controller->afficheRecette($id_recette);
        break;
}
