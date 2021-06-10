<?php

namespace app\controller;

class ErrorController extends Controller {

    // Affiche la vue d'une ERREUR 404 NOT FOUND
    public function errorNotFound():void {

        $this->render('error/error');
        
    }




}