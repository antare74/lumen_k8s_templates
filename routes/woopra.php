<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api', 'as' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'woopra', 'as' => 'woopra'], function () use ($router) {
        $router->post('/general', [
            'as' => 'general', 'uses' => 'WoopraController@general'
        ]);
    });
});
