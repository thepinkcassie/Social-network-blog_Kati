<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Title;
use App\Page;
use App\User;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        return view('library.index')->with('titles', Title::all());
    }


    public function singlePage($slug)
    {
        $page = Page::where('slug', $slug)->first();

        return view('library.single')->with('page', $page)
                                  ->with('page_title', $page->page_title)
                                  ->with('titles',Title::get());
    }
}
