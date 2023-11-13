<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewpostController extends Controller
{
    public function __invoke()
    {
        return view('newpost');
    }
}
