<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PostController;    

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return 'Hello, Laravel routing!';
});
Route::get('/school', function () {
    return 'Welcome to our Laravel class.';
});
Route::get('/about', [PostController::class, 'about']);

Route::view('/about-shortcut', 'about');

Route::get('/students/{id}', function (string $id) {
    return "Student ID: {$id}";
})->name('students.show');

Route::get('/welcome/{name?}', function (?string $name = 'Student') {
    return "Welcome, {$name}!";
});
Route::get('/courses', function () {
    return 'Course list';
})->name('courses.index');

Route::get('/course-url', function () {
    return route('courses.index');
});
Route::redirect('/old-about', '/about');

Route::get('/go-to-courses', function () {
    return to_route('courses.index');
});

Route::get('/tasks', function () {
    return view('tasks');
});

Route::post('/tasks', function () {
    return 'POST: task created';
});

Route::put('/tasks/{id}', function (string $id) {
    return "PUT: task {$id} replaced";
});

Route::patch('/tasks/{id}', function (string $id) {
    return "PATCH: task {$id} updated";
});

Route::delete('/tasks/{id}', function (string $id) {
    return "DELETE: task {$id} removed";
});
Route::get('/controller/students', [StudentController::class, 'index']);

Route::get('/controller/students/{id}', [StudentController::class, 'show']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return 'Admin dashboard';
    })->name('dashboard');

    Route::get('/students', function () {
        return 'Admin student list';
    })->name('students.index');
});
Route::middleware('throttle:5,1')->get('/limited', function () {
    return 'You reached a rate-limited route.';
});
Route::middleware(['admin'])->get('/dashboard', function () {
    return '<h1>Welcome to the Admin Dashboard!</h1>';
});
Route::middleware(['throttle:5,1', 'admin'])->group(function () {

    Route::get('/settings', function () {
        return 'Admin Settings';
    });

    Route::get('/users', function () {
        return 'Manage Users';
    });

});

Route::middleware(['throttle:5,1', 'business.hours'])->get('/flash-sale', function () {
    return '<h1>Flash Sale!</h1><p>Welcome! The flash sale is currently available.</p>';
});
Route::get('/posts', [PostController::class, 'index']);
Route::resource('posts', PostController::class);