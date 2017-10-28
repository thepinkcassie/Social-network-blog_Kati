<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\User;
Use App\Genre;
use App\Title;
use Illuminate\Http\Request;

class TitlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('author.titles.index')->with('titles', Title::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();

        if($genres->count() == 0)
    {

          return view('author.titles.create');
    }

         return view('author.titles.create')->with('genres', $genres);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'featured_img'=>'required|image',
            'name'=>'required|max:100',
            'summary'=>'required|max:300',
            'genres'=>'required|max:3'
        ]);
        
        $featured_img = $request->featured_img;
        $featured_new_name = time() . $featured_img->getClientOriginalName();
        $featured_img->move('uploads/titles_cover', $featured_new_name);

        $title = Title::create([
           'featured_img' => 'uploads/titles_cover/'.$featured_new_name,
           'name' => $request->name,
           'summary' => $request->summary,
           'user_id'=>Auth::id(),
        ]);

        $title->genres()->attach($request->genres);


        Session::flash('success', 'Yay! you created a new title');

        return redirect()->route('titles');

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
        $title = Title::find($id);

        return view('author.titles.edit')->with('title', $title)
                                         ->with('genres', Genre::all());
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
            'name' => 'required|max:100',
            'summary' => 'required|max:300',
            'genres'=>'required|max:3'
        ]);
        $title = Title::find($id);

        if($request->hasFile('featured_img'))
        {
            $featured_img = $request->featured_img;
            $featured_new_name = time() . $featured_img->getClientOriginalName();
            $featured_img->move('uploads/titles_cover', $featured_new_name);
            $title->featured_img = 'uploads/titles_cover/'.$featured_new_name;
        }

        $title->name = $request->name;
        $title->summary = $request->summary;

        $title->save();

        $title->genres()->sync($request->genres);

        Session::flash('success', 'Nice, you update your work!');

        return redirect()->route('titles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $title = Title::find($id);

        foreach($title->pages as $pages){
            $pages->forceDelete();
        }

        $title->delete();

        Session::flash('success', 'You successfully deleted this title');

        return redirect()->route('titles');
    }
}
