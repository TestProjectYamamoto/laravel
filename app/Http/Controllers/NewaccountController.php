<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewaccountController extends Controller
{
    public function __invoke()
    {
        return view('newaccount');
    }
}
