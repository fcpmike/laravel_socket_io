<?php

use App\Events\PostCreated;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Route::get('/create-post', function () {
    $user = User::first();

    $post = $user->posts()->create([
        'title' => Str::random(150),
        'body' => Str::random(400),
    ]);

    //event(new PostCreated($post));//Opção direta, desvantagem que precisa chamar em cada lugar

    return 'ok';
});

Route::get('/', function () {
    return view('welcome');
});
