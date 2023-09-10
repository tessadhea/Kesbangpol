<?php

namespace App\Http\Controllers;

use App\Models\surat2;
use App\Http\Requests\Storesurat2Request;
use App\Http\Requests\Updatesurat2Request;
use App\Models\penelitian;
use Illuminate\Http\Request;

class Surat2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, penelitian $penelitian)
    {
        $validated = $request->validate([
            'no1' => 'required',
            // 'no2' => 'required',
            // 'no3' => 'required',
            // 'no4' => 'required',
            // 'no5' => 'required',
            'sd' => 'required',
            'no' => 'required',
            'tanggal' => 'required',
            'hal' => 'required',
            'judul' => 'required',
            'date' => 'required',
            
        ]);
        $validated["penelitian_id"] = $penelitian->id;
        surat2::create($validated);
        $penelitian->update(['status' => 'validasi']);
session()->flash('success', 'DATA surat BERHASIL DI TAMBAHKAN');
return to_route('penelitian.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storesurat2Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(surat2 $surat2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penelitian $penelitian,surat2 $surat)
    {
        $surat = $penelitian->surat2;
        return view('penelitian.suratrev',compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, surat2 $surat,)
    {
        $validated = $request->validate([
            'no1' => 'required',
            // 'no2' => 'required',
            // 'no3' => 'required',
            // 'no4' => 'required',
            // 'no5' => 'required',
            'sd' => 'required',
            'no' => 'required',
            'tanggal' => 'required',
            'hal' => 'required',
            'judul' => 'required',
            'date' => 'required',

            
        ]);
        $surat->update($validated);
    

        session()->flash('success', 'Your data surat has been updated');
        return to_route('penelitian.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(surat2 $surat2)
    {
        //
    }
}
