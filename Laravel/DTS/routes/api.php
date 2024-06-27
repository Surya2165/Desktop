<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->group(['middleware' => ['throttle:1800,1', 'bindings'], 'namespace' => 'App\Http\Controllers'], function ($api) {

        $api->get('ping', 'Api\PingController@index');

        $api->group(['middleware' => ['auth:api']], function ($api) {

            $api->resource('/Product', 'Api\v1\ProductController');
            // $api->resource('/Product', 'Api\v1\ProductController');

        });
    });
});