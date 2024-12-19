<?php

namespace App\Enums;

enum Type: string{
    case Starter = 'starter';
    case Main = 'main';
    case Cheese = 'cheese';
    case Dessert = 'dessert';

    public function label(): string{
        return match($this){
            self::Starter => 'entrée',
            self::Main => 'principal',
            self::Cheese => 'fromage',
            self::Dessert => 'dessert'
        };
    }

    public static function getTypeKeysValues(): array{
        return [
            self::Starter->value => self::Starter->label(),
            self::Main->value => self::Main->label(),
            self::Cheese->value =>self::Cheese->label(),
            self::Dessert->value => self::Dessert->label()
        ];
    }
}