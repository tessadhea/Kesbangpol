<?php

namespace App\Http\Controllers;

use App\Models\ormas;
use App\Models\surat3;
use App\Http\Requests\Storesurat3Request;
use App\Http\Requests\Updatesurat3Request;
use Illuminate\Http\Request;

class Surat3Controller extends Controller
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
    public function create(Request $request, ormas $ormas)
    {
        
        $validated = $request->validate([
            'no1' => 'required',
            // 'no2' => 'required',
            // 'no3' => 'required',
            // 'no4' => 'required',
            // 'no5' => 'required',
            'tanggal' => 'required',
            'period' => 'required',
            'tanggal2' => 'required',
            'skt' => 'required',
            'date' => 'required',
            
        ]);
        $validated["ormas_id"] = $ormas->id;
        surat3::create($validated);
        $ormas->update(['status' => 'validasi']);
session()->flash('success', 'DATA surat BERHASIL DI TAMBAHKAN');
return to_route('ormas.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storesurat3Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(surat3 $surat3)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ormas $ormas,surat3 $surat)
    {
        $surat = $ormas->surat3;
        return view('ormas.suratrev',compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, surat3 $surat)
    {
        $validated = $request->validate([
            'no1' => 'required',
            // 'no2' => 'required',
            // 'no3' => 'required',
            // 'no4' => 'required',
            // 'no5' => 'required',
            'tanggal' => 'required',
            'period' => 'required',
            'tanggal2' => 'required',
            'skt' => 'required',
            'date' => 'required',

            
        ]);
        $surat->update($validated);
    

        session()->flash('success', 'Your data surat has been updated');
        return to_route('ormas.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(surat3 $surat3)
    {
        //
    }
}
