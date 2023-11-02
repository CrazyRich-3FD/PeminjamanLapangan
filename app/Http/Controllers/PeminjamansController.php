<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use App\Models\User;
use App\Models\waktuPeminjaman;
use App\Notifications\PemberitahuanNotification;
use App\Notifications\PeminjamanNotification;
use FontLib\Table\Type\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class PeminjamansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Carbon::now()->format('Y/m/d'));
        $waktupinjaman = waktuPeminjaman::latest()->paginate(10);
        return view('booking.booking', compact('waktupinjaman'), ['title' => 'Booking |']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $w = waktuPeminjaman::all();
        $lap = Lapangan::all();
        $us = User::all();
        $rid = random_int(100000, 999999);
        return view('booking.create', compact('lap', 'us', 'rid', 'w'), ['title' => 'Create Booking |']);
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
            'ulasan',
            'rating',
        ]);
        DB::beginTransaction();
        try {
            $waktu = waktuPeminjaman::create($request->only('idwaktu', 'tgl_awal', 'tgl_akhir', 'jam_awal', 'jam_akhir', 'peminjaman_id'));
            $peminjaman = Peminjaman::create($request->only('idpinjam', 'status', 'user_id', 'lapangan_id', 'ulasan_id'));
            $ulasan = Ulasan::create($request->only('idulasan', 'ulasan', 'rating'));
            $user = User::where('role', 'admin')->get();
            FacadesNotification::send($user, new PeminjamanNotification($waktu, $peminjaman, $ulasan));
            DB::commit();
            return redirect()->route('Bookings.index')
                ->with('toast_success', 'Booking created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('toast_error', 'Error during the booking created! <br> Maybe the date and time have already been ordered!');
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
        auth()->user()->unreadNotifications->where('id', request('id'))->first()?->markAsRead();
        $w = waktuPeminjaman::findorfail($id);
        $lap = Lapangan::all();
        $us = User::all();
        return view('booking.edit', compact('lap', 'us', 'w'), ['title' => 'Edit Booking |']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
            'ulasan',
            'rating',
        ]);

        $w = waktuPeminjaman::findorfail($id);
        $p = $w->peminjaman_id;
        $pin = Peminjaman::findorfail($p);
        $u = $w->pin->ulasan_id;
        $ul = Ulasan::findorfail($u);

        DB::beginTransaction();
        try {
            $waktu_peminjaman = [
                $w->update($request->only('idwaktu','tgl_awal', 'tgl_akhir', 'jam_awal', 'jam_akhir', 'peminjaman_id')),
                $pin->update($request->only('idpinjam', 'status', 'user_id', 'lapangan_id')),
                $ul->update($request->only('idulasan', 'ulasan', 'rating')),
            ];

            $waktu_peminjaman;
            $delay = now()->addMinutes(1);
            $user = User::where('iduser', $w->pin->user_id)->get();
            FacadesNotification::send($user, new PemberitahuanNotification($w, $pin, $ul));
            DB::commit();
            return redirect()->route('Bookings.index')
            ->with('toast_success', 'Booking updated successfully.');
        } catch (\Exception $e){
            return redirect()->back()
                ->with('toast_error', 'Error during the booking updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $w = waktuPeminjaman::findorfail($id);
        $pin = $w->peminjaman_id;
        $p = Peminjaman::findorfail($pin);
        $ulas = $p->ulasan_id;
        $ul = Ulasan::findorfail($ulas);

        $w->delete();
        $p->delete();
        $ul->delete();
        return redirect()->route('Bookings.index')
            ->with('info', 'Booking deleted successfully');
    }
}
