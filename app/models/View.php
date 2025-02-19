<?php

namespace App\Models;

class View{
    public static function render(string $view, array $data = []): void{
        $viewPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . "$view.php";

        if (!file_exists($viewPath)){
            throw new \Exception("Vue '$view' introuvable.");
        }

        extract($data, EXTR_SKIP);
        require $viewPath;
    }
}