<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UndiruvchiController extends Controller
{
    public function index()
    {
        return view('undiruvchilar.index');
    }

    public function map()
    {
        return view('undiruvchilar.map');
    }
}
