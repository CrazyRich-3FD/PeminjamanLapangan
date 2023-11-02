<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pin = peminjaman::latest()->paginate(10);
        return view('ulasan.index', compact('pin'), ['title' => 'Ulasan |']);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ul = Ulasan::findorfail($id);
        return view('ulasan.edit', compact('ul'), ['title' => 'Edit Ulasan |']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'idulasan' => 'required',
            'ulasan' => 'required',
            'rating' => 'required',
        ]);

        $u = Ulasan::findorfail($id);

        try {
            $u->update($request->all());
            return redirect()->route('Ulasan.index')
            ->with('toast_success', 'Ulasan updated successfully.');
        } catch (\Exception $e){
            return redirect()->back()
                ->with('toast_error', 'Error during the ulasan updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
