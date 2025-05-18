<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $karyawan = Karyawan::all();
        $karyawan = User::join('karyawans', 'karyawans.user_id', '=', 'users.id')
        ->get();
        return view('karyawan.dashboard', compact('karyawan'));
    }
    public function dashboard()
    {
        $karyawan = Karyawan::all();
        dd($karyawan);
        return view('dashboard', compact('karyawan'));
    }
    // public function admin()
    // {
    //     return view('dashboard');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data = User::join('phks','phks.user_id','=', 'users.id')->get();

        $data = User::join('recruitments', 'recruitments.user_id', '=', 'users.id')
        ->where('role', 'pelamar')
        ->where('status', 'Diterima')
        ->get();
        // $data = User::all();
        return view('karyawan.tambah', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $karyawan = new Karyawan;
        $karyawan->nik = $request->nik;
        $karyawan->tgl_masuk = $request->tgl_masuk;
        $karyawan->pendidikan_terakhir = $request->pendidikan_terakhir;
        $karyawan->agama = $request->agama;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->jenis_kelamin = $request->jenis_kelamin;
        $karyawan->status = "Aktif";
        $karyawan->user_id = $request->user_id;

        $userId = $request->input('user_id');
        $user = User::find($userId);
        $user->update(['role' => 'karyawan']);



        $karyawan->save();
        return redirect('/karyawan')->with('status', 'Berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    public function status($id, Request $request)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->status = $request->status;
        $karyawan->save();
        return redirect('/karyawan')->with('status', 'Berhasil diubah!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->nik = $request->nik;
        $karyawan->tgl_masuk = $request->tgl_masuk;
        $karyawan->pendidikan_terakhir = $request->pendidikan_terakhir;
        $karyawan->agama = $request->agama;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->jenis_kelamin = $request->jenis_kelamin;
        $karyawan->status = $request->status;

        $karyawan->save();

        $user = User::find($karyawan->user_id);
        $user->name = $request->nama;
        $user->alamat = $request->alamat;
        $user->username = $request->username;
        $user->telepon = $request->telepon;
        if ($request->password != null) {
            $user->password = $request->password;
        }
        $user->save();

        return redirect('/karyawan')->with('status', 'Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        //
    }
}
