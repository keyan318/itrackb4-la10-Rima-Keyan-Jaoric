<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $genre = $request->query('genre', '');
        $year  = $request->query('year', '');

        $items = Movie::query()
            ->when($genre !== '', fn ($q) => $q->where('genre', $genre))
            ->when($year !== '', fn ($q) => $q->where('year', $year))
            ->get();

        return view('movies.index', [
            'items' => $items,
            'genre' => $genre,
            'year'  => $year,
        ]);
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $validated=$request->validate([
            'title' =>'required|string|min:5|max:100',
            'genre' =>'required|in:Action,Science Fiction,Superhero',
            'year' =>'required|integer|min:1888|max:2100',
            'director'=>['required','string','min:5','max:100','regex:/^[A-Za-z .,\'-]+$/'],
            'rating'=>'required|numeric|min:0|max:10',
            'duration'=>['required','regex:/^\d{1,2}h\s?\d{1,2}m$/'],
        ],[
            'title.min' =>'The title must be at least 5 characters.',
            'title.max' =>'The title must not be longer than 100 characters.',
            'director.min' =>'The director must be at least 5 characters.',
            'director.regex' =>'The director may only contain letters, spaces, periods, commas, apostrophes and hyphens.',
            'duration.regex' =>'The duration must look like 2h 28m.',
        ]);

        $validated['year']=(int)$validated['year'];
        $validated['rating']=(float)$validated['rating'];

        Movie::create($validated);

        return redirect()
        ->route('movies.index')
        ->with('success', 'Movie added successfully.');
    }

    public function show(string $id)
    {
        $item = Movie::findOrFail($id);
        return view('movies.show', ['item' => $item]);
    }

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
        //
    }

    public function featured()
    {
        $item = Movie::where('is_featured', true)->firstOrFail();
        return view('movies.show', ['item' => $item]);
    }
}
