<?php

namespace App\Http\Controllers;

use App\Models\opmerkingen;
use Illuminate\Http\Request;

class OpmerkingenController extends Controller
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
    public function store(Request $request)
    {
        $opmerking = new opmerkingen([
            'opmerking' => $request->opmerking,
            'lessen_id' => $request->lessen_id,
            'user_id' => $request->user_id
        ]);

        $opmerking->save();
        return redirect(url('/lessen/' . $request->lessen_id));
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
        $opmerking = opmerkingen::find($id);
        $les_id = $opmerking->lessen_id;
        $opmerking->delete();
        return redirect(url('/lessen/' . $les_id));
    }
}
