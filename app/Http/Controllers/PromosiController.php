<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Promosi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PromosiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role == 'admin' || Auth::user()->role == 'manajer'){
            $data = User::join('promosis','promosis.user_id','=', 'users.id')->get();

        }
        else if(Auth::user()->role == 'karyawan'){
            $userId = Auth::id();

            $data = Promosi::where('user_id', $userId)->with('user')->get();
        }
        return view('promosi.dashboard', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = User::join('karyawans','karyawans.user_id','=', 'users.id')->get();
        return view('promosi.tambah', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ext = $request->surat_rekomendasi->getClientOriginalExtension();
        $file = "surat-".time().".".$ext;
        $request->surat_rekomendasi->storeAs('public/dokument', $file);

        $data =new Promosi();
        $data->user_id = $request->user_id;
        $data->tgl_promosi = $request->tgl_promosi;
        $data->jabatan_lama = $request->jabatan_lama;
        $data->jabatan_baru = $request->jabatan_baru;
        $data->surat_rekomendasi = $file;

        $karyawan = Karyawan::where('user_id', $request->user_id)->first();

        $karyawan->jabatan = $request->jabatan_baru;
        $karyawan->save();

        $data->save();
        return redirect('/promosi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promosi $promosi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Promosi::find($id);
        return view('promosi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Promosi::find($id);

        $ext = $request->surat_rekomendasi->getClientOriginalExtension();
        $file = "surat-".time().".".$ext;
        $request->surat_rekomendasi->storeAs('public/dokument', $file);

        if ($request->hasFile('surat')) {
            $file = $request->file('surat');

            // If an existing file is present, delete it before uploading the new one
            if ($data->surat_rekomendasi !== null) {
                Storage::delete('public/dokument/' . $data->surat_rekomendasi);
            }

            $ext = $file->getClientOriginalExtension();
            $file_name = "Surat-" . time() . "." . $ext;
            
            // Store the new file using the Storage facade
            $file->storeAs('public/dokument', $file_name);
            
            $data->surat_rekomendasi = $file_name;
        } else {
            // No new file uploaded, retain the existing file or use the old file name
            $data->surat_rekomendasi = $request->old_file;
        }

        
        $data->tgl_promosi = $request->tgl_promosi;
        $data->jabatan_lama = $request->jabatan_lama;
        $data->jabatan_baru = $request->jabatan_baru;
        $data->surat_rekomendasi = $file;
        $data->save();

        return redirect('/promosi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promosi $promosi)
    {
        //
    }
}
