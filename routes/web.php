<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\HandleInertiaRequests;
use App\Http\Middleware\NoCacheHeaders;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

  // 회원가입 화면
  Route::get('register', [RegisterController::class, 'index'])->name('register');

  // 회원가입 요청
  Route::post('register', [RegisterController::class, 'store'])->name('register.store');

  // 로그인
  Route::post('/auth/login', [AuthController::class, 'store']);

  // 로그인 화면
  Route::get('login', [AuthController::class, 'index'])->name('login');

  //로그아웃
  Route::post('/auth/logout', [AuthController::class, 'destroy']);


Route::middleware(['auth'])->group(function (){

    // 게시판 화면
    Route::get('/posts', [PostController::class, 'index'])->name('post');

    // 게시글 작성 화면
    Route::get('/create',[PostController::class, 'create'])->name('create');

    // 게시글 작성
    Route::post('/store', [PostController::class, 'store'])->name('posts.store');

    //게시글 조회
    Route::get('/show/{id}',[PostController::class, 'show'])->name('posts.show');

    //게시글 수정 화면
    Route::get('/edit/{id}',[PostController::class, 'edit'])->name('posts.edit');

    //게시글 수정
    Route::put('/posts/{id}',[PostController::class, 'update'])->name('posts.update');

    //게시글 삭제
    Route::delete('/posts/{id}',[PostController::class,'destory'])->name('posts.destroy');

});




