<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id' , 'video_id' , 'comment'
    ];

    // One To Many Users And Comments
    public function user() {
        return $this->belongsTo(User::class);
    }

    // One To Many Videos And Comments
    public function video() {
        return $this->belongsTo(Video::class);
    }
}
