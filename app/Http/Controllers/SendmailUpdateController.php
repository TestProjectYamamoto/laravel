<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendmailUpdateController extends Controller
{
    public function __invoke()
    {
        return view('sendmail_update');
    }
}
