<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
//use Illuminate\Http\Request;
use App\Quizzes;

class MainController extends Controller
{
    public function __construct()
    {
        
    }

    public function home(/*Request $request*/){
        $quizzes = Quizzes::all(); // 1ère manière (best)
        //dump($quizzes);
        //$titles = DB::select("SELECT title FROM quizzes"); // 2ème manière
        //dump($titles);
        return view('home', [
            //'titles' => $titles,
            'quizzes' => $quizzes
        ]);
    }
}