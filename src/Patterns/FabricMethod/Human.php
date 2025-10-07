<?php

namespace App\Patterns\FabricMethod;

class Human implements UnitInterface {
    public function getGreetings(): string
    {
        return 'Привет, я человек! Конкретная реализация UnitInterface! Слушаю твои приказания!';
    }
}