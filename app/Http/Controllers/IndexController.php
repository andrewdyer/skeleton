<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class IndexController extends AbstractController
{
    public function index(Request $request, Response $response): Response
    {
        return $this->getView()->render($response, 'index/index.html.twig', [
            'controllerName' => 'IndexController',
            'controllerLocation' => __DIR__ . '/IndexController.php',
        ]);
    }
}
