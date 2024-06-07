<?php

namespace Toannguyen\OopPhp3\Commons;
use eftec\bladeone\BladeOne;

class Controller
{ 
    protected function renderViewClient($view, $data = []){
        $templatePath = __DIR__ . '/../Views/Client';
        $compilePath = __DIR__ . '/../Views/Compiles';
        $blade = new BladeOne($templatePath, $compilePath);
        echo $blade->run($view, $data);
    }

    protected function renderViewAdmin($view, $data = []){
        $templatePath = __DIR__ . '/../Views/Admin';
        $compilePath = __DIR__ . '/../Views/Compiles';
        $blade = new BladeOne($templatePath, $compilePath);
        echo $blade->run($view, $data);
    }
}