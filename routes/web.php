<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CutiIzinController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KaryawanloginController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PenugasanController;
use App\Http\Controllers\PhkController;
use App\Http\Controllers\PromosiController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\RewardandPunishmentController;
use App\Models\Recruitment;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('homepage');
});
Route::get('/login', function () {
    return view('Auth/Login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


Route::middleware(['auth','checkRole:pelamar'])->group(function()
{
    
        // Route::get('/dashboard', function () {
        //     return view('pengajuankerja.dashboard');
        // })->name('pelamar.index');;
    
    Route::resource('pengajuan', PelamarController::class);
    
});


    // if (Route::middleware(['auth','checkRole:karyawan'])) {
    //     Route::get('/', function () {
    //         return view('dashboard');
    //     });
    // }

    Route::get('/dashboard-karyawan', function () {
        return view('karyawan.dashboard');
    });


    Route::resource('karyawan', KaryawanController::class);
    // Route::get('/tambah-karyawan', function () {
    //     return view('karyawan.tambah');
    // });
      Route::get('/tambah-karyawan', [KaryawanController::class, 'create']);

    Route::put('/karyawan/{id}/status', [KaryawanController::class, 'status'])->name('karyawan.status');

    Route::resource('absensi', AbsensiController::class);
    Route::get('absensi-filter', [AbsensiController::class, 'filter'])->name('absensi.filter');

    Route::resource('phk', PhkController::class);
    Route::get('/tambah-phk', [PhkController::class, 'create']);


    Route::resource('cutiizin', CutiIzinController::class);
    Route::get('/tambah-cutiizin', function () {
        return view('cutiizin.tambah');
    });
    Route::put('/cutiizin/{id}/status', [CutiIzinController::class, 'status'])->name('cutiizin.status');

    Route::resource('reward-punishment', RewardandPunishmentController::class);
    Route::get('/tambah-RewardandPunishment', [RewardandPunishmentController::class, 'create']);

    Route::resource('penugasan', PenugasanController::class);
    // Route::get('/tambah-penugasan', function () {
    //     return view('penugasan.tambah');
    // });
    Route::get('/tambah-penugasan', [PenugasanController::class, 'create']);
    
    Route::resource('promosi', PromosiController::class);
    Route::get('/tambah-promosi', [PromosiController::class, 'create']);


    Route::put('/cutiizin/{id}/status', [CutiIzinController::class, 'status'])->name('cutiizin.status');
    

    Route::get('/login', function () {
        return view('login');
    });

Route::get('/regist-calonkaryawan', function () {
    return view('recruitment.regist');
});
// Route::post('/register', [RecruitmentController::class, 'regist'])->name('register.regist');

Route::resource('recruitment', RecruitmentController::class);



// Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('karyawan.admin');
    
// Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('karyawan.dashboard');
Route::resource('karyawan', KaryawanController::class);
Route::resource('karyawanlogin', KaryawanloginController::class);
Route::resource('admin', AdminController::class);
Route::middleware(['auth'])->group(function () {
    // Route untuk pelamar
Route::middleware(['auth','checkRole:pelamar'])->group(function () {
    Route::get('/dashboard', function () {
        // if (Auth::user()->role === 'pelamar') {
            return redirect()->route('pengajuan.index');
        // }
        // return redirect()->route('karyawan.dashboard');
    })->name('pelamar.dashboard');
});
Route::middleware(['auth','checkRole:karyawan'])->group(function () {
    // Route untuk karyawan
    Route::get('/dashboard', function () {
        // if (Auth::user()->role === 'karyawan') {
            return redirect()->route('karyawanlogin.index');
        // }
        // return redirect()->route('karyawan.index');
    })->name('karyawan.dashboard');
});

Route::middleware(['auth','checkRole:admin'])->group(function () {
    // Route untuk admin
    // Route::get('/dashboard', function () {
        // if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.index');
        // }
        // return redirect()->route('admin.index');
    })->name('admin.dashboard');
});


require __DIR__.'/auth.php';