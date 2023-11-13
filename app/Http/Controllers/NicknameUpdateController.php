<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NicknameUpdateController extends Controller
{
    public function __invoke()
    {
        return view('nicknameUpdate');
    }
}
