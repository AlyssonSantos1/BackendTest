<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookCollection;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});

Route::post('/login', function(Request $request) {

    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        $user = Auth::user();
        $token = $user->createToken('JWT');
        return response()->json($token->plainTextToken, 200);
    }

    return response()->json('Failed to Login', 400);
});

Route::get('/', [BookCollection::class, 'getAll']);
Route::post('/added', [BookCollection::class, 'create']);
Route::put('/updated/{id}', [BookCollection::class, 'update']);
Route::delete('/delete/{id}', [BookCollection::class, 'destroy']);
