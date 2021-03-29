<?php
use app\controller\HomeController;
use app\controller\ErrorController;
use app\controller\CommentController;
use app\controller\RecetteController;
use app\controller\LastPostController;
use app\controller\ParametreController;
use app\controller\LoginLogonController;

session_start();

spl_autoload_register(function ($class) {
    $class = 'app\\' . substr($class, 4) . '.php';
    $class = str_replace('\\', '/', $class);
    require $class;
});

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'home';



switch ($action) {

    case 'home':
        $controller = new HomeController();
        $controller->home();

        break;

    case 'apropos':

        $controller = new HomeController();
        $controller->about();

        break;


    case 'rubrique':
        $type_recette = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        $controller = new RecetteController();
        $controller->recettes($type_recette);

        break;



    case 'connect':

        $controller = new LoginLogonController();
        $controller->connect();

        break;

    case 'deconnect':

        $controller = new LoginLogonController();
        $controller->deconnect();

        break;

    case 'parametre':

        $controller = new ParametreController();
        $controller->parametreView();

        break;

    case 'profil':

        $controller = new ParametreController();
        $controller->profil();

        break;

    case 'gestion-user':

        $controller = new ParametreController();
        $controller->gestionUser();

        break;

    case 'deleteUser':

        $controller = new ParametreController();
        $controller->deleteUser();

        break;

    case 'comment':
        $id_recette = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $controller = new CommentController();
        $controller->addComment($id_recette);

        break;
    
    case 'deleteComment':

        $id_commentaire = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $id_recette = filter_input(INPUT_GET, 'id2', FILTER_SANITIZE_SPECIAL_CHARS);
        $controller = new CommentController();
        $controller->deleteComment($id_commentaire, $id_recette);

        break;

    case 'error':

        $controller = new ErrorController();
        $controller->errorNotFound();

        break;

    case 'inscription':
        $controller = new LoginLogonController();
        $controller->inscription();

        break;

    case 'ajout_recette':

        $controller = new RecetteController();
        $controller->addRecette();

        break;

    case 'delete':
        $controller = new RecetteController();
        $controller->deleteRecette();

        break;

    case 'recette':
        $id_recette = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $controller = new RecetteController();
        $controller->afficheRecette($id_recette);
        break;
}
