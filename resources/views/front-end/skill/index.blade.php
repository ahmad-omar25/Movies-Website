@extends('layouts.app')
@section('title', $skill->name)
@section('content')
    <div class="container">
        <div class="title">
            <h2 style="margin-top: 100px">{{$skill->name}}</h2>
        </div>
        @include('front-end.shared.video-row')
    </div>
@endsection
