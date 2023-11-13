<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnregisteredController extends Controller
{
    public function __invoke()
    {
        return view('unregistered');
    }
}
