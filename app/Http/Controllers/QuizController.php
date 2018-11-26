<?php

namespace App\Http\Controllers;


use App\Quiz;
use App\User;
use App\Level;
use App\Question;
use App\Answer;
/* use Illuminate\Http\Request; */

class QuizController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function list(/*Request $request*/){
        $quizzes = Quiz::all();
        //dump($quizzes);
        $users = User::all();
        $userList = [];

        foreach($users as $user){
        $userList[$user->id] = $user->firstname . ' ' . $user->lastname;
        }

        return view('quiz.list', [
            'quizzes' => $quizzes,
            'userList' => $userList
        ]);
    }

    public function show($id){
        //dump($id);
        
        // QUIZ 6.2.3 - recuperation du quizz
        $currentQuiz = Quiz::findOrFail($id);

        // QUIZ 6.2.4 - recuperation des questions associées au quiz

        // alternative RAW $users = DB::select('select * from app_user where id_quizz = ?', [$currentQuiz->id]);
        // where = contrainte, get = recupere les resultats
        $questions = Question::where('quizzes_id', '=', $currentQuiz->id)->get();

        // QUIZZ 6.2.7 - affichage des réponses sans random 

        /*

        foreach($questions as $question){
            $answers = Answer::where('questions_id', '=', $question->id)->get();

            $questionAnswerList[$question->id]= $answers;            
        }
        
        */

        // QUIZZ 6.2.8 - Rendre aleatoire l'affichage des réponses
        $questionAnswerList = $this->getRandomizedAnswers($questions);

        // QUIZZ 6.2.6 - Recupérer l'auteur
        $author = User::find($currentQuiz->app_users_id);
        
        // QUIZZ 6.2.9 - Recupérer les niveaux
        $levels = Level::all();

        $levelList = [];

        // HOME 6.1.3 - permet de recuperer directement tous les users afin de simuler la jointure
        foreach($levels as $level){
            $levelList[$level->id] = $level->name;
        }


        return view('quiz.show', [
            'currentQuiz' => $currentQuiz,
            'questions' => $questions,
            'author' => $author, // QUIZ 6.2.6
            'questionAnswerList' => $questionAnswerList, // QUIZ 6.2.8
            'levelList' => $levelList, // QUIZ 6.2.9
        ]);
    }

    // QUIZZ 6.2.8 - Retourner et rendre aleatoire l'affichage des réponses
    public function getRandomizedAnswers($questions){

        $questionAnswerList = [];

        foreach($questions as $question){

            //On execute la requete pour chaque tour de boucle 
            //Note: optimisation si requete + jointure

            /*
            shuffle fonction utile de l'objet Illuminate\Database\Eloquent\Collection retourné  par Eloquent : https://laravel.com/docs/5.7/collections#method-shuffle
            */
            $answers = Answer::where('questions_id', '=', $question->id)->get()->shuffle();

            //on attribue les reponses melangée pour chaque id
            $questionAnswerList[$question->id]= $answers;
        }

        return $questionAnswerList;
    }

/*     public function tags(){
        
    } */

    public function listByTag(){

        return view('quiz.list', []);

    }
}