<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AplicationPageController;
use App\Http\Controllers\userFisrtPageController;
use App\Http\Controllers\editPageController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\MultipleMailController;
use App\Models\User;

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
Route::get('admin', [AdminController::class, 'index']);
Route::get('application', [AplicationPageController::class, 'index']);
Route::post('/wait', [AplicationPageController::class, 'storeData']);
Route::view('wait', 'wait');
Route::get('user/{id}', [UserController::class, 'showUserData']);

Route::view('login', 'login');
Route::post('login', [UserController::class, 'login']);

// Route::view('register', 'register');
Route::get('register', [RegisterController::class, 'showOrgData']);
Route::view('RegOrg', 'RegOrg');
Route::get('userFirstPage', [userFisrtPageController::class, 'index']);
Route::view('userProfile', 'userProfile');
Route::view('view', 'view');

Route::post('addjob', [JobController::class, 'index']);
Route::post('adddepartment', [DepartmentController::class, 'index']);

Route::get('deleteDomain/{id}', [DomainController::class, 'deleteDomain']);
Route::get('updateDomain/{id}', [DomainController::class, 'showDataDomain']);
Route::post('/updateDomain', [DomainController::class, 'updateDomain']);
Route::post('addDomain', [DomainController::class, 'storeDomain']);

Route::get('deleteSubDomain/{id}', [DomainController::class, 'deleteSubDomain']);
Route::get('updateSubDomain/{id}', [DomainController::class, 'showDataSubDomain']);
Route::post('/updateSubDomain', [DomainController::class, 'updateSubDomain']);
Route::post('addSubDomain', [DomainController::class, 'storeSubDomain']);

Route::get('deleteJob/{id}', [JobController::class, 'delete']);
Route::get('updateJob/{id}', [JobController::class, 'showData']);
Route::post('/updateJob', [JobController::class, 'update']);

Route::get('deleteDept/{id}', [DepartmentController::class, 'delete']);
Route::get('updateDept/{id}', [DepartmentController::class, 'showdata']);
Route::post('/updateDept', [DepartmentController::class, 'update']);

Route::get('/logout', function(){
    session()->forget('user');
    return redirect('login');
});

Route::get('/logoutStaff', function(){
    session()->forget('staff');
    // session()->forget('user');
    return redirect('login');
});

Route::post('/regAdmin', [RegisterController::class, 'storeAdmin']);
Route::post('/regUser', [RegisterController::class, 'storeUser']);

Route::get('accept/{id}', [UserController::class, 'acceptRequest']);
Route::get('reject/{id}', [UserController::class, 'rejectRequest']);

Route::get('/edit/{id}', [editPageController::class, 'index']);
Route::post('/edit', [editPageController::class, 'storeData']);

Route::get('/', function () {
    return redirect('login');
});

// Route::post('/searchdept', [DepartmentController::class, 'searchDept']);
Route::get('search', [searchController::class, 'search']);

Route::get('/email/{id}', [EmailController::class, 'create']);
Route::post('/sendEmail', [EmailController::class, 'sendEmail']);

Route::get('multipleMail', [MultipleMailController::class, 'index']);
Route::get('multipleMail/search', [MultipleMailController::class, 'action']);

Route::post('multipleMail/send', [MultipleMailController::class, 'sendPage']);

Route::get('multipleMailSendData', function ($data) {
        return $data;
        return view('multipleMailSendData', ['data'=>$data]);
})->name('profile');

Route::get('test_1', [MultipleMailController::class, 'test_1']);


Route::get('search_mail', [EmailController::class, 'search_users_page']);
Route::post('search_mail', [EmailController::class, 'search_users']);
Route::post('send_email', [EmailController::class, 'send_email']);

Route::get('search_sms', [EmailController::class, 'search_sms_page']);
Route::post('search_sms', [EmailController::class, 'search_sms']);
Route::post('send_sms', [EmailController::class, 'send_sms']);
