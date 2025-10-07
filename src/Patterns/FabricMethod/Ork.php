<?php

namespace App\Patterns\FabricMethod;

class Ork implements UnitInterface {
    public function getGreetings(): string
    {
        return 'Привет, я орк! Конкретная реализация UnitInterface! Слушаю твои приказания!';
    }
}