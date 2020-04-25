<div class="card-header">
    <div class="d-flex justify-content-between">

        <div>

            <img src="{{Gravatar::src($discussion->author->email)}}" class="rounded-circle" width="40px" height="40px" alt="">

            <span class="ml-2 font-weight-bold">{{$discussion->author->name}}</span>

        </div>
        <div>

        <a href="{{route('discussions.show', $discussion->slug)}}" class="btn btn-success btn-sm">View</a>

        </div>
    </div>
</div>
