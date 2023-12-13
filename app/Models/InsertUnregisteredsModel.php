<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\LinkModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendUnregisteredsMail;

class InsertUnregisteredsModel extends Model
{
    use HasFactory;

    public function totalUnregist(string $mailadress): void
    {
        $link = new LinkModel;
        $content = $link->linkGenerate('register'); // リンク生成

        Mail::to($mailadress)->send(new SendUnregisteredsMail($content));
    }
}

?>
