<?php

namespace App\Http\Controllers;

use App\Models\Penugasan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenugasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role == 'admin' || Auth::user()->role == 'manajer'){
            $data = User::join('penugasans','penugasans.user_id','=', 'users.id')->get();

        }
        else if(Auth::user()->role == 'karyawan'){
            $userId = Auth::id();

            $data = Penugasan::where('user_id', $userId)->with('user')->get();
        }
        return view('penugasan.dashboard', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = User::all();
        return view('penugasan.tambah', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Penugasan();
        $data->user_id = $request->user_id;
        $data->tempat_penugasan = $request->tempat_penugasan;
        $data->dari_tgl = $request->dari_tgl;
        $data->hingga_tgl = $request->hingga_tgl;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect('/penugasan')->with('status', 'Berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penugasan $penugasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Request $request)
    {
        $data = Penugasan::find($id);
        return view('penugasan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Penugasan::find($id);
        $data->tempat_penugasan = $request->tempat_penugasan;
        $data->dari_tgl = $request->dari_tgl;
        $data->hingga_tgl = $request->hingga_tgl;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect('/penugasan')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penugasan $penugasan)
    {
        //
    }
}
