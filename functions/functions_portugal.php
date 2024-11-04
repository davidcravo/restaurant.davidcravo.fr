<?php

function get_article($articles, $anchor){
    switch($anchor){
        case 'portugal': 
            $article = $articles[0];
            break;
        case 'lisbonne':
            $article = $articles[1];
            break;
        case 'porto':
            $article = $articles[2];
            break;
        case 'faro':
            $article = $articles[3];
            break;
    }
    return $article;
}