<?php

use App\Http\Controllers\PostsApiController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**Registration of an API Route to get / return all the posts 
 * They are registered under api 
 * ex: localhost/api/posts
*/
Route::get('/posts', [PostsApiController::class, 'index']);
/*Alternative without a Controller(PostsApiController) get method
Route::get('/posts', function(){
    return Post::all();
});*/

/**Registration of an API Route to post / create posts */
Route::post('/posts', [PostsApiController::class, 'store']);

/*Alternative without a Controller(PostsApiController) post method
Route::post('/posts', function(){
    //To provide all the validations fields in the request     
    request()->validate([
        'title' => 'required',
        'content' => 'required'
    ]);


    return Post::create([
        'title' => request('title'),
        'content' => request('content'),
    ]);
});*/

/**Registration of an API Route to update a post */
Route::put('/posts/{post}', [PostsApiController::class, 'update']);
/*Alternative without a Controller(PostsApiController) put method
Route::put('/posts/{id}', function($id){
    $post = Post::findOrfail($id);

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
});*/

/* Easier alternative Put Method thanks to laravel
Route::put('/posts/{post}', function(Post $post){
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
});*/

/**Registration of an API Route to delete a post */
Route::delete('/posts/{post}', [PostsApiController::class, 'destroy']);

/*Alternative without a Controller(PostsApiController) delete method
Route::delete('/posts/{id}', function($id){
    $post = Post::findOrfail($id);

    $success = $post->delete();

    //success is true if successful, false if not
    return [
        'success' => $success
    ];
});*/

/* Easier alternative Delete Method thanks to laravel
Route::delete('/posts/{post}', function(Post $post){
    $post->delete();

    //success is true if successful, false if not
    return [
        'success' => $success
    ];
});*/