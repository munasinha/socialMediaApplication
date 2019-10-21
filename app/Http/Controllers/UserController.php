<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Post;

class UserController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }



    /**
     * Show the news feed
     *
     */
    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $followers_ids = $user->followers_id;
        // to prevent show his self
        array_push($followers_ids, $user_id);

        $users_not_followed_1 = DB::table('users')
                                    ->Join('followers', 'followers.follower_id', '=', 'users.id')
                                    // ->whereNotIn('followers.follower_id', $followers_ids)
                                    ->select('users.*')
                                    ->get();
        // preventing duplication
        $users_not_followed = $users_not_followed_1->unique('id');

        $posts = $user->followers_posts;

        return view('home',['posts'=> $posts , 'users_not_followed' => $users_not_followed]);
    }




     public function profile()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $followers = $user->followers;
        $followings = $user->followings;

        $posts = DB::table('posts')
                        ->where('user_id', '=' , $user_id)
                        ->join('users', 'users.id', '=', 'posts.user_id')
                        ->select('users.name', 'posts.*')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('profile',['posts'=> $posts, 'followers' => $followers , 'followings' => $followings]);
    }


    public function follow(int $id)
    {
        $user_id = Auth::user()->id;

        if(($id != null || $id != "") && $id != $user_id)
        {
            DB::table('followers')->insert(
                ['user_id' => $user_id, 'follower_id' => $id]
            );
            
            return redirect()->back()->with('success', 'Successfully followed the user.');
        }

        return redirect()->back()->with('error', 'User does not exist.'); 
    }



    public function unfollow(int $id)
    {
        $user_id = Auth::user()->id;

        if(($id != null || $id != "") && $id != $user_id)
        {
            DB::table('followers')
                    ->where('user_id', '=', $user_id)
                    ->where('follower_id', '=' , $id)
                    ->delete();

            return redirect()->back()->with('success', 'Successfully Unfollowed the user.');
        }

        return redirect()->back()->with('error', 'User does not exist.');
       
    }


}
