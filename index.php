<?php


use app\controller\LastPost;
use app\controller\LoginLogon;
use app\controller\HomeController;
use app\controller\RecetteController;

session_start();

spl_autoload_register(function($class) {
    $class = 'app\\'.substr($class, 4).'.php';
    $class = str_replace('\\', '/', $class);
    require $class;
});

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS)?? 'home';



    switch ($action) {

    case 'home':
        $controller = new HomeController();
        $controller->home();

        break;
        
    case 'apropos':
        
        $controller = new HomeController();
        $controller->about();
        
        break;


    case 'rubrique_salee':
        $controller = new RecetteController();
        $controller->recetteSalee();

        break;



    case 'rubrique_sucree':
        $controller = new RecetteController();
        $controller->recetteSucree();
    
        break;
     

    case 'connect':

        $controller = new LoginLogon();
        $controller->connect();
    
        break;
    
    case 'deconnect':

        $controller = new LoginLogon();
        $controller->deconnect();

        break;

    case 'inscription':

        $controller = new LoginLogon();
        $controller->inscription();
    
        break;

    case 'recette_pate':
        
        $controller = new LastPost();
        $controller->recettePate();
    
        break;
    
    case 'recette_poulet':
            
        $controller = new LastPost();
        $controller->recettePoulet();
        
        break;
        
    case 'recette_tomate':
            
        $controller = new LastPost();
        $controller->recetteTomate();
            
        break;
    
    case 'recette_painperdu':
            
        $controller = new LastPost();
        $controller->recettePainperdu();
                
        break;
        
    case 'recette_pancake':
            
        $controller = new LastPost();
        $controller->recettePancake();
                    
        break;
    
    case 'recette_tortillas':
            
        $controller = new LastPost();
        $controller->recetteTortillas();
                        
        break;
}
