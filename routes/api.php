<?php

use App\Http\Controllers\API\RecipeApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group([
//     'prefix' => 'v1'
// ], function () {
//     Route::post('login', 'AuthController@login');
//     Route::post('signup', 'AuthController@signup');

//     Route::group([
//       'middleware' => 'auth:api'
//     ], function() {
//         Route::get('logout', 'AuthController@logout');
//         Route::get('user', 'AuthController@user');
//     });
// });

Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', 'UserController@login');
    Route::post('/register', 'UserController@register');
    Route::get('/logout', 'UserController@logout')->middleware('auth:api');
});

Route::group(['namespace' => 'API', 'prefix' => 'v1'], function(){
    Route::get('/recipe/all', 'RecipeApiController@lasted');
    Route::get('/recipes/type/{id}', 'RecipeApiController@getRecipesByTypes');
    Route::get('/recipe/{id}', 'RecipeApiController@getRecipe');
    Route::get('/types/all', 'DishTypeApiController@getAllTypes');
    Route::get('/recipes/set/{id}', 'RecipeApiController@getSetMealsRecipe');
    Route::get('/recipes/randomfeed', 'RecipeApiController@randomFeeds');
});
