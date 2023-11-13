<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountGotController extends Controller
{
    public function __invoke()
    {
        return view('accouuntGot');
    }
}
