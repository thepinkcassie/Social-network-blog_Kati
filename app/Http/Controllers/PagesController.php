<?php

namespace App\Http\Controllers;

Use Session;
use Auth;
Use App\Tag;
Use App\Page;
use App\Title;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('author.pages.index')->with('pages', Page::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titles = Title::all();
        
        if($titles->count() == 0)
        {
            Session::flash('info','Create a title first!');

            return redirect()->route('title.create');
        }

        return view('author.pages.create')->with('titles', $titles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'page_title'=>'required|max:50',
            'content'=>'required',
            'title_id'=>'required'
        ]);

        $page = Page::create([
            'page_title' => $request->page_title,
            'content' => $request->content,
            'title_id'=> $request->title_id,
            'slug' => str_slug($request->page_title),
            'user_id'=>Auth::id(),
        ]);

        Session::flash('success', 'Yay! you successfully added a new page.');

        return redirect()->back();
    
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
        $page = Page::find($id);

        return view('author.pages.edit')->with('page', $page)
                                        ->with('titles', Title::all())
                                        ->with('tags', Tag::all());
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
            'page_title'=> 'required',
            'content' => 'required',
            'title_id'=> 'required'
        ]);
       $page = Page::find($id);
       
        $page->page_title = $request->page_title;
        $page->content = $request->content;
        $page->title_id = $request->title_id;

        $page->save();

        Session::flash('success', 'Page updated successfully!');

        return redirect()->route('pages');
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);

        $page->delete();

        Session::flash('success', 'Hey, you successfully trashed that page.');

        return redirect()->back();
    }

    public function trashed(){
        $pages = Page::onlyTrashed()->get();

        return view('author.pages.trashed')->with('pages', $pages);
    }

    public function restore($id)
    {
        $page = Page::withTrashed()->where('id', $id)->first();

        $page->restore();

        Session::flash('success', 'Page successfully restored.');

        return redirect()->route('pages');
    }

    public function kill($id)
    {
        $page = Page::withTrashed()->where('id', $id)->first();
        
        $page->forceDelete();

        Session::flash('success', 'Awesome, page deleted permanently.');

        return redirect()->back();
    }
    
    
}
