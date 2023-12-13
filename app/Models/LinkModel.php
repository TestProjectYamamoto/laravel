<?php

namespace App\Models;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class LinkModel
{
    public function linkGenerate(string $linkTo): string
    {
        $url = URL::temporarySignedRoute($linkTo, 
        now()->addMinutes(30), // 30分以内
        ['link' => 1]);

        return $url;
    }
}
