<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Phk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role == 'admin' || Auth::user()->role == 'manajer'){
            $data = User::join('phks','phks.user_id','=', 'users.id')->get();

        }
        else if(Auth::user()->role == 'karyawan'){
            $userId = Auth::id();

            $data = Phk::where('user_id', $userId)->with('user')->get();
        }
        return view('phk.dashboard', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = User::all();
        return view('phk.tambah', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create a new Phk instance
        $data = new Phk();
        
        // Handle file upload
        $ext = $request->surat->getClientOriginalExtension();
        $file = "surat-" . time() . "." . $ext;
        $request->surat->storeAs('public/dokument', $file);

        // Set Phk data
        $data->user_id = $request->user_id;
        $data->surat = $file;
        $data->alasan = $request->alasan;

        // Save Phk record
        

        // Update Karyawan status
        $karyawan = Karyawan::where('user_id',$request->user_id)->first();
        $karyawan->status = "Non-Aktif";
        $karyawan->save();
        $data->save();
        // Redirect with success message
        return redirect()->route('phk.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Phk $phk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Phk::find($id);
        return view('phk.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Phk::find($id);
        $data->alasan = $request->alasan;

        if ($request->hasFile('surat')) {
            $file = $request->file('surat');

            // If an existing file is present, delete it before uploading the new one
            if ($data->surat !== null) {
                Storage::delete('public/dokument/' . $data->surat);
            }

            $ext = $file->getClientOriginalExtension();
            $file_name = "Surat-" . time() . "." . $ext;
            
            // Store the new file using the Storage facade
            $file->storeAs('public/dokument', $file_name);
            
            $data->surat = $file_name;
        } else {
            // No new file uploaded, retain the existing file or use the old file name
            $data->surat = $request->old_file;
        }


        $data->save();

        return redirect('/phk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phk $phk)
    {
        //
    }
}
