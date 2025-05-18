<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Recruitment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::where('status','Aktif')->count();
        $pelamar = Recruitment::where('status','Pending')->count();
        return view('dashboard', compact('karyawan', 'pelamar'));
    }
}
