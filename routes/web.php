<?php

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


Route::resource('branche', 'BranchesController');
Route::get('/branche/{branche}/ajax_load_model_by_region_id', 'BranchesController@ajax_load_model_by_region_id');
Route::get('/branche/{branche}/ajax_load_sectors_by_model_id', 'BranchesController@ajax_load_sectors_by_model_id');
Route::get('/branche/{branche}/ajax_load_sectors_by_sector_id', 'BranchesController@ajax_load_sectors_by_sector_id');
Route::get('/branche/{branche}/ajax_load_branches_by_sector_id', 'BranchesController@ajax_load_branches_by_sector_id');
Route::post('/branche/ajax_add_sector', 'BranchesController@ajax_add_sector');
Route::put('/branche/{branche}/ajax_update_sector', 'BranchesController@ajax_update_sector');
Route::delete('/branche/{branche}/ajax_delete_sector', 'BranchesController@ajax_delete_sector');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
