@extends('layouts.app')


@section('content')


<div class="card card-default">

    <div class="card-header">
       {{ isset($post) ? 'Edit post' : 'Create post'}}
    </div>
    <div class="card-body">
        <form action="{{ isset($post) ? route('posts.update' , $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($post))

                @method('PUT')

            @endif

            <div class="form-group">
                <label for="title">Title</label>
            <input id="title" class="form-control" type="text" name="title" value="{{$post->title ?? ''}}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" cols="5" rows="5" class="form-control" type="text" name="description"> {{$post->description ?? ''}}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
            <input id="content" type="hidden" name="content" value="{{$post->content ?? ''}}">
                <trix-editor input="content"></trix-editor>
            </div>
            <div class="form-group">
                <label for="created_at">Published at</label>
                <input id="created_at" class="form-control" type="text" name="created_at" value="{{$post->created_at ?? ''}}">
            </div>
            @if(isset($post))

                <div class="form-group">
                <label for="image">Image</label>
                <input id="image" src="{{asset($post->image)}}" class="form-control" type="file" name="image" style="with:100%">
            </div>
            @else


            <div class="form-group">
                <label for="image">Image</label>
                <input id="image" class="form-control" type="file" name="image" >
            </div>


            @endif

            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" class="form-control" name="category">

                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @if(isset($post))
                            @if($category->id == $post->category->id)

                            selected

                        @endif

                            @endif
                           >
                           {{ $category->name }}
                        </option>

                    @endforeach

                </select>
            </div>
            @if($tags->count() > 0)

                <div class="form-group">
                    <label for="tags">Tags</label>

                            <select name="tags[]" id="tags" class="form-control" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}"
                                        @if(isset($post))
                                            @if($post->hasTags($tag->id))
                                                selected
                                            @endif
                                        @endif
                                    >
                                        {{$tag->name}}
                                    </option>
                                @endforeach

                    </select>
                </div>
            @endif


            <div class="form-group">
                <button class="btn btn-success" type="submit">Create post</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
         flatpickr('#created_at' , {
            enableTime:true
         });

    </script>
    @endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection
