<?php

$app->get('/', App\Http\Controllers\IndexController::class . ':index')->setName('index');
