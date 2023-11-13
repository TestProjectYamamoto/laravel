<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkTimeupController extends Controller
{
    public function __invoke()
    {
        return view('linkTimeUp');
    }
}
