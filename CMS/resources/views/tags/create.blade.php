@extends('layouts.app')


@section('content')
<div class="d-flex justify-content-end mb-2">
</div>

    <div class="card card-default">
        <div class="card">
            <div class="card-header">

               {{isset($tags) ? 'Edit tag' : 'Create tag'}}


            </div>
            <div class="card-body">

            <form action="{{isset($tags) ? route('tags.update', $tags->id) : route('tags.store')}}" method="POST">
                @if(isset($tags))
                    @method('PUT')
                @endif
                @csrf
                    <div class="form-group">
                    <label for="name">Name</label>
                        <input id="name"  class="form-control" type="text" name="name" value="{{isset($tags) ? $tags->name : ''}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">{{  isset($tags) ? 'Edit tag':'Add tag'}}</button>
                    </div>
            </form>
            </div>
        </div>
    </div>



@endsection
