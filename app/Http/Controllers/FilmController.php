<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmAutocompleteRequest;
use App\Http\Requests\FilmSearchRequest;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::paginate(10);
        return view('films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = Film::findOrFail($id);
        return FilmResource::make($film);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show search results
     * 
     * @param FilmSearchRequest $request
     */
    public function search(FilmSearchRequest $request)
    {
        $term = trim($request->input('q',));
        $films = Film::searchByTerm($term)->paginate(10);
        return view('films.search', compact('films', 'term'));
    }

    /**
     * Auto-complete for films
     * 
     * @param FilmAutocompleteRequest $request
     */
    public function autocomplete(FilmAutocompleteRequest $request)
    {
        $term = trim($request->input('q',));
        $suggestions = Film::searchByTerm($term)->take(5)->get();
        return FilmResource::collection($suggestions);
    }
}
