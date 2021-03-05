<?php
namespace app\controller;



class HomeController extends Controller {

    public function home() {

        $this->render('accueil');
        

    }


    public function about() {

        $this->render('apropos');
        

    }
}