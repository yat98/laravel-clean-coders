<?php

use App\Models\Comment;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnsubscribeUserController;
use App\Http\Controllers\NewsletterSubscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('user', [UserController::class, 'store']);
Route::post('user/unsubscribe-newsletter', UnsubscribeUserController::class);

Route::get('comment', function() {
    // $comments = Comment::all();
    $comments = Comment::with('author')->get();

    foreach($comments as $comment){
        print_r($comment->author->name);
    }
});

Route::get('comment/cache', function() {
    // $comments = Comment::all();
    $comments = Cache::remember('comment', 120, function () {
        return Comment::all();
    });

    foreach($comments as $comment){
        print_r($comment->comment.'<br>');
    }
});


Route::get('rate', RateController::class);

Route::post('newsletter/subscriptions', [NewsletterSubscriptionController::class, 'store']);
