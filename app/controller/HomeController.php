<?php
namespace app\controller;

use app\model\ModelRecipe;



class HomeController extends Controller {

    public function home() {

        $model = new ModelRecipe();
        $lastRecipe = $model->getLastRecipe();
        $this->render('accueil', ['lastRecipe' => $lastRecipe]);
    }


    public function about() {

        $this->render('apropos');
        

    }
}