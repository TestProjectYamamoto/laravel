<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredController extends Controller
{
    public function __invoke()
    {
        return view('registered');
    }
}
