<form class="d-inline-block" action="{{route($routeName.'.destroy' , ['id' =>$row] )}}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove {{$sModuleName}}">
        <i class="material-icons">close</i>
    </button>
</form>
