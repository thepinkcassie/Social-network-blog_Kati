<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
        public function store(Request $request)
    {
        $this->validate($request,[
            'content'=>'max:170',
        ]);
        
        return Post::create([
            'user_id'=>Auth::id(),
            'content'=> $request->content
        ]);
    }

}
