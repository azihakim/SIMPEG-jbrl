<?php

namespace App\Http\Controllers;

use App\Models\RewardandPunishment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RewardandPunishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role == 'admin' || Auth::user()->role == 'manajer'){
            $data = User::join('rewardand_punishments','rewardand_punishments.user_id','=', 'users.id')->get();
            // $data = RewardandPunishment::join('users', 'users.id', '='. 'rewardandpunishments.user_id');
        }
        else if(Auth::user()->role == 'karyawan'){
            $userId = Auth::id();

            $data = RewardandPunishment::where('user_id', $userId)->with('user')->get();
        }
        return view('RewardandPunishment.dashboard', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = User::all();
        return view('RewardandPunishment.tambah', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new RewardandPunishment();
        $data->user_id = $request->user_id;
        $data->tahun = $request->tahun;
        $data->bulan = $request->bulan;
        $data->potongan_gaji = $request->potongan_gaji;
        $data->bonus = $request->bonus;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect('/reward-punishment')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(RewardandPunishment $rewardandPunishment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, RewardandPunishment $rewardandPunishment)
    {
        $data = RewardandPunishment::find($id);
        return view('RewardandPunishment.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $data = RewardandPunishment::find($id);
        $data->tahun = $request->tahun;
        $data->bulan = $request->bulan;
        $data->potongan_gaji = $request->potongan_gaji;
        $data->bonus = $request->bonus;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect("reward-punishment")->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RewardandPunishment $rewardandPunishment)
    {
        //
    }
}
