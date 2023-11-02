<?php

namespace App\Http\Controllers;

use App\Models\fotoLapangan;
use App\Models\Lapangan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fotolapangan = fotoLapangan::latest()->paginate(10);
        return view('lapangan.index', compact('fotolapangan'), ['title' => 'Lapangan |']);
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
        $lap = Lapangan::findorfail($id);
        return view('booking.index', compact('lap'), ['title' => 'Booking |']);
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
