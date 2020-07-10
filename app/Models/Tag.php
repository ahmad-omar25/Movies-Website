<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    // Many To Many Skills And Videos /* Table Name -> skills_videos */
    public function videos() {
        return $this->belongsToMany(Video::class, 'tags_videos');
    }
}
