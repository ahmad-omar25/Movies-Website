@csrf
<div class="row">
    @php $input = "name" @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Page Name</label>
            <input type="text" name="{{$input}}"disabled value="{{isset($row) ? $row->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
        </div>
    </div>
    @php $input = "email" @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Email</label>
            <input type="email" name="{{$input}}"disabled value="{{isset($row) ? $row->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
        </div>
    </div>
    @php $input = "message" @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Message</label>
            <textarea name="{{$input}}" cols="30" rows="4" disabled class="form-control @error($input) is-invalid @enderror">{{isset($row) ? $row->{$input} : ''}}</textarea>
        </div>
    </div>
</div>

<hr>

<h4>Replay On Message</h4>
<br>

<form action="{{route('message.replay', $row->id)}}" method="post">
    @csrf
    @php $input = "message" @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Message</label>
            <textarea name="{{$input}}" cols="30" rows="4" class="form-control @error($input) is-invalid @enderror"></textarea>
            @error($input)
            <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary pull-right">Replay {{$moduleName}}</button>
    <div class="clearfix"></div>
</form>
