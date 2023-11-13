<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentDeleteController extends Controller
{
    public function __invoke()
    {
        return view('commentDelete');
    }
}
