<?php

namespace App\Http\Controllers;

use App\Models\surat1;
use App\Http\Requests\Storesurat1Request;
use App\Http\Requests\Updatesurat1Request;
use App\Models\ibadah;
use Illuminate\Http\Request;

class Surat1Controller extends Controller
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
    public function create(Request $request, ibadah $ibadah)
    {
        $validated = $request->validate([
            'no1' => 'required',
            // 'no2' => 'required',
            // 'no3' => 'required',
            // 'no4' => 'required',
            // 'no5' => 'required',
            // 'no6' => 'required',
            'pketua' => 'required',
            'pother' => 'required',
            'date' => 'required',
            
        ]);
        $validated["ibadah_id"] = $ibadah->id;
        surat1::create($validated);
        $ibadah->update(['status' => 'validasi']);
session()->flash('success', 'DATA surat BERHASIL DI TAMBAHKAN');
return to_route('ibadah.index');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storesurat1Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(surat1 $surat1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ibadah $ibadah, surat1 $surat1)
    {
        $surat = $ibadah->surat1;
        return view('ibadah.suratrev',compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, surat1 $surat)
    {
        
        $validated = $request->validate([
            'no1' => 'required',
            // 'no2' => 'required',
            // 'no3' => 'required',
            // 'no4' => 'required',
            // 'no5' => 'required',
            // 'no6' => 'required',
            'pketua' => 'required',
            'pother' => 'required',
            'date' => 'required',
            
        ]);

        $surat->update($validated);
    

        session()->flash('success', 'Your data surat has been updated');
        return to_route('ibadah.index'); 

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(surat1 $surat1)
    {
        //
    }
}
