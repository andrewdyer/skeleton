<?php

namespace App\Http\Controllers;

use Monolog\Logger;
use Slim\Container;
use Slim\Views\Twig;

abstract class AbstractController
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getContainer(): Container
    {
        return $this->container;
    }

    protected function getLogger(): Logger
    {
        return $this->getContainer()->get('logger');
    }

    protected function getView(): Twig
    {
        return $this->getContainer()->get('view');
    }
}
