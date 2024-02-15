<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\TherapistController;
use App\Http\Controllers\PatientTherapistController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\AdminController;





Route::get('/', function () {
    return view('welcome');
});

Auth::routes();





//************************************ADMIN*******************************************************************
Route::get('admin', [AdminController::class, 'showLoginForm'])->name('admin.login');

Route::post('admin', [AdminController::class, 'login'])->name('admin.login.submit');

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('admin/user', [AdminController::class, 'user'])->name('admin.user');

Route::get('admin/doctor', [AdminController::class, 'doctor'])->name('admin.doctor');

Route::get('admin/therapist', [AdminController::class, 'therapist'])->name('admin.therapist');

Route::get('admin/survey', [AdminController::class, 'survey'])->name('admin.survey');

Route::post('/admin/doctor/{doctor}/accept', [AdminController::class, 'acceptDoctor'])->name('admin.doctor.accept');

Route::delete('/admin/doctor/{doctor}/delete', [AdminController::class, 'deleteDoctor'])->name('admin.doctor.delete');

Route::post('/admin/therapist/{therapist}/accept', [AdminController::class, 'acceptTherapist'])->name('admin.therapist.accept');

Route::delete('/admin/therapist/{therapist}/delete', [AdminController::class, 'deleteTherapist'])->name('admin.therapist.delete');

Route::post('/admin/user/{user}/accept', [AdminController::class, 'acceptUser'])->name('admin.user.accept');

Route::delete('/admin/user/{user}/delete', [AdminController::class, 'deleteUser'])->name('admin.user.delete');


//************************************ DOCTOR*******************************************************************
Route::get('/doctor/register', [DoctorController::class, 'showRegistrationForm'])->name('doctor.register.form');

Route::post('/doctor/register', [DoctorController::class, 'register'])->name('doctor.register');

Route::get('/doctor/login', [DoctorController::class, 'showLoginForm'])->name('doctor.login.form');

Route::post('/doctor/login', [DoctorController::class, 'login'])->name('doctor.login');

Route::post('/doctor/logout', [DoctorController::class, 'logout'])->name('doctor.logout');

Route::get('/doctor/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');

Route::get('/doctor/appointment', [DoctorController::class, 'appointment'])->name('doctor.appointment');

Route::get('/doctor/dashboard/calendar', [DoctorController::class, 'dashboardWithCalendar'])->name('doctor.dashboard.calendar');

Route::post('/doctor/store-calendar', [DoctorController::class, 'storeCalendar'])->name('doctor.store.calendar');






//**********************************************USER-TYPE**************************************************************
Route::get('/user-type', [LoginController::class, 'showUserTypeForm'])->name('user.type.form');

Route::get('/user-typeregister', [RegisterController::class, 'showUserTypeForm'])->name('user.type.registration');






//**********************************************THERAPEUTE**************************************************************
Route::get('/therapist/login', [TherapistController::class, 'showLoginForm'])->name('therapist.login');

Route::post('/therapist/login', [TherapistController::class, 'login']);

Route::get('/therapist/register', [TherapistController::class, 'showRegistrationForm'])->name('therapist.register');

Route::post('/therapist/register', [TherapistController::class, 'register']);

Route::get('/dashboard', [TherapistController::class, 'dashboard'])->name('therapist.dashboard');

Route::get('/dashboard/appointment', [TherapistController::class, 'appointment'])->name('therapist.appointment');







//**********************************************PATIENT-THERAPEUTE**************************************************************
Route::post('/therapist/accept/{patientTherapist}', [TherapistController::class, 'accept'])->name('therapist.accept');

Route::delete('/therapist/cancel/{patientTherapist}', [TherapistController::class, 'cancel'])->name('therapist.cancel');

Route::get('/patient-therapists', [PatientTherapistController::class, 'index'])->name('patient-therapists.index');

Route::post('/patient-therapists', [PatientTherapistController::class, 'store'])->name('patient-therapists.store');


Route::get('/success', function () {
    return view('therapeute.success');
})->name('success');






//**********************************************SURVEY**************************************************************
Route::get('/survey', [SurveyController::class, 'show'])->name('survey.show');
Route::post('/survey/submit', [SurveyController::class, 'submit'])->name('survey.submit');
Route::get('/survey/thankyou', [SurveyController::class, 'thankyou'])->name('survey.thankyou');





//**********************************************APPOINTMENT**************************************************************
Route::post('/appointments/{appointment}/accept', [AppointmentController::class, 'accept'])->name('appointments.accept');

Route::delete('/appointments/{appointment}', [AppointmentController::class, 'cancel'])->name('appointments.cancel');

Route::get('/appointments/search', [AppointmentController::class, 'showSearchForm'])->name('appointments.search');

Route::post('/appointments/search', [AppointmentController::class, 'search'])->name('appointments.search');

Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');

Route::get('/appointments/thankyou', [AppointmentController::class, 'thankyou'])->name('appointments.thankyou');

