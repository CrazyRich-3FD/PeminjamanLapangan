<?php

namespace App\Http\Controllers;

use App\Models\jenisLapangan;
use Illuminate\Http\Request;

class JenisLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = jenisLapangan::latest()->paginate(10);
        return view('jenisLapangan.index', compact('jenis'), ['title' => 'Jenis Lapangan |']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $rid = random_int(100, 999);
        return view('jenisLapangan.create', compact('rid'), ['title' => 'Create Jenis Lapangan |']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idjenis' => 'required',
            'jenis' => 'required',
        ]);

        try {
            jenisLapangan::create($request->all());
            return redirect()->route('Jenis.index')
        ->with('toast_success', 'Product created successfully.');
        } catch (\Exception $e){
            return redirect()->back()
                ->with('toast_error', 'Error during the Product created!');
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
        $j = jenisLapangan::findorfail($id);
        return view('jenisLapangan.edit',compact('j'), ['title' => 'Edit Jenis Lapangan |']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'jenis' => 'required',
        ]);
        $j = jenisLapangan::findorfail($id);
        try {
            $j->update($request->all());
            return redirect()->route('Jenis.index')
        ->with('toast_success', 'Product updated successfully.');
        } catch (\Exception $e){
            return redirect()->back()
                ->with('toast_error', 'Error during the Product updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $j = jenisLapangan::findorfail($id);
        $j->delete();

        return redirect()->route('Jenis.index')
        ->with('info', 'Product deleted successfully');
    }
}
