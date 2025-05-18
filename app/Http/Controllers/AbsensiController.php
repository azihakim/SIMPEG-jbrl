<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil waktu saat ini
        $now = Carbon::now();

        // Atur waktu mulai jam 8 pagi
        $start = Carbon::now()->setHour(8)->setMinute(0)->setSecond(0);

        // Atur waktu akhir jam 8.20 pagi
        $end = Carbon::now()->setHour(8)->setMinute(20)->setSecond(0);

        if(Auth::user()->role == 'admin' || Auth::user()->role == 'manajer'){
            $absensi = Absensi::all();
            $absensicek = Absensi::whereDate('created_at', $now->toDateString())
                                    ->latest()
                                    ->first();
            $cekmasuk = Absensi::whereDate('created_at', $now->toDateString())
                    ->where('jenis', 'Masuk')
                    ->latest()
                    ->first();

            $cekpulang = Absensi::whereDate('created_at', $now->toDateString())
                                ->where('jenis', 'Pulang')
                                ->latest()
                                ->first();
        }
        else if(Auth::user()->role == 'karyawan'){
            $userId = Auth::id();

            $absensi = Absensi::where('user_id', $userId)->with('user')->get();
            // Ambil data absensi terakhir pada hari yang sama
            $absensicek = Absensi::where('user_id', $userId)->with('user')
                                    ->whereDate('created_at', $now->toDateString())
                                    ->latest()
                                    ->first();
            $cekmasuk = Absensi::where('user_id', $userId)->with('user')
                    ->whereDate('created_at', $now->toDateString())
                    ->where('jenis', 'Masuk')
                    ->latest()
                    ->first();

            $cekpulang = Absensi::where('user_id', $userId)->with('user')
                                ->whereDate('created_at', $now->toDateString())
                                ->where('jenis', 'Pulang')
                                ->latest()
                                ->first();
        }

        

        // Jika ada data absensi terakhir pada hari yang sama
        if ($absensicek) {
            $latestAbsensiTime = Carbon::parse($absensicek->created_at);

            // Periksa apakah waktu absensi terakhir berada di antara rentang waktu yang ditentukan
            if ($latestAbsensiTime->between($start, $end)) {
                return view('absensi.dashboard', compact('absensi', 'latestAbsensiTime', 'cekmasuk', 'cekpulang'));
            }
        }

        $latestAbsensiTime = null;
        return view('absensi.dashboard', compact('absensi', 'latestAbsensiTime', 'cekmasuk', 'cekpulang'));


        
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
        $data = $request->all();

        // Dapatkan latitude dan longitude dari data lokasi
        $latitude = $data['latitude'];
        $longitude = $data['longitude'];

        // Lakukan validasi atau operasi lain yang dibutuhkan

        // Lanjutkan dengan penyimpanan data
        $ext = $request->foto->getClientOriginalExtension();
        $file = "foto-" . time() . "." . $ext;
        $request->foto->storeAs('public/dokument', $file);

        $absen = new Absensi();
        $absen->user_id = auth()->user()->id;
        $absen->lokasi = json_encode(['latitude' => $latitude, 'longitude' => $longitude]);
        $absen->jenis = $data['jenis'];
        $absen->foto = $file;
        $absen->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        //
    }

    public function filter(Request $request)
    {
        $dariTanggal = $request->input('dari_tgl');
        $hinggaTanggal = $request->input('hingga_tgl');

        // Validasi input jika diperlukan

        $absensiQuery = Absensi::query();

        if (!empty($dariTanggal) && !empty($hinggaTanggal)) {
            // Jika dari_tgl dan hingga_tgl diisi, pencarian dengan rentang tanggal
            $absensiQuery->whereBetween('created_at', [$dariTanggal, $hinggaTanggal]);
        } elseif (!empty($dariTanggal)) {
            // Jika hanya dari_tgl diisi, pencarian per hari
            $absensiQuery->whereDate('created_at', $dariTanggal);
        } else {
            // Tidak ada parameter yang diisi, lakukan sesuai kebutuhan Anda
        }

        $absensi = $absensiQuery->get();
                        
        return view('absensi.dashboard', compact('absensi'));
    }
}
