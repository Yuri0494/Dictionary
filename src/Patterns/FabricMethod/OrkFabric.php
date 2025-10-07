<?php

namespace App\Patterns\FabricMethod;

class OrkFabric implements BarracksInterface {
    public function createUnit(string $unitType = 'default'): UnitInterface
    {
        return match($unitType) {
            'default' => new Ork(),
        };
    }
}