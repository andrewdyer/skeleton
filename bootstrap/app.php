<?php

require_once __DIR__ . '/../vendor/autoload.php';

if (!get_env('APP_ENV')) {
    try {
        (Dotenv\Dotenv::createImmutable(base_path()))->load();
    } catch (Dotenv\Exception\InvalidPathException $ex) {
        exit($ex->getMessage());
    }
}

$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => (bool) get_env('APP_DEBUG', false),
        'app' => [
            'name' => get_env('APP_NAME', 'Skeleton'),
            'env' => get_env('APP_ENV', 'production'),
            'key' => get_env('APP_KEY'),
            'url' => get_env('APP_URL', 'https://localhost:8888'),
        ],
        'database' => [
            'driver' => get_env('DB_DRIVER'),
            'host' => get_env('DB_HOST'),
            'port' => get_env('DB_PORT'),
            'database' => get_env('DB_DATABASE'),
            'username' => get_env('DB_USERNAME'),
            'password' => get_env('DB_PASSWORD'),
            'charset' => get_env('DB_CHARSET'),
            'collation' => get_env('DB_COLLATION'),
            'prefix' => '',
        ],
        'logger' => [
            'name' => get_env('LOGGER_NAME'),
            'formatter' => [
                'format' => get_env('LOGGER_FORMAT'),
                'dateFormat' => get_env('LOGGER_DATE_FORMAT'),
                'allowInlineLineBreaks' => get_env('LOGGER_ALLOW_INLINE_LINE_BREAKS'),
                'ignoreEmptyContextAndExtra' => get_env('LOGGER_IGNORE_EMPTY_CONTEXT_AND_EXTRA'),
            ],
            'handler' => [
                'level' => Monolog\Logger::DEBUG,
            ],
        ],
        'view' => [
            'cache' => get_env('VIEW_CACHE_DISABLED') ? false : base_path('storage/views'),
        ],
    ],
]);

require_once base_path('bootstrap/container.php');
require_once base_path('routes/api.php');
require_once base_path('routes/web.php');
