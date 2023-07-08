<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admincontroller;


/*-------------------------Admin Routes---------------------*/

    Route::get('/', function () {
    return view('admin.login');
    });
    // Group Controller
    Route::controller(admincontroller::class)->group(function(){

        // Prefix User Name
     Route::prefix('admin')->group(function () {
    
        // Login
        Route::get('/','login');
        Route::get('/login','login');
        Route::post('loginaction','adminloginaction');
    
        // Forget
       Route::get('/forget', function () { return view('admin.forget');  });
        Route::post('/forget_action','forget_action');
    
        // Middleware
     Route::group(['middleware' => 'admin'], function () {
    
        // Dashboard
        Route::get('dashboard','dashboard');
    
        //profile
        Route::get('profile','profile');
        Route::post('profile_edit_action','profile_edit_action');
    
        //update password
        Route::get('update_password','update_password');
        Route::post('update_password_action','update_password_action');
     
        //Logout
        Route::get('logout','logout');
    
        // Client
        Route::get('/active_client','active_client');
        Route::get('/block_client','block_client');
        Route::get('/client_profile/{id}','client_profile');
        Route::get('/delete_client/{id}','delete_client');
        Route::get('/reactive_client/{id}','reactive_client');
            Route::get('/download_directory/{id}','download_directory');


        // Queries
        Route::get('/active_query','active_query');
        Route::get('/solve_query','solve_query');
        Route::get('/delete_query/{id}','delete_query');
    
       //update password
       route::get('update_password','update_password');
       route::post('update_password_action','update_password_action');
  
    
    });  
    // End Middleware
    
    });
    
    
    });

    
