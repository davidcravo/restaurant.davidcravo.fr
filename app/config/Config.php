<?php

namespace App\Config;

/**
 * Classe de configuration pour le projet.
 *
 * Cette classe fournit des constantes globales pour les chemins et autres paramètres nécessaires
 * dans l'application.
 */
class Config{

    /**
     * Constante contenant les chemins importants de l'application.
     *
     * @var array<string, string>
     * - 'images' : Chemin vers le dossier contenant les images.
     * - 'sql' : Chemin vers le dossier contenant les fichiers SQL.
     */
    public const DIR = [
        'images' => '/public/assets/images/',
        'sql' => __DIR__ .'/../../sql/'
    ];
}