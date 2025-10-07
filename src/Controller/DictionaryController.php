<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Patterns\FabricMethod\Game;

class DictionaryController extends AbstractController
{
    #[Route('/dictionary')]
    public function index(Request $request): Response
    {
        $game = new Game($request->get('race'));

        return new Response($game->start(), 201);
    }
}