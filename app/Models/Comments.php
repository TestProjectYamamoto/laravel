<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Posts;

class Comments extends Model
{
    use HasFactory;


    public function useIdForData(int $id): Object
    {
        $data = Comments::where('id', $id)->get();
        return $data;
    }

    public function useIdForPostData(int $id): Object
    {
        $commentData = Comments::where('id', $id)->get();
        $postId = $commentData[0]['post_id'];
        $postData = Posts::where('id', $postId)->get();
        return $postData;
    }
}
