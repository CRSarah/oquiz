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

// route pour la home
$router->get('/',[
    'as' => 'home', // as permet de définir le nom de ma route
    'uses' => 'MainController@home' // uses permet de donner le chemin (ici MonController@MaMethode)
]);

// route pour le quiz et ses réponses
$router->get('/quiz/{id}',[
    'as' => 'quiz', // as permet de définir le nom de ma route
    'uses' => 'QuizController@quiz' // uses permet de donner le chemin (ici MonController@MaMethode)
]);

/* // route pour le quiz et ses réponses
$router->post('/quiz/',[
    'as' => 'quiz', // as permet de définir le nom de ma route
    'uses' => 'QuizController@quizPost' // uses permet de donner le chemin (ici MonController@MaMethode)
]); */


