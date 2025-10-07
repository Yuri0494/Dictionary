<?php

namespace App\Patterns\FabricMethod;

class Game {

    public BarracksInterface $barracks;

    public function __construct(string $race)
    {
        $this->barracks = $race === 'human' 
                        ? new HumanFabric()
                        : new OrkFabric();
    }

    public function start(): string 
    {
        return $this->barracks->createUnit('default')->getGreetings();
    }
}