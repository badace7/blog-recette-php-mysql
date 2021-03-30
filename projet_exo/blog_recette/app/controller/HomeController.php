<?php
namespace app\controller;

use app\model\ModelRecipe;



class HomeController extends Controller {

    public function home() {

        // Récupère les 6 dernières recettes
        $model = new ModelRecipe();
        $lastRecipe = $model->getLastRecipe();

        // Affiche le rendu accueil, tableau des 6 dernières recettes
        $this->render('accueil', ['lastRecipe' => $lastRecipe]);
    }


    public function about() {

        // Affiche le rendu A propos
        $this->render('apropos');
        

    }
}