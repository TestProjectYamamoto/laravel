<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToppageController extends Controller
{
    public function __invoke()
    {
        return view('toppage');
    }
}
