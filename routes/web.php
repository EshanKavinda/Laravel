<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Models\Task;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', function () {
    $data=App\Models\Task::all();
    return view('tasks')->with('datatasks',$data);
});

Route::post('/savetask',[TaskController::class,'store']);

Route::get('/markascomplete/{id}',[TaskController::class, 'markascompleted']);
Route::get('/deletetask/{id}',[TaskController::class, 'delete']);
