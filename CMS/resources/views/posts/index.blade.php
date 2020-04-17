@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href=" {{route('posts.create')}} " class="btn btn-success ">Add post</a>
    </div>
<div class="card card-default">

    <div class="card-header">
        Posts
    </div>

        <div class="card-body">

            @if($posts->count() > 0)

            <table class="table">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                </thead>
                @foreach($posts as $post)
                    <tr>

                        <td>
                            <img src="{{$post->image}}"  width="100" height="100">
                        </td>
                        <td>
                            {{$post->title}}
                        </td>
                        @if($post->trashed())
                            <td>
                            <form action="{{route('restore-posts', $post->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                 <button class="btn btn-info" type="submit" >Restore</button>

                            </form>
                            </td>

                            @else
                            <td>
                                <a href="{{ route('posts.edit' , $post->id )}}" class="btn btn-info" >Edit</a>
                                </td>
                        @endif

                        <td>
                            <form action="{{route('posts.destroy', $post->id)}}" method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger" type="submit">
                                    {{ $post->trashed() ? "Delete" : "Trash"}}
                                </button>
                            </form>

                        </td>
                    </tr>


                @endforeach
            </table>

            @else
                <h3>No Posts</h3>
            @endif

        </div>

</div>

@endsection
