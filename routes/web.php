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
    Route::post('/admin/update-profile',[AdminController::class,'updateProfile']);

    //creation
    Route::get('/admin/create-student',[AdminController::class,'createStudent']);
    Route::post('/admin/store-student',[AdminController::class,'storeStudent']);
    Route::get('/admin/create-teacher',[AdminController::class,'createTeacher']);
    Route::post('/admin/store-teacher',[AdminController::class,'storeTeacher']);
    Route::get('/admin/create-session',[AdminController::class,'createSession']);
    Route::post('/admin/store-session',[AdminController::class,'storeSession']);
    Route::get('/admin/create-course',[AdminController::class,'createCourse']);
    Route::post('/admin/store-course',[AdminController::class,'storeCourse']);
    Route::get('/admin/create-section',[AdminController::class,'createSection']);
    Route::post('/admin/store-section',[AdminController::class,'storeSection']);

    //tables-edit-delete
    Route::get('/admin/all-students',[AdminController::class,'allStudents']);
    Route::get('/admin/all-teachers',[AdminController::class,'allTeachers']);
    Route::get('/admin/all-sessions',[AdminController::class,'allSessions']);
    Route::get('/admin/all-courses',[AdminController::class,'allCourses']);
    Route::get('/admin/edit-teacher/{id}',[AdminController::class,'editTeacher']);
    Route::get('/admin/delete-teacher/{id}',[AdminController::class,'deleteTeacher']);
    Route::get('/admin/edit-student/{id}',[AdminController::class,'editStudent']);
    Route::get('/admin/delete-student/{id}',[AdminController::class,'deleteStudent']);
    Route::post('/admin/update-teacher/{id}',[AdminController::class,'updateTeacher']);
    Route::post('/admin/update-student/{id}',[AdminController::class,'updateStudent']);
    Route::get('/admin/update-session/{id}',[AdminController::class,'updateSession']);
    Route::get('/admin/edit-course/{id}',[AdminController::class,'editCourse']);
    Route::get('/admin/delete-course/{id}',[AdminController::class,'deleteCourse']);
    Route::post('/admin/update-course/{id}',[AdminController::class,'updateCourse']);

    //assign-course
    Route::get('/admin/assign-course',[AdminController::class,'assignCourse']);
    Route::post('/admin/store-assign-course',[AdminController::class,'storeAsssignCourse']);
    Route::get('/test',[AdminController::class,'test']);

    //enrollment
    Route::get('/admin/enrollment',[AdminController::class,'enrollments']);
    Route::get('/admin/enroll-approve/{id}',[AdminController::class,'enrollApprove']);

    
});

Route::middleware(['IsLoggedIn','IsStudent'])->group(function(){
    Route::get('/student/dashboard',[StudentController::class,'dashboard']);
    Route::post('/student/update-profile',[StudentController::class,'updateProfile']);
    Route::get('/student/enrollment',[StudentController::class,'enrollment']);
    Route::get('/student/get-session-course/{id}',[StudentController::class,'getAssignedCourses']);
    Route::post('/student/store-enroll',[StudentController::class,'storeEnroll']);

});

Route::middleware(['IsLoggedIn','IsTeacher'])->group(function(){
    Route::get('/teacher/dashboard',[TeacherController::class,'dashboard']);
    Route::post('/teacher/update-profile',[TeacherController::class,'updateProfile']);
    Route::get('/teacher/create-course',[TeacherController::class,'createCourse']);
    Route::get('/teacher/get-session-course/{id}',[TeacherController::class,'getCourse']);
    Route::post('/teacher/store-course',[TeacherController::class,'storeCourse']);
    Route::get('/teacher/create-group',[TeacherController::class,'createGroup']);
    

});

