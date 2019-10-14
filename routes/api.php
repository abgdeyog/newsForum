<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getAllPosts', 'PostController@index');
Route::middleware('auth:api')->get('deletePost', 'PostController@delete');
Route::middleware('auth:api')->get('createPost', 'PostController@create');
Route::middleware('auth:api')->get('updatePost', 'PostController@update');
Route::get('getPostById', 'PostController@getPostByPostId');

Route::get('getAllComments', 'CommentController@index');
Route::middleware('auth:api')->get('deleteComment', 'CommentController@delete');
Route::middleware('auth:api')->get('createComment', 'CommentController@create');
Route::middleware('auth:api')->get('updateComment', 'CommentController@update');
Route::get('getCommentById', 'CommentController@getCommentByCommentId');
Route::get('getCommentsByPostId', 'CommentController@getCommentsByPostId');

Route::get('findUserIdByPostId', 'PostController@findUserIdByPostId');
Route::get('getPostsJSON', 'PostController@getAllPostsJson');
