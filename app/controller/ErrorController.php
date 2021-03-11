<?php

namespace app\controller;

class ErrorController extends Controller {

    public function errorNotFound() {

        $this->render('error/error');
        
    }




}