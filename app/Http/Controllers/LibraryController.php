<?php

namespace App\Http\Controllers;

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
               ->with('first_title', Title::orderBy('created_at', 'desc')->first())
               ->with('second_title', Title::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
               ->with('third_title', Title::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first());
    }


    public function singlePage($slug)
    {
        $page = Page::where('slug', $slug)->first();

        return view('library.single')->with('page', $page)
                                  ->with('page_title', $page->page_title)
                                  ->with('titles',Title::get());
    }
}
