<?php
namespace App\Core;

class SecurityMiddleware {
    public static function protect() {
        if (preg_match('/\.(env|log|sql|phpinfo)$/', $_SERVER['REQUEST_URI'])) {
            http_response_code(403);
            error_log("Tentative d'accès interdit : " . $_SERVER['REQUEST_URI'] . " - " . $_SERVER['REMOTE_ADDR']);
            exit("Accès interdit.");
        }
    }
}
