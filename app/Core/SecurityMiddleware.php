<?php
namespace App\Core;

class SecurityMiddleware {
    public static function protect() {
        if (preg_match('/\.(env|log|sql|phpinfo)$/', $_SERVER['REQUEST_URI'])) {
            http_response_code(403);
            exit("Accès interdit.");
        }
    }
}
