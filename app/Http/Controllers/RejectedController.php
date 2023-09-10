<?php

namespace App\Http\Controllers;

use App\Models\rejected;
use App\Http\Requests\StorerejectedRequest;
use App\Http\Requests\UpdaterejectedRequest;

class RejectedController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorerejectedRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(rejected $rejected)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rejected $rejected)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdaterejectedRequest $request, rejected $rejected)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rejected $rejected)
    {
        
                $rejected->delete();
                session()->flash('success', 'Your pesan penolakan  has been deleted');
                return back();
    }
}
