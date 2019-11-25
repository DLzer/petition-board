<?php

use App\Petiton;
use App\PetitionComment;

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

Route::get('/', 'PetitionController@index')->name('home');

Route::get('/single/{petition_id}', function($petition_id = null) {

    $petition = App\Petition::findOrFail($petition_id);
    $petition_comments = App\PetitionComment::where('petition_id', $petition_id)->get();
    $petition['comments'] = $petition_comments;

    return View::make('pages.single', ['petition' => $petition]);
})->name('single');

Route::get('/submission', function() {
    return View::make('pages.submission');
})->name('submission');

Route::post('/submit_comment', 'PetitionController@submit_comment');
Route::post('/store_petition', 'PetitionController@store')->name('store');
Route::post('/petition_vote', 'PetitionController@vote')->name('vote');
Route::post('/delete', 'PetitionController@delete')->name('delete');

Route::post('/deployment',function() {
    require_once dirname($_SERVER['DOCUMENT_ROOT'],1).'/deployment/gitautodeploy.php';
});
