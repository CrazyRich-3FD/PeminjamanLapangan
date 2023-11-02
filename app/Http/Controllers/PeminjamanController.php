<?php

namespace App\Http\Controllers;

use App\Models\fotoLapangan;
use App\Models\jenisLapangan;
use App\Models\Lapangan;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use App\Models\User;
use App\Models\waktuPeminjaman;
use App\Notifications\PeminjamanNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $lf = [];
        if ($request->id) {
            $lf = fotoLapangan::findorfail($request->id);
        }
        $rid = random_int(100000, 999999);
        $lap = Lapangan::all();
        return view('booking.indexs', compact('lf', 'lap', 'rid'), ['title' => 'Booking |']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idwaktu' => 'required',
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'jam_awal' => 'required',
            'jam_akhir' => 'required',
            'peminjaman_id' => 'required',
            'idpinjam' => 'required',
            'status' => 'required',
            'user_id' => 'required',
            'lapangan_id' => 'required',
            'ulasan_id' => 'required',
            'idulasan' => 'required',
        ]);

        

        DB::beginTransaction();
        try {
            $waktu = waktuPeminjaman::create($request->only('idwaktu', 'tgl_awal', 'tgl_akhir', 'jam_awal', 'jam_akhir', 'peminjaman_id'));
            $peminjaman = Peminjaman::create($request->only('idpinjam', 'status', 'user_id', 'lapangan_id', 'ulasan_id'));
            $ulasan = Ulasan::create($request->only('idulasan'));
            $userAdmin = User::where('role', 'admin')->get();
            FacadesNotification::send($userAdmin, new PeminjamanNotification($waktu,$peminjaman,$ulasan));
            DB::commit();
            return redirect()->route('home.index')
            ->with('success', 'Booking Berhasil');
        } catch (\Exception $e){
            return redirect()->back()
                ->with('toast_error', 'Error during the booking created!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
