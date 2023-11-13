<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostUpdateController extends Controller
{
    public function __invoke()
    {
        return view('postUpdate');
    }
}
