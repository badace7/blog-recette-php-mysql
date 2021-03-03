<?php
namespace app\controller;


abstract class Controller {
    
function render(string $view) {
    require 'app/view/template.php';
}

}