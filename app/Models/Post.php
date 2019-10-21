<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\User;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body','user_id'
    ];


    protected $dates = ['created_at'];

    /**
     * Get the user for the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
