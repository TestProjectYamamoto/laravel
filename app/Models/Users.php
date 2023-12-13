<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    public function useUidForData(string $uid): Object
    {
        $data = Users::where('uid', $uid)->get();
        return $data;
    }
}
