<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\Peminjaman;
use App\Models\ulasan;
use App\Models\User;
use App\Models\waktuPeminjaman;
use App\Notifications\PemberitahuanNotification;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class LayoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ulasan = Peminjaman::latest()->paginate(10);
        return view('layouts.home', compact('ulasan'), ['title' => 'Home |']);
    }

    public function riwayat()
    {
        auth()->user()->notifications->markAsRead();
        $booking = waktuPeminjaman::all();
        $ulasan = ulasan::all();
        return view('booking.riwayat', compact('booking','ulasan'), ['title' => 'Riwayat Booking |']);
    }

    public function invoice(string $id)
    {
        $w = waktuPeminjaman::findorfail($id);
        return view('booking.invoice', compact('w'), ['title' => 'Invoice Booking |']);
    }

    public function cetak(string $id)
    {
        $w = waktuPeminjaman::findorfail($id);
        $pdf = PDF::loadview('booking.cetak', ['w' => $w])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function ulasan(Request $request, string $id)
    {
        $request->validate([
            'idulasan' => 'required',
            'ulasan' => 'required',
            'rating' => 'required',
        ]);

        $u = ulasan::findorfail($id);

        try {
            $u->update($request->all());
            return redirect()->route('home.riwayat')
                ->with('toast_success', 'Terima Kasih Atas Ulasannya.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('toast_error', 'Error during the ulasan updated!');
        }
    }

    public function user(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'foto' ,
            // 'password' => 'required',
        ]);
        $input = $request->only('iduser', 'name', 'username', 'email', 'no_hp', 'alamat', 'foto');

        if ($request->file('foto')) {
            if ($request->oldfoto) {
                Storage::delete($request->oldfoto);
            }
            $input['foto'] = $request->file('foto')->store('usr');
        }
        $u = User::findorfail($id);
        try {
            $u->update($input);
            return redirect()->back()
            ->with('toast_success', 'User updated successfully.');
        } catch (\Exception $e){
            return redirect()->back()
                ->with('toast_error', 'Error during the user updated!');
        }
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
        $user = User::findorfail($id);
        return view('layouts.profile', compact('user'), ['title' => 'Profile |']);

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
