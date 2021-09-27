<?php

require_once __DIR__ . '/bootstrap/app.php';

$database = $container->get('settings')->get('database');

return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/database/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/database/seeds',
    ],
    'environments' => [
        'default' => [
            'adapter' => $database['driver'],
            'host' => $database['host'],
            'name' => $database['database'],
            'user' => $database['username'],
            'pass' => $database['password'],
            'port' => $database['port'],
            'charset' => $database['charset'],
        ],
        'default_migration_table' => 'migrations',
    ],
    'migration_base_class' => App\Database\Migration::class,
    'seeder_base_class' => App\Database\Seed::class,
    'version_order' => 'creation',
];
