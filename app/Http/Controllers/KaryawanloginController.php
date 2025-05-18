<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryawanloginController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $karyawan = Karyawan::where('user_id', $userId)->with('user')->first();
        return view('dashboard', compact('karyawan'));
    }
}
