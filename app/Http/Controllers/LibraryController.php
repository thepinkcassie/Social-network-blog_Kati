<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Genre;
use App\Title;
use App\Page;

use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        

        return view('library.index')
               ->with('titles', Title::all())
               ->with('page_name', Page::orderBy('created_at', 'desc')->first())
               ->with('first_title', Title::orderBy('created_at', 'desc')->first())
               ->with('second_title', Title::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
               ->with('third_title', Title::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first());
    }


    public function singlePage($slug)
    {
        $page = Page::where('slug', $slug)->first();

        $next_id = Page::where('id', '>', $page->id)->min('id');
        $prev_id = Page::where('id', '<', $page->id)->max('id');

        return view('library.single')->with('page', $page)
                                     ->with('titles', Title::all())
                                     ->with('page_name', Page::take(1)->get())
                                     ->with('next', Page::find($next_id))
                                     ->with('prev', Page::find($prev_id));
                                     
    }

    public function genre($id)
    {
        $genre = Genre::find($id);

        return view('genre')->with('genre', $genre)
                            ->with('title', $genre->genre)
                            ->with('titles', Title::all());
    }

   
}
