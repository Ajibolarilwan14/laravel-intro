<?php

use App\Post;
use Illuminate\Support\Facades\Route;

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

// Route::get('/about', function () {
//     return "Hi this is about page";
// });

// Route::get('/contact', function () {
//     return "Hello this is contact page";
// });

Route::get('/post', function (){
    return view('post');
});

Route::get('/contact', 'postsController@contact');

// Route::get('/greeting', function() {
//     return view('contact', ['name'=> 'Ajibola']);
// });

/*
|--------------------------------------------------------------------------
| Raw sql queries
|--------------------------------------------------------------------------
|
*/


Route::get('/insert', function (){
   DB::insert('insert into posts(title, body) values(?, ?)',['laravel','laravel is super cool i must confess']);
//    DB::insert('insert into posts(title, body) values(?, ?)',['laravel framework','i still dont know what am doing right now']);
});

//Route::get('/read', function () {
//   $results = DB::select('select * from posts where id = ?', [1]);
//   return $results;
//    return var_dump($results);
//   foreach($results as $result) {
//       return $result->body;
//    }
//});

//Route::get('/update', function () {
//    $updated = DB::update('update posts set title = "updated title" where id=?',[1]);
//    return $updated;
//});

//Route::get('/delete',function () {
//    $deleted = DB::delete('delete from posts where id= ?',[1]);
//    return $deleted;
//});

/*
|--------------------------------------------------------------------------
| Eloquent ORM
|--------------------------------------------------------------------------
|
*/


Route::get('/find', function () {
    $post = Post::find(2);
//    $post = Post::all();
    return $post->title;
});

Route::get('/findwhere', function () {
    $posts = Post::where('id', 1)->orderBy('id','desc')->take(1)->get();
    return $posts;
});

Route::get('/findmore', function () {
    $posts = Post::findOrfail(2);
    return $posts;

//    $posts = Post::where('users_count', '<', 50)->firstOrfail();
});
