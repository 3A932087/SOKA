<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FractionController;
use App\Http\Controllers\TeamCallController;
use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\AdminTeamController;
use App\Http\Controllers\AdminLinkController;
use App\Http\Controllers\AdminFractionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if(Auth::user()->type=='0'){
            //admin
            return redirect()->route('admin.index');
        }else{
            //user
            return redirect()->route('index');
        }

    })->name('dashboard');
});

//首頁
Route::get('/', [HomeController::class, 'index'])->name('index');

//積分版
Route::prefix('fraction')->name('fraction.')->group(function () {
    Route::get('/', [FractionController::class, 'index'])->name('index');//顯示積分版
    Route::get('/{team}/edit', [FractionController::class, 'edit'])->middleware('auth')->name('edit');//顯示分數編輯頁面(活動部&admin)
    Route::patch('/{team}', [FractionController::class, 'update'])->name('update');//更新分數
});

//隊呼
Route::prefix('teamcall')->name('teamcall.')->group(function () {
    Route::get('/', [TeamCallController::class, 'index'])->name('index');//查看小隊
    Route::get('/{team}', [TeamCallController::class, 'show'])->name('show');//查看某一小隊呼
    Route::get('/{team}/edit', [TeamCallController::class, 'edit'])->middleware('auth')->name('edit');//顯示編輯畫面(熱力部)
    Route::patch('/{team}', [TeamCallController::class, 'update'])->name('update');//更新小隊呼
});

//後台
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'admin'])->name('index');//後臺首頁

    //帳號管理
    Route::prefix('account')->name('account.')->group(function () {
        Route::get('/', [AdminAccountController::class, 'index'])->name('index');//帳號列表
        Route::post('/store', [AdminAccountController::class, 'store'])->name('store');//儲存帳號
        Route::patch('/{user}/update', [AdminAccountController::class, 'update'])->name('update');//更新帳號
        Route::delete('/{user}',[AdminAccountController::class, 'destroy'])->name('destroy');//刪除帳號
    });

    //小隊管理
    Route::prefix('team')->name('team.')->group(function () {
        Route::get('/', [AdminTeamController::class, 'index'])->name('index');//小隊列表
        Route::get('/{team}', [AdminTeamController::class, 'show'])->name('show');//查看某一小隊
        Route::get('/create', [AdminTeamController::class, 'create'])->name('create');//新增畫面
        Route::post('/store', [AdminTeamController::class, 'store'])->name('store');//儲存小隊資料
        Route::get('/{team}/edit', [AdminTeamController::class, 'edit'])->name('edit');//編輯畫面
        Route::patch('/{team}', [AdminTeamController::class, 'update'])->name('update');//更新小隊資料
        Route::delete('/{team}', [AdminTeamController::class, 'destroy'])->name('destroy');//刪除小隊
    });

    //連結管理
    Route::prefix('link')->name('link.')->group(function () {
        Route::get('/', [AdminLinkController::class, 'index'])->name('index');//連結列表
        Route::get('/create', [AdminLinkController::class, 'create'])->name('create');//新增畫面
        Route::post('/store', [AdminLinkController::class, 'store'])->name('store');//儲存連結資料
        Route::get('/{link}/edit', [AdminLinkController::class, 'edit'])->name('edit');//編輯畫面
        Route::patch('/{link}', [AdminLinkController::class, 'update'])->name('update');//更新連結資料
        Route::delete('/{link}', [AdminLinkController::class, 'destroy'])->name('destroy');//刪除連結
    });

    //分數管理
    Route::prefix('fraction')->name('fraction.')->group(function () {
        Route::get('/', [AdminFractionController::class, 'index'])->name('index');//總分列表
        Route::get('/{fraction}', [AdminFractionController::class, 'show'])->name('show');//查看某一小隊分數紀錄
        Route::delete('/{fraction}', [AdminFractionController::class, 'destroy'])->name('destroy');//重置分數紀錄

    });
});



Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/test', [TestController::class,'index'])->name('text');




