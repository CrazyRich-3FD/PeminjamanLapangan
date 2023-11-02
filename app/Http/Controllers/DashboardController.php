<?php

namespace App\Http\Controllers;

use App\Models\jenisLapangan;
use App\Models\Lapangan;
use App\Models\Peminjaman;
use App\Models\ulasan;
use App\Models\User;
use App\Models\waktuPeminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::count();
        $pinjam = Peminjaman::count();
        $lapangan = Lapangan::all();
        $jenis = jenisLapangan::all();

        $pinjams = waktuPeminjaman::select([
            DB::raw("count(*) as pinjams"),
            DB::raw("MONTHNAME(tgl_awal) as bulan")
            // DB::raw("DATE(tgl_awal) as tanggal")
        ])
        ->groupBy('bulan')
        // ->whereRaw("DATE(tgl_awal) >= ?", [date('Y-m-d', strtotime('-30 days'))])
        ->orderBy('bulan', 'desc')
        ->pluck('pinjams');

        $date = waktuPeminjaman::select([
            DB::raw("MONTHNAME(tgl_awal) as bulan")
            // DB::raw("DATE(tgl_awal) as tanggal")
        ])
        ->groupBy('bulan')
        // ->whereRaw("DATE(tgl_awal) >= ?", [date('Y-m-d', strtotime('-30 days'))])
        ->orderBy('bulan', 'desc')
        ->pluck('bulan');

        $label = json_encode($date);
        $data = json_encode($pinjams);

        $peminjaman = waktuPeminjaman::join('peminjaman', 'peminjaman.idpinjam', 'waktu_peminjaman.peminjaman_id')
            ->join('lapangan', 'lapangan.idlapangan', '=', 'peminjaman.lapangan_id')
            ->select([
                DB::raw("count('lapangan_id') as value"),
                DB::raw("lapangan.nama as name"),
                // DB::raw("DATE(waktu_peminjaman.tgl_awal) as tanggal")
            ])
            ->groupBy('lapangan_id')
            ->whereRaw("DATE(waktu_peminjaman.tgl_awal) >= ?", [date('Y-m-d', strtotime('-30 days'))])
            // ->groupBy('tanggal')
            ->get()
            ->toArray();
        $datas = json_encode($peminjaman);

        // dd($label);
        return view('admin.home', compact('user','pinjam','jenis', 'data', 'label','datas'), ['title' => 'Home |']);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $u = User::findorfail($id);
        return view('admin.myprofile', compact('u'),['title' => 'My Profile |']);
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
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'foto' ,
        ]);
        
        $input = $request->only('name', 'username', 'email', 'no_hp', 'alamat', 'foto');

        if ($request->file('foto')) {
            if ($request->oldfoto) {
                Storage::delete($request->oldfoto);
            }
            $input['foto'] = $request->file('foto')->store('usr');
        }
        $u = User::findorfail($id);
        $u->update($input);

        return redirect()->route('Admin.show')
        ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
