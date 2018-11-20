<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Questions;
use App\Quizzes;
/* use App\;
use App\; */

class QuizController extends Controller
{

    public function quiz($id){
        //dump($id);
        
        // ? Ici, grâce à la table définie dans les models, je récupère tooooutes les infos de la table, en vrac et dans un immeeeeeeeense tableau indexé ou c'est le bordel (sinon c'est pas drole)
        $quizzes = Quizzes::all(); // je récupère tous les éléments de ma table
        //dump($quizzes);
        // ? Ici, je définis à vide  un tableau dans lequel je vais venir stocker mes infos de façon ordonnée
        $quizzesById = [];

        // ? Ici, je fais une boucle pour en gros restructurer mon tableau en plein de petits objets
        foreach($quizzes as $quiz) {
            // dump($quiz); exit;
            $quizzesById[$quiz->id] = $quiz; 
        }

        
        $questions = Questions::all();
        //dump($questions);

        return view('quiz', [
            'id' => $id,
            'quiz' => $quizzesById, // ? Ici je renvois qui contient tous les id
            'questions' => $questions
        ]);
    }

/*     public function quizPost(){
        $questions = Questions::all();
        dump($questions);
        return view('quizPost', [
            'questions' => $questions
        ]);
    }

    public function tags(){
        
    }

    public function listByTag(){

    } */
}