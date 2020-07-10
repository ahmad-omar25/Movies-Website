<div class="card" style="width: 20rem;">
    <img class="card-img-top" src="{{url('uploads/' . $video->image)}}" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title">{{$video->name}}</h4>
        <p class="card-text">{{$video->des}}</p>
        <p class="card-text">{{$video->cat->name}}</p>
        <a title="{{$video->name}}" href="{{route('frontend.video', $video->id)}}" class="btn btn-primary">Watch Now</a>
    </div>
</div>
