<?php

namespace App\Http\Controllers;

use League\Tactician\CommandBus;
use Monolog\Logger;
use Slim\Container;
use Slim\Views\Twig;

abstract class Controller
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getCommandBus(): CommandBus
    {
        return $this->getContainer()->get('command-bus');
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
