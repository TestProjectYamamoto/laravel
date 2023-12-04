<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    public function useIdForData(int $id): Object
    {
        $data = Posts::where('id', $id)->get();
        return $data;
    }
}
