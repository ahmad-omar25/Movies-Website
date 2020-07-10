@extends('layouts.app')

@section('title', $cat->name)

@section('content')
    <div class="container">
        <div class="title">
            <h2 style="margin-top: 100px">{{$cat->name}}</h2>
        </div>
        @include('front-end.shared.video-row')
    </div>
@endsection
