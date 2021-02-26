<?php


$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'home';



switch($action) {


    case 'home':

        $view = 'app/view/accueil';

        break;

    case 'rubrique_salee':

        $view = 'app/view/rubrique_salee';

        break;

    case 'rubrique_sucree':

        $view =  'app/view/rubrique_sucree';

        break;

    case 'apropos':

        $view =  'app/view/apropos';

        break;

    case 'connect':

        $view =  'app/view/connect';
    
        break;

    case 'inscription':

        $view =  'app/view/inscription';
    
        break;

        case 'recette_pate':
        
            $view = "app/view/recettes/recettepate";
    
            break;
    
        case 'recette_poulet':
            
            $view = "app/view/recettes/recettepoulet";
        
            break;
        
        case 'recette_tomate':
            
            $view = "app/view/recettes/recettetomate";
            
            break;
    
        case 'recette_painperdu':
            
            $view = "app/view/recettes/recettepainperdu";
                
            break;
    
        case 'recette_pancake':
            
            $view = "app/view/recettes/recettepancake";
                    
            break;
    
        case 'recette_tortillas':
            
            $view = "app/view/recettes/recettetortillas";
                        
            break;
}


include 'app/view/template.php';

