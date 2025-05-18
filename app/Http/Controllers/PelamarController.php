<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelamarController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'admin' || Auth::user()->role == 'manajer'){
            $data = Recruitment::all();
        }
        else if(Auth::user()->role == 'pelamar'){
            $userId = Auth::id();

            $data = Recruitment::where('user_id', $userId)->with('users')->get();
        }
        return view('pengajuankerja.dashboard', compact('data'));
    }
    public function store(Request $request)
    {

        $ext = $request->berkas->getClientOriginalExtension();
        $file = "berkas-".auth()->user()->name.time().".".$ext;
        $request->berkas->storeAs('public/dokument', $file);

        $data = new Recruitment();
        $data->user_id = auth()->user()->id;
        $data->status = 'Pending';
        $data->berkas = $file;
        $data->save();

        return redirect()->route('pengajuan.index')->with('success', 'Data berhasil ditambahkan');
    }
}
