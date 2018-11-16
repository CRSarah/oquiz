<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Questions;
/* use App\;
use App\;
use App\; */

class QuizController extends Controller
{
    public function quiz(){
        $questions = Questions::all();
        //dump($questions);
        return view('quiz', [
            'questions' => $questions
        ]);
    }

    public function quizPost(){
        $questions = Questions::all();
        dump($questions);
        return view('quizPost', [
            'questions' => $questions
        ]);
    }

    public function tags(){
        
    }

    public function listByTag(){

    }
}