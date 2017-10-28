<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Session;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('profiles.index')
            ->with('user', $user);
    }

    public function store(Request $r)
    {
        $this->validate($r,[
            'avatars_img'=>'required|image',
        ]);

        $avatars_img = $r->avatars_img;
        $avatars_new_name = time() . $avatars_img->getClientOriginalName();
        $avatars_img->move('avatar/avatars_img', $avatars_new_name);

        $user = User::create([
           'avatars_img' => 'avatar/avatars_img/'.$avatars_new_name,
        ]);

    }

    public function edit()
    {
        return view('profiles.edit')->with('info', Auth::user()->profile);
    }

    public function update(Request $r)
    {
        

        $this->validate($r, [
            'location'=> 'required',
            'about'=> 'required|max:70',
            'website'=> 'max:25'
        ]);

        Auth::user()->profile()->update([
            'location'=> $r->location,
            'website'=> $r->website,
            'about'=> $r->about,
            'avatars_img'=>$r->avatars_img
        ]);

         $user = User::find('avatars_img');

        if($r->hasFile('avatars_img'))
        {
            $avatars_img = $r->avatars_img;
            $avatars_new_name = time() . $avatars_img->getClientOriginalName();
            $avatars_img->move('avatar/avatars_img', $avatars_new_name);
            $r->avatars_img = 'avatar/avatars_img/'.$avatars_new_name;
        }

        
       

        session()->flash('success', 'Yay, you successfully updated your profile!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->profile->delete();

        $user->delete();

        return view('welcome');
    }
}
