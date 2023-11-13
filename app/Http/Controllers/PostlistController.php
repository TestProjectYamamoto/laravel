<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostlistController extends Controller
{
    public function __invoke()
    {
        return view('postlist');
    }
}
