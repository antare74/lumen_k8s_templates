<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'platforms', 'as' => 'platform'], function () use ($router) {
    $router->get('/', [
        'as' => 'index', 'uses' => 'PlatformController@index'
    ]);

    $router->post('/', [
        'as' => 'create', 'uses' => 'PlatformController@create'
    ]);

    $router->put('/{platform}', [
        'as' => 'update', 'uses' => 'PlatformController@update'
    ]);
});

$router->post('send-mail', 'MailController@send');

$router->post('send-short-message', 'ShortMessageController@send');
