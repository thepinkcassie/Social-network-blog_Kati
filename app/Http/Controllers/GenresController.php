<?php

namespace App\Http\Controllers;

use Session;
use App\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.genres.index')->with('genres', Genre::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*** CHANGE TO AN ARRAY OF PREDETERMINED GENRE AND USERS CHOOSE FROM **/
        /***  USERS CAN ADD UP TO 3 GENRE **/
        $this->validate($request, [
            'genre'=>'required'
        ]);

        Genre::create([
            'genre'=>$request->genre
        ]);

        Session::flash('success', 'Genre created successfully.');

        return redirect()->route('genres');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = Genre::find($id);

        return view('admin.genres.edit')->with('genre', $genre);
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
        $this->validate($request, [
            'genre'=>'required'
        ]);

        $genre = Genre::find($id);

        $genre->genre = $request->genre;

        $genre->save();

        Session::flash('success', 'Genre udated!');

        return redirect()->route('genres');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Genre::destroy($id);

        Session::flash('sucess', 'Tag deleted.');

        return redirect()->back();
    }
}
