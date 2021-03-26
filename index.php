<?php


use app\controller\HomeController;
use app\controller\ErrorController;
use app\controller\RecetteController;
use app\controller\LastPostController;
use app\controller\ParametreController;
use app\controller\LoginLogonController;

session_start();

spl_autoload_register(function($class) {
    $class = 'app\\'.substr($class, 4).'.php';
    $class = str_replace('\\', '/', $class);
    require $class;
});

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS)?? 'home';



    switch ($action) {

    case 'upload':

        require 'app/images/upload.php';
    
    break;

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

    case 'delete':
        $controller = new RecetteController();
        $controller->deleteRecette();

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

    case 'recette':
        
        $controller = new RecetteController();
        $controller->afficheRecette();
    
        break;
    
    case 'recette_poulet':
            
        $controller = new LastPostController();
        $controller->recettePoulet();
        
        break;
        
    case 'recette_tomate':
            
        $controller = new LastPostController();
        $controller->recetteTomate();
            
        break;
    
    case 'recette_painperdu':
            
        $controller = new LastPostController();
        $controller->recettePainperdu();
                
        break;
        
    case 'recette_pancake':
            
        $controller = new LastPostController();
        $controller->recettePancake();
                    
        break;
    
    case 'recette_tortillas':
            
        $controller = new LastPostController();
        $controller->recetteTortillas();
                        
        break;
}
