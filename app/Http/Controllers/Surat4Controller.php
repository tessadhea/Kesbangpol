<?php

namespace App\Http\Controllers;

use App\Models\surat4;
use Illuminate\Http\Request;
use App\Http\Requests\Storesurat4Request;
use App\Http\Requests\Updatesurat4Request;
use App\Models\keramaian;

class Surat4Controller extends Controller
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
    public function create(Request $request, keramaian $keramaian)
    {
        $validated = $request->validate([
            'no1' => 'required',
            // 'no2' => 'required',
            // 'no3' => 'required',
            // 'no4' => 'required',
            // 'no5' => 'required',
            // 'no6' => 'required',
            'membaca' => 'required',
            'tanggal' => 'required',
            'date' => 'required',
          
            
        ]);
        $validated["keramaian_id"] = $keramaian->id;
        surat4::create($validated);
        $keramaian->update(['status' => 'validasi']);
session()->flash('success', 'DATA surat BERHASIL DI TAMBAHKAN');
return to_route('keramaian.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storesurat4Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(surat4 $surat4)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(keramaian $keramaian ,surat4 $surat)
    {          $surat = $keramaian->surat4;
            return view('keramaian.suratrev', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, surat4 $surat)
    {
        $validated = $request->validate([
            'no1' => 'required',
            // 'no2' => 'required',
            // 'no3' => 'required',
            // 'no4' => 'required',
            // 'no5' => 'required',
            // 'no6' => 'required',
            'membaca' => 'required',
            'tanggal' => 'required',
            'date' => 'required',



        ]);
        $surat->update($validated);
    

        session()->flash('success', 'Your data surat has been updated');
        return to_route('keramaian.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(surat4 $surat4)
    {
        //
    }
}
