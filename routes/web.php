<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\FeedbackController;

Route::get('/', function () {
    $posts = Post::all();
    $userposts = [];
    if (auth()->check()) {
        $userposts = auth()->user()->usersPersonalPosts()->latest()->get();
    }
    return view('home', ['posts' => $posts], ['userposts' => $userposts]);
});

//Authentication related routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

//Post related routes
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

//Navigation bar routes
Route::get('/my-posts', [PostController::class, 'myPosts']);
Route::get('/find-tutor', [PostController::class, 'allPosts']);
Route::get('/my-profile', [UserProfileController::class, 'showProfile']);
Route::get('/about-us', function () {return view('about-us');});
Route::get('/submit-feedback', function () {return view('submit-feedback');});
Route::get('/contact-us', function () {return view('contact-us');});


//Profile related routes
Route::get('/my-profile', [UserProfileController::class, 'showProfile']);
Route::put('/my-profile', [UserProfileController::class, 'updateProfile']);
Route::get('/user/{user}', [UserProfileController::class, 'viewUserProfile'])->name('user.profile');

//Search bar
Route::get('/search', [PostController::class, 'search']);

//Feedback
Route::post('/submit-feedback', [FeedbackController::class, 'submitFeedback'])->middleware('auth');
Route::get('/feedback', [FeedbackController::class, 'index'])->middleware('auth')->name('feedback.index');
// Route::get('/feedback/{feedback}/edit', [FeedbackController::class, 'edit'])->name('feedback.edit');
// Route::put('/feedback/{feedback}', [FeedbackController::class, 'update'])->name('feedback.update');
// Route::delete('/feedback/{feedback}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');
