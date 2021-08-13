<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('subscriptions/{id}', ['uses' => 'UserSubscriptionController@showUserSubscription']);

    $router->post('subscriptions', ['uses' => 'UserSubscriptionController@create']);

    $router->delete('subscriptions/{id}', ['uses' => 'UserSubscriptionController@delete']);

    $router->post('subscriptions/{id}', ['uses' => 'UserSubscriptionController@update']);

    $router->patch('subscriptions/unsubscribe/{id}', ['uses' => 'UserSubscriptionController@unsubscribe']);

    $router->patch('subscriptions/subscribe/{id}', ['uses' => 'UserSubscriptionController@subscribe']);
});
