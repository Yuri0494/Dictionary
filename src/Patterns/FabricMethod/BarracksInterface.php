<?php

namespace App\Patterns\FabricMethod;

interface BarracksInterface {
    public function createUnit(string $unitType = 'default'): UnitInterface;
}