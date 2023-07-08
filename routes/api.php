<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apicontroller;
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

// Login
route::post('login',[apicontroller::class,'login']);


// Sign Up
route::post('signup',[apicontroller::class,'signup']);


// Profile
route::post('profile',[apicontroller::class,'profile']);
route::post('edit_profile',[apicontroller::class,'edit_profile']);

// Add Query
route::post('add_query',[apicontroller::class,'add_query']);
route::post('view_query',[apicontroller::class,'view_query']);
route::post('change_status',[apicontroller::class,'change_status']);

// Add directory
route::post('add_directory',[apicontroller::class,'add_directory']);
route::post('view_directory',[apicontroller::class,'view_directory']);
route::post('delete_directory',[apicontroller::class,'delete_directory']);
route::post('download_directory',[apicontroller::class,'download_directory']);

// Add document
route::post('add_document',[apicontroller::class,'add_document']);
route::post('view_document',[apicontroller::class,'view_document']);
route::post('delete_document',[apicontroller::class,'delete_document']);


//  Forget
route::post('forget',[apicontroller::class,'forget']);

// change password
route::post('change_password',[apicontroller::class,'change_password']);