@extends('layouts.app')

@section('title', $video->name)

@section('content')
    <div class="container">
        <div class="title">
            <h1 style="margin-top: 100px">{{$video->name}}</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                @php /** @var TYPE_NAME $video */ $url = getYoutubeId($video->youtube) @endphp
                @if($url)
                    <iframe class="mb-3" width="100%" height="500" src="https://www.youtube.com/embed/{{$url}}" frameborder="0"  allowfullscreen></iframe>
                @endif
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <p class="card-text "> <i class="fa fa-user"></i> : {{$video->user->name}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="card-text"><i class="far fa-clock"></i> : {{$video->created_at->diffForHumans()}}</p>
                    </div>
                    <div class="col-md-4 font-weight-bold">
                        Category
                        <p class="card-text label label-default position-absolute d-block">

                            <a class=" text-white" href="{{route('front.category' , $video->cat->id)}}">
                                {{$video->cat->name}}
                            </a>
                        </p>
                    </div>
                </div>
            </div>

             <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4 font-weight-bold">
                            Skills
                            <p>
                                @foreach($video->skills as $skill)
                                    <a href="{{route('front.skill' , $skill->id)}}">
                                        <span class="label label-info">{{$skill->name}}</span>
                                    </a>
                                @endforeach
                            </p>
                        </div>
                        <div class="col-md-4 font-weight-bold">
                            Tags
                            <p>
                                @foreach($video->tags as $tag)
                                    <a href="{{route('front.tag' , $tag->id)}}">
                                        <span class="label label-danger">{{$tag->name}}</span>
                                    </a>
                                @endforeach
                            </p>
                        </div>
                        <div class="col-md-4" type="hidden"></div>
                    </div>
                </div>
        </div>
        <div class="row mb-1">
            <div class="col-md-12">
                <p class="card-text"><i class="far fa-calendar-alt"></i> : {{$video->des}}</p>
            </div>
        </div>
        <div class="row mt-3" id="comments">
            <div class="col-md-12">
                <div class="card card-nav-tabs text-left">
                    <div class="card-header card-header-primary">
                        @php $comments = $video->comments  @endphp
                        <h3>Comments ({{count($comments)}})</h3>
                    </div>
                    <div class="card-body">
                        @foreach($comments as $comment)
                        <div class="row">
                            <div class="col-md-8">
                                <p><i class="far fa-comment mb-2"></i> {{$comment->user->name}}</p>
                            </div>
                            <div class="col-md-4 text-right">
                                <p><i class="far fa-clock ml-4"></i> {{$comment->created_at->diffForHumans()}}</p>

                            </div>
                        </div>
                            <p>{{$comment->comment}}</p>
                            @if(auth()->user())
                            @if(auth()->user()->group == 'admin' || auth()->user()->id == $comment->user->id)
                                @endif
                                <a href="" onclick="$(this).next('div').slideToggle(300); return false;">Edit</a>
                                <div style="display: none">
                                    <form action="{{route('front.update', $comment->id)}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <textarea name="comment" class="form-control" cols="30" rows="5">{{$comment->comment}}</textarea>
                                        </div>
                                        <button type="submit" class="btn"><i class="fas fa-edit mr-2"></i>Edit</button>
                                    </form>
                                </div>
                            @endif
                            @if(!$loop->last)
                                <hr>
                            @endif
                        @endforeach
                </div>

            </div>
        </div>
        </div>
        @if(auth()->user())
        <form action="{{route('front.store', $video->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Add Comment</label>
                <textarea name="comment" class="form-control" cols="30" rows="5"></textarea>
            </div>
            <button type="submit" class="btn"><i style="font-size: 19px;margin-right: 10px;" class="far fa-comments"></i>Add Comment</button>
        </form>
        @endif
    </div>
@endsection
