<?php

function nav_item(string $link, string $title, string $class){
    if($_SERVER['REQUEST_URI'] === $link){
        $class .= ' current-page';
    }
    return <<<HTML
    <a href='$link' class='$class'>$title</a>
HTML;
}