<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Http\View;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('trackings.index', [
            'trackings' => Tracking::all(),
        ]);
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
    public function store(Request $request):RedirectResponse
    {
        $validated = $request->validate([
            'person' => 'required|string|max:128',
            'project' => 'string',
            'duration_TimeSpent'=> 'integer|gte:0',
            'description'=>'string'
        ]);

        $tracking = Tracking::create($validated);
        $tracking->save();

        return redirect(route('trackings.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tracking $tracking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tracking $tracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tracking $tracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tracking $tracking)
    {
        //
    }
}
