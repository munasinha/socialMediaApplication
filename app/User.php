<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Post;
use App\Models\Follower;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'discription', 'date_of_birth', 'phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
     /**
     * Get the posts for the user.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }



    /**
    * Get the Followers for the user.
    */
    public function getFollowersAttribute()
    {
        $followers = DB::table('followers')
                        ->where('user_id', '=' , $this->id)
                        ->join('users', 'users.id', '=', 'followers.follower_id')
                        ->select('users.id','users.name', 'followers.created_at')
                        ->orderBy('created_at', 'desc')
                        ->get();
        return $followers;
    }



    /**
    * Get the Followers id for the user.
    **/
    public function getFollowersIdAttribute()
    {
        $ids = DB::table('followers')
                        ->where('user_id', '=' , $this->id)
                        ->join('users', 'users.id', '=', 'followers.follower_id')
                        ->select('users.id')
                        ->pluck('id')
                        ->toArray();
        return $ids;
    }


    /**
    * Get the Followers posts to the user.
    **/
    public function getFollowersPostsAttribute()
    {
        $ids = DB::table('followers')
                        ->where('user_id', '=' , $this->id)
                        ->join('users', 'users.id', '=', 'followers.follower_id')
                        ->select('users.*')
                        ->pluck('id')
                        ->toArray();

        $post = DB::table('posts')
                    ->whereIn('user_id', $ids)
                    ->join('users', 'users.id', '=', 'posts.user_id')
                    ->select('users.name', 'posts.*')
                    ->orderBy('created_at', 'desc')
                    ->get();
 
        return $post;
    }



    /**
    * Get the Followed users from the user.
    */
    public function getFollowingsAttribute()
    {
        $followeings = DB::table('followers')
                        ->where('follower_id', '=' , $this->id)
                        ->join('users', 'users.id', '=', 'followers.user_id')
                        ->select('users.id','users.name', 'followers.created_at')
                        ->orderBy('created_at', 'desc')
                        ->get();
        return $followeings;
    }


}
