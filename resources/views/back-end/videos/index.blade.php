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
    @component('back-end.shared.table', ['pageTitle' => $pageTitle, 'pageDes' =>$pageDes])
        @slot('addButton')
        <div class="col-md-4 text-right">
            <a href="{{route($routeName.'.create')}}" class="btn btn-white btn-round">
                add {{$sModuleName}}
            </a>
        </div>
        @endslot
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Published</th>
                    <th>User</th>
                    <th>Category</th>
                    <th class="text-right">Control</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rows as $row)
                    <tr>
                        <td>
                            {{$row ->id}}
                        </td>
                        <td>
                            {{$row ->name}}
                        </td>
                        <td>
                            @if($row ->published == 1)
                                Published
                            @else
                                Hidden
                            @endif
                        </td>
                        <td>
                            {{$row ->user->name}}
                        </td>
                        <td>
                            {{$row ->cat->name}}
                        </td>
                        <td class="td-actions text-right">
                            @include('back-end.shared.buttons.edit')
                            @include('back-end.shared.buttons.delete')
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $rows->links() !!}
        </div>
    @endcomponent
@endsection
