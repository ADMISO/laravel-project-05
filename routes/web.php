<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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

Route::get('/',[AuthController::class,'login']);
Route::post('/store-login',[AuthController::class,'storeLogin']);
Route::get('/logout',[AuthController::class,'logout']);


/*Route::get('/admin/form', function () {
    //echo "here";
    return view('admin.pages.forms');
});*/

//Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
Route::middleware(['IsLoggedIn','IsAdmin'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('/admin/form',[AdminController::class,'checkForm']);
    Route::get('/admin/table',[AdminController::class,'checkTable']);

    //creation
    Route::get('/admin/create-student',[AdminController::class,'createStudent']);
    Route::post('/admin/store-student',[AdminController::class,'storeStudent']);
    Route::get('/admin/create-teacher',[AdminController::class,'createTeacher']);
    Route::post('/admin/store-teacher',[AdminController::class,'storeTeacher']);

    //tables-edit-delete
    Route::get('/admin/all-students',[AdminController::class,'allStudents']);
    Route::get('/admin/all-teachers',[AdminController::class,'allTeachers']);
    Route::get('/admin/edit-teacher/{id}',[AdminController::class,'editTeacher']);
    Route::get('/admin/delete-teacher/{id}',[AdminController::class,'deleteTeacher']);
    Route::get('/admin/edit-student/{id}',[AdminController::class,'editStudent']);
    Route::get('/admin/delete-student/{id}',[AdminController::class,'deleteStudent']);
    Route::post('/admin/update-teacher/{id}',[AdminController::class,'updateTeacher']);
    Route::post('/admin/update-student/{id}',[AdminController::class,'updateStudent']);


});

