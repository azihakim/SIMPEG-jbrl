<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role == 'admin' || Auth::user()->role == 'manajer'){
            $data = User::join('recruitments', 'recruitments.user_id', '=', 'users.id')
            ->get();
        }
        else if(Auth::user()->role == 'karyawan'){
            $userId = Auth::id();

            $data = Recruitment::where('user_id', $userId)->with('users')->get();
        }
        // dd($data);
        return view('recruitment.dashboard', compact('data'));
    }

    public function regist(Request $request)
    {
        $data = new User();
        $data->name = $request->name;
        $data->username = $request->username;
        $data->password = $request->password;
        $data->telepon = $request->telepon;
        $data->alamat = $request->alamat;
        $data->role = 'pelamar';
        dd($data);
        $data->save();

        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'username' => [
                'required',
                'string',
                Rule::unique(User::class, 'username'), // Ensure username is unique in the users table
            ],
            'password' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        // If the validation passes, create and save the user
        $data = new User();
        $data->name = $request->name;
        $data->username = $request->username;
        $data->password = $request->password;
        $data->telepon = $request->telepon;
        $data->alamat = $request->alamat;
        $data->role = 'pelamar';

        $data->save();
        return redirect('/')->with('success', 'Berhasil mendaftar!');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Recruitment $recruitment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recruitment $recruitment)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Recruitment::find($id);
        $data->status = $request->status;
        
        $data->save();
        return redirect()->back()->with('status', 'Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recruitment $recruitment)
    {
        //
    }
}
