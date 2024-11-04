<?php

function nav_item(string $link, string $title, string $class){
    if($_SERVER['SCRIPT_NAME'] === $link){
        $class .= ' current-page';
    }
    return <<<HTML
    <a href='$link' class='$class'>$title</a>
HTML;
}