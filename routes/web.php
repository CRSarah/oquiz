<?php

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

/*
  Note: pour creer une route methode :

  $router->nomDeLaMethode('url', 'fonctionOuController')

  ex: $router->get('/', function () use ($router) {})

 */

/* // 1/ route test
$router->get('/', function () use ($router) {
    return "Hello World!";
}); */

/* // 1/ route test
$router->get('/', function () use ($router) {
    return view('home');
}); */

/* $router->get('/', function () use ($router) {
    return $router->app->version();
}); */

// une route dans les regle de l'art : url + controller et associé a un nom

$router->get('/',[
    'as' => 'quiz_list',
    'uses' => 'QuizController@list'
]);

$router->get('quiz/{id}',[
    'as' => 'quiz_show',
    'uses' => 'QuizController@show'
]);

$router->get('signup', [
    'as' => 'user_signup', 
    'uses' => 'UserController@signup'
]);

$router->post('signup', [
    'as' => 'user_signup', 
    'uses' => 'UserController@signup'
]);

$router->get('signin', [
    'as' => 'user_signin', 
    'uses' => 'UserController@signin'
]);

$router->post('signin', [
    'as' => 'user_signin', 
    'uses' => 'UserController@signin'
]);

$router->get('account', [
    'as' => 'user_profile', 
    'uses' => 'UserController@profile'
]);

$router->get('logout', [
    'as' => 'quiz_logout', 
    'uses' => 'UserController@logout'
]);

$router->get('quiz/tag/{tagId:[i]}', [
    'as' => 'quiz_listByTag', 
    'uses' => 'QuizController@listByTag'
]);

$router->get('tag', [
    'as' => 'tag_list', 
    'uses' => 'TagController@list'
]);

