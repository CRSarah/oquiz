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
        $quizzes = Quizzes::all();
        //dump($quizzes);
        return view('home', [
            'quizzes' => $quizzes
        ]);
    }
}