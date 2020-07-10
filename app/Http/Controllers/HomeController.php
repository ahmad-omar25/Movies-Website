<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontEnd\Messages\Store;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;
use App\Models\Message;

class HomeController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('id' , 'desc')->paginate(6);
        return view('home' , compact('videos'));
    }

    public function category($id ) {
        $cat = Category::find($id);
        $videos = Video::where('cat_id' , $id)->orderBy('id', 'desc')->paginate(5);
        return view('front-end.category.index' , compact('videos', 'cat'));
    }

    public function skill($id ) {
        $skill = Skill::find($id);
        $videos = Video::whereHas('skills' , function ($query) use ($id){
            $query->where('skill_id' , $id);
        })->orderBy('id', 'desc')->paginate(6);
        return view('front-end.skill.index' , compact('videos', 'skill'));
    }


    public function tag($id ) {
        $tag = Tag::find($id);
        $videos = Video::whereHas('tags' , function ($query) use ($id){
            $query->where('tag_id' , $id);
        })->orderBy('id', 'desc')->paginate(6);
        return view('front-end.tag.index' , compact('videos', 'tag'));
    }

    public function video($id) {
        $video = Video::with('skills', 'tags', 'cat', 'user', 'comments.user')->find($id);
        return view('front-end.video.index' , compact('video'));
    }

    public function CommentUpdate($id, Store $request) {
        $comment = Comment::find($id);
        if (($comment->user_id == auth()->user()->id) || auth()->user()->group == 'admin') {
            $comment->update(['comment'=>$request->comment]);
        }
        return redirect()->route('frontend.video', [$comment->video_id, '#comments']);
    }

    public function CommentStore($id, Store $request) {
        $video = Video::find($id);
        Comment::create([
            'user_id' =>auth()->user()->id,
            'video_id'=>$video->id,
            'comment'=>$request->comment
        ]);
        return redirect()->route('frontend.video', [$video->id, '#comments']);
    }

    public function messageStore(Store $request) {
        Message::create($request->all());
        return redirect()->route('frontend.landing');
    }
}
