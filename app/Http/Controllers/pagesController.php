<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\projects;
use App\task;

class pagesController extends Controller
{
    public function index(){
        $proy = projects::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.index')->with('projects', $proy);
    }
}
