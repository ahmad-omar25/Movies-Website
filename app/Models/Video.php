<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'name' ,
        'meta_keywords' ,
        'meta_des',
        'des',
        'youtube',
        'published',
        'user_id',
        'cat_id',
        'image'
    ];

    // One To Many User And Videos
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // One To Many Category And Videos
    public function cat() {
        return $this->belongsTo(Category::class, 'cat_id');
    }


    // Many To Many Skills And Videos /* Table Name -> skills_videos */
    public function skills() {
        return $this->belongsToMany(Skill::class, 'skills_videos');
    }

    // Many To Many Tags And Videos /* Table Name -> skills_videos */
    public function tags() {
        return $this->belongsToMany(Tag::class, 'tags_videos');
    }

    // One To Many comments And Videos
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
