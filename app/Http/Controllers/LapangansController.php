<?php

namespace App\Http\Controllers;

use App\Models\fotoLapangan;
use App\Models\jenisLapangan;
use App\Models\Lapangan;
use App\Models\Peminjaman;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LapangansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fotolapangan = fotoLapangan::latest()->paginate(10);
        return view('lapangan.lapangan', compact('fotolapangan'), ['title' => 'Lapangan |']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rid = random_int(100, 999);
        $jenis = jenisLapangan::all();
        return view('lapangan.create', compact('jenis', 'rid'), ['title' => 'Create Lapangan |']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idfoto' => 'required',
            'foto' => 'required|mimes:png,jpg|image',
            'keterangan' => 'required',
            'lapangan_id'=> 'required',
            'idlapangan' => 'required',
            'nama' => 'required',
            'jenis_id' => 'required',
        ]);
        $foto = $request->only('idfoto', 'keterangan', 'lapangan_id');

        if ($request->file('foto')) {
            $foto['foto'] = $request->file('foto')->store('lap');
        }
        try {
            fotoLapangan::create($foto);
            Lapangan::create($request->only('idlapangan','nama', 'jenis_id'));
            return redirect()->route('Lapangans.index') ->with('toast_success', 'Lapangan created successfully.');
        } catch (\Exception $e){
            return redirect()->back()
                ->with('toast_error', 'Error during the lapangan created!');
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
    public function edit($id)
    {
        $l = fotoLapangan::findorfail($id);
        $jenis = jenisLapangan::all();
        
        return view('lapangan.edit', compact('jenis', 'l'), ['title' => 'Edit Lapangan |']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'foto' => 'required|mimes:png,jpg|image',
            'keterangan' => 'required',
            'lapangan_id' => 'required',
            'idlapangan' => 'required',
            'nama' => 'required',
            'jenis_id' => 'required',
        ]);
        $input = $request->only('foto', 'keterangan', 'lapangan_id');
        if ($request->file('foto')) {
            if ($request->oldfoto) {
                Storage::delete($request->oldfoto);
            }
            $input['foto'] = $request->file('foto')->store('lap');
        }
        $f = fotoLapangan::findorfail($id);
        $l= $f->lapangan_id;
        $lap = Lapangan::findorfail($l);
        try {
            $f->update($input);
            $lap->update($request->only('idlapangan', 'nama', 'jenis_id'));
            return redirect()->route('Lapangans.index') ->with('toast_success', 'Lapangan updated successfully.');
        } catch (\Exception $e){
            return redirect()->back()
                ->with('toast_error', 'Error during the lapangan updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fl = fotoLapangan::findorfail($id);
        if ($fl->foto) {
            Storage::delete($fl->foto);
        };
        $lap = $fl->lapangan_id;
        $l = Lapangan::findorfail($lap);
        $fl->delete();
        $l->delete();
        return redirect()->route('Lapangans.index')
        ->with('info', 'Lapangan deleted successfully');
    }
}
