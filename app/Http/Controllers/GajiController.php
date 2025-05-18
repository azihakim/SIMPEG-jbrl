<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Karyawan;
use App\Models\RewardandPunishment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gaji = Gaji::with('user.karyawan')->get();
        if (auth()->user()->role == 'karyawan') {
            $gaji = $gaji->where('user_id', auth()->user()->id);
        }
        $gaji->transform(function ($item) {
            $item->tgl_gajian = Carbon::parse($item->tgl_gajian)->translatedFormat('d F Y');
            return $item;
        });
        return view('dataGaji.dashboard', compact('gaji'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::with('karyawan')->where('role', 'karyawan')->get();
        return view('dataGaji.tambah', compact('users'));
    }

    public function checkRp(Request $request)
    {
        $idKaryawan = $request->karyawan_id;

        // Ambil nama bulan dan tahun sekarang
        // Set locale ke bahasa Indonesia agar nama bulan sesuai (misal: Januari, Februari, dst)
        Carbon::setLocale('id');
        $bulanSekarang = Carbon::now()->translatedFormat('F');
        $tahunSekarang = Carbon::now()->year;

        // Ambil data user (optional jika hanya ingin data RP)
        $user = User::with('karyawan')->where('role', 'karyawan')->where('id', $idKaryawan)->first();
        $gaji_pokok = $user->karyawan->gaji_pokok;
        // Cek apakah ada Reward atau Punishment untuk bulan dan tahun ini
        $rewardPunishment = RewardandPunishment::where('user_id', $idKaryawan)
            ->where('bulan', $bulanSekarang)
            ->where('tahun', $tahunSekarang)
            ->get();

        if ($rewardPunishment->isNotEmpty()) {
            // Hitung total potongan dan bonus (pastikan dikonversi ke angka)
            $totalPotongan = $rewardPunishment->sum(function ($item) {
                return (int) $item->potongan_gaji;
            });

            $totalBonus = $rewardPunishment->sum(function ($item) {
                return (int) $item->bonus;
            });

            return response()->json([
                'status' => 'ada',
                'total_potongan' => $totalPotongan,
                'total_bonus' => $totalBonus,
                'gaji_pokok' => $gaji_pokok,
                'data' => $rewardPunishment
            ]);
        } else {
            return response()->json([
                'status' => 'tidak_ada',
                'message' => 'Tidak ada reward atau punishment bulan ini'
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan' => 'required|exists:users,id',
        ]);

        Carbon::setLocale('id');
        $bulanSekarang = Carbon::now()->translatedFormat('F');
        $tahunSekarang = Carbon::now()->year;

        $user = User::with('karyawan')->where('role', 'karyawan')->where('id', $request->karyawan)->first();
        if (!$user || !$user->karyawan) {
            return back()->withErrors(['karyawan' => 'Data karyawan tidak ditemukan.']);
        }

        $gaji_pokok = $user->karyawan->gaji_pokok;

        $rewardPunishment = RewardandPunishment::where('user_id', $request->karyawan)
            ->where('bulan', $bulanSekarang)
            ->where('tahun', $tahunSekarang)
            ->get();

        $totalPotongan = $rewardPunishment->sum(function ($item) {
            return (int) $item->potongan_gaji;
        });

        $totalBonus = $rewardPunishment->sum(function ($item) {
            return (int) $item->bonus;
        });

        $total_gaji = $gaji_pokok - $totalPotongan + $totalBonus;

        $gaji = new Gaji();
        $gaji->user_id = $request->karyawan;
        $gaji->tgl_gajian = Carbon::now()->toDateString(); // format: Y-m-d
        $gaji->gaji_pokok = $gaji_pokok;
        $gaji->potongan = $totalPotongan;
        $gaji->bonus = $totalBonus;
        $gaji->total_gaji = $total_gaji;

        $existingGaji = Gaji::where('user_id', $request->karyawan)
            ->whereMonth('tgl_gajian', Carbon::now()->month)
            ->whereYear('tgl_gajian', Carbon::now()->year)
            ->first();

        if ($existingGaji) {
            return back()->with('error', 'Karyawan sudah menerima gaji bulan ini.');
        }

        $gaji->save();

        return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gaji $gaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gaji $gaji)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gaji $gaji)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gaji $gaji)
    {
        $gaji->delete();
        return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil dihapus.');
    }

    public function cetakSlip($id)
    {
        $gaji = Gaji::with('user')->findOrFail($id);
        return view('dataGaji.cetak-slip', compact('gaji'));
    }
}
