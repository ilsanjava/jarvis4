<?php
use App\Http\Controllers\BookController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route untuk menampilkan data pustakawan
Route::get('/pustakawan', [PustakawanController::class, 'index']);

// Get all
Route::get('/books', [BookController::class, 'index']);

// Add resouce
Route::post('/books', [BookController::class, 'store']);

// Get detail resource
Route::get('/books/{id}', [BookController::class, 'show']);

// Edit resource
Route::put('/books/{id}', [BookController::class, 'update']); 

// Delete Resource
Route::delete('/book/{id}', [BookController::class, 'destroy']);

// Search resource by title

Route::get('/books/serch/{title}', [BookController::class, 'search']);