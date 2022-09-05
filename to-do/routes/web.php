<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;

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

// Route::get('/app', function () {
//     return view('app');
// });

Route::auth();
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/todos', [TodoController::class, 'index']);
Route::post('/todo', [TodoController::class, 'store']);
Route::delete('/todo/{todo}', [TodoController::class, 'destroy']);

Route::get('/myTodos', [TodoController::class, 'todos']);
Route::post('/assignTodo', [TodoController::class, 'assign']);

Route::get('/submitTodo', function () {
  return view('submitTodo');
});

Route::get('/users', function () {
  return view('user');
});


Route::get('/assign', function () {
  $users = DB::table('users')->get();
  $list = $users->map(
      function($place) {
          return [
              "label" => $place->name,
              "value" => $place->id
          ];
      }
  );

  $todos = DB::table('todos')->get();
  $list_todos = $todos->map(
      function($place) {
          return [
              "label" => $place->title,
              "value" => $place->id
          ];
      }
  );
  return view('assign',['users' => $list, 'todos' => $list_todos]);
});