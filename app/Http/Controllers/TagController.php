<?php

namespace App\Http\Controllers;

class TagController extends Controller
{
    public function __construct()
    {

    }

    public function list(){
        return view('tag.list', []);    
    }
} 