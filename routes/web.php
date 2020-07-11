<?php

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

// エントランスページ
Route::get('/welcome', 'LoginController@topPage'); //エントランスページを表示

//管理用ログイン
Route::get('/kanri', 'LoginController@loginForKanriPage'); //ログインページを表示

Route::post('/kanri', 'LoginController@loginForKanri'); //ログイン処理を実行

// 社員用ログイン
Route::get('/shanai', 'LoginController@loginForShanaiPage'); //社員用ログインページを表示

Route::post('/shanai', 'LoginController@loginForshanai'); //社員用ログイン処理を実行

// 記事
// 記事一覧表示 sessionId1~6以外をブロック
Route::get('/posts', 'PostsController@index')->middleware('OutsideBlock');
// 記事投稿画面 sessionId1~5以外をブロック
Route::get('/posts/create', 'PostsController@create')->middleware('CheckAdmin','OutsideBlock');
// 記事投稿処理 sessionId1~5以外をブロック
Route::post('/posts/create', 'PostsController@store')->middleware('CheckAdmin','OutsideBlock');
// 記事一件表示
Route::get('/posts/{id}', 'PostsController@show')->middleware('OutsideBlock');

//閲覧用コントロール
Route::get('/shanai', 'LoginController@loginForShanaiPage');

Route::get('/contents', 'NewsLetter@index');

