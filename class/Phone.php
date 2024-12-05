<?php

class Phone{

    private int $id;
    private string $phone_number;

    public function __construct(?int $id, string $phone_number)
    {
        $this->id = $id;
        $this->phone_number = $phone_number;
    }

    public function phones_html(){
        return <<<HTML
            <li>
                $this->phone_number
            </li>
HTML;
    }
}