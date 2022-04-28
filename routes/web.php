<?php

use App\Http\Controllers\QuestionController;
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

Auth::routes();
$qc = QuestionController::class;
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->prefix('questions')->name('q.')->group(function () {
    $qc = QuestionController::class;
    Route::get('/', [$qc, 'create'])->name('create');
    Route::post('/', [$qc, 'store'])->name('store');
    Route::get('/{id}/edit', [$qc, 'edit'])->name('edit');
    Route::put('/{id}', [$qc, 'update'])->name('update');
    Route::delete('/{id}', [$qc, 'destroy'])->name('destroy');
    Route::post('answer', [$qc, 'answer'])->name('answer');
  //  Route::post('/{id}/answer', [$qc, 'answerId'])->name('answer.id');
   // Route::post('comment', [$qc, 'comment'])->name('comment');
   // Route::post('/{id}/comment', [$qc, 'commentId'])->name('comment.id');

});
Route::get('questions/{id}', [$qc, 'show'])->name('q.show');

Route::post('comment', [App\Http\Controllers\CommentController::class, 'comment'])->name('comment');
