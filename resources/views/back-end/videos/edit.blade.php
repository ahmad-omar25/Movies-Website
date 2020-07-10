@extends('back-end.layout.app')

@section('title')
    {{$pageTitle}}
@endsection

@section('content')
    @component('back-end.layout.nav-bar')
        @slot('nav_title')
            {{$pageTitle}}
        @endslot
    @endcomponent

    @component('back-end.shared.edit', ['pageTitle'=>$pageTitle, 'pageDes'=>$pageDes])
        <form action="{{route($routeName.'.update', ['id' =>$row])}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('back-end.'.$folderName.'.form')
            <button type="submit" class="btn btn-primary pull-right">Update {{$moduleName}}</button>
            <div class="clearfix"></div>
        </form>
        @slot('md4')
            @php /** @var TYPE_NAME $row */ $url = getYoutubeId($row->youtube) @endphp
            @if($url)
            <iframe class="mb-3" width="300" src="https://www.youtube.com/embed/{{$url}}" frameborder="0"  allowfullscreen></iframe>
            @endif
            <img width="300" src="{{url('uploads/' . $row->image)}}">
        @endslot
    @endcomponent

    @component('back-end.shared.edit', ['pageTitle'=>'Comments', 'pageDes'=>'Her We Can Control Comments'])
        @include('back-end.comments.index')
        @slot('md4')
            @include('back-end.comments.create')
        @endslot
    @endcomponent

@endsection
