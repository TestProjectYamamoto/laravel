<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostditailController extends Controller
{
    public function __invoke()
    {
        return view('postditail');
    }
}
