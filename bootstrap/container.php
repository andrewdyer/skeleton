<?php

$container = $app->getContainer();

$container['logger'] = function ($container) {
    $config = $container->get('settings')->get('logger');

    $formatter = new Monolog\Formatter\LineFormatter(
        $config['formatter']['format'] . "\n",
        $config['formatter']['dateFormat'],
        $config['formatter']['allowInlineLineBreaks'],
        $config['formatter']['ignoreEmptyContextAndExtra']
    );

    $handler = new Monolog\Handler\StreamHandler(
        base_path('storage/logs/app.log'),
        $config['handler']['level']
    );

    $handler->setFormatter($formatter);

    $logger = new Monolog\Logger($config['name']);
    $logger->pushHandler($handler);

    return $logger;
};

$container['view'] = function ($container) {
    $config = $container->get('settings')->get('view');

    $view = new Slim\Views\Twig(base_path('resources/views'), [
        'cache' => $config['cache'],
    ]);

    $router = $container->get('router');
    $uri = Slim\Http\Uri::createFromEnvironment(new Slim\Http\Environment($_SERVER));
    $view->addExtension(new Slim\Views\TwigExtension($router, $uri));

    return $view;
};
