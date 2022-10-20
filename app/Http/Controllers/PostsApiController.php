<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsApiController extends Controller
{
    public function index(){
        return Post::all();
    }

    public function store(){
        /**To provide all the validations fields in the request */    
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);


        return Post::create([
            'title' => request('title'),
            'content' => request('content'),
        ]);
    }

    public function update(Post $post){
        //To provide all the validations fields in the request     
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $success = $post->update([
            'title' => request('title'),
            'content' => request('content'),
        ]);

        //success is true if successful, false if not
        return [
            'success' => $success
        ];
    }

    public function destroy(Post $post){
        $success = $post->delete();

        //success is true if successful, false if not
        return [
            'success' => $success
        ];
    }
}
