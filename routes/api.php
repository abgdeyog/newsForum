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

Route::get('getPosts', 'PostController@index'); // no attributes
Route::middleware('auth:api')->get('deletePost', 'PostController@delete'); // api_token, post_id
Route::middleware('auth:api')->get('createPost', 'PostController@create'); // api_token, header, description
Route::middleware('auth:api')->get('updatePost', 'PostController@update'); // api_token, header, description
Route::get('getPostById', 'PostController@getPostByPostId'); // post_id
Route::get('checkPostPermission', 'PostController@checkPostPermission'); // api_token, post_id

Route::get('getAllComments', 'CommentController@index'); // no attributes
Route::middleware('auth:api')->get('deleteComment', 'CommentController@delete'); // api_token, comment_id
Route::middleware('auth:api')->get('createComment', 'CommentController@create'); // api_token, text
Route::middleware('auth:api')->get('updateComment', 'CommentController@update'); // api_token, text
Route::get('getCommentById', 'CommentController@getCommentByCommentId'); // comment_id
Route::get('getCommentsByPostId', 'CommentController@getCommentsByPostId'); // post_id
Route::get('checkCommentPermission', 'CommentController@checkCommentPermission'); // api_token, comment_id


Route::get('findUserIdByPostId', 'PostController@findUserIdByPostId'); /* find user_id with BSA by post_id,
 requires user_id and post_id attributes */
Route::get('getAllPosts', 'PostController@getAllPosts'); /* no attributes, here are implemented nested loops,
 and 2 dimensional array */
