<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('person.index', [
            'people' => Person::all(),
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'person' => 'required|string|max:128',
            'fullname' => 'string',
            'identification' => 'integer|gte:0',
        ]);

        $person = Person::create($validated);
        $person->save();

        return redirect(route('person.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(person $person)
    {
        $this->authorize('update', $person);



        return view('person.edit', [

            'Person' => $person,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person): RedirectResponse
    {
        $this->authorize('update', $person);



        $validated = $request->validate([
            'person' => 'required|string|max:128',
            'fullname' => 'string',
            'identification' => 'integer|gte:0',
        ]);



        $person->update($validated);



        return redirect(route('person.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(person $person)
    {
        //
    }
}
