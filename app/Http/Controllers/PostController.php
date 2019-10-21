<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }
 
    public function store(Request $request)
    {
        $post = new Post;
        // validate the post max char count as requested
        $this->validate($request,[
            'body' => ['required', 'max:200']
        ]);
        
        $user_id = Auth::user()->id;
        $post->body = $request->body;
        $post->user_id = $user_id;
        $post->save();
        return redirect('/profile');
    }




    public function edit($id)
    {

        $post = Post::find($id);
        return view('editPost',['post' => $post]);        
    }


    


    public function update(Request $request, $id)
    {
        // return $id;
        // validate the post max char count as requested
        $this->validate($request,[
            'body' => ['required', 'max:200']
        ]);

        $post = Post::find($id);
        $post->body = $request->body;
        $post->save();
        return redirect('/profile');
    }


    
    


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/profile');
    }
}
