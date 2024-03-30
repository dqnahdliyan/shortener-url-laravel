<?php

namespace App\Http\Controllers;

use App\Models\Shortener;
use Illuminate\Http\Request;

class ShortenerController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Shortener $shortener)
    {
        return redirect($shortener->original);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shortener $shortener)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shortener $shortener)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shortener $shortener)
    {
        //
    }
}
