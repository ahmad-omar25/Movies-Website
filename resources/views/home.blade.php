@extends('layouts.app')
@section('title', 'Movies')
@section('content')
    <div class="container">
        <div class="title">
            <h2 style="margin-top: 100px">Latest Videos</h2>
        </div>
        <div class="row">
            @foreach($videos as $video)
                <div class="col-md-4">
                    @include('front-end.shared.video-card')
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! $videos->links() !!}
            </div>
        </div>
    </div>
@endsection
