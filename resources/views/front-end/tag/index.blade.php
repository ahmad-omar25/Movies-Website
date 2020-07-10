@extends('layouts.app')
@section('title', $tag->name)
@section('content')
    <div class="container">
        <div class="title">
            <h2 style="margin-top: 100px">{{$tag->name}}</h2>
        </div>
        @include('front-end.shared.video-row')
    </div>
@endsection
