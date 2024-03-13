<?php

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


// routes/api.php

use App\Http\Controllers\TodoController;

// Get all todos
Route::get('/todos', [TodoController::class, 'index']);

// Get a specific todo
Route::get('/todos/{id}', [TodoController::class, 'show']);

// Create a new todo
Route::post('/todos', [TodoController::class, 'store']);

// Update a todo
Route::put('/todos/{id}', [TodoController::class, 'update']);

// Delete a todo
Route::delete('/todos/{id}', [TodoController::class, 'destroy']);
