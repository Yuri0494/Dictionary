<?php

namespace App\Patterns\FabricMethod;

class HumanFabric implements BarracksInterface {
    public function createUnit(string $unitType = 'default'): UnitInterface
    {
        return match($unitType) {
            'default' => new Human(),
        };
    }
}