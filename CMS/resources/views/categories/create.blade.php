@extends('layouts.app')


@section('content')
<div class="d-flex justify-content-end mb-2">
</div>

    <div class="card card-default">
        <div class="card">
            <div class="card-header">

               {{isset($category) ? 'Edit category' : 'Create category'}}


            </div>
            <div class="card-body">
                @if($errors->any())
                    .<div class="alert alert-danger" role="alert">
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                 <li class="list-group-item text-danger">{{$error}}</li>
                             @endforeach
                        </ul>

                    </div>
                @endif
            <form action="{{isset($category) ? route('categories.update', $category->id) : route('categories.store')}}" method="POST">

                @if(isset($category))
                    @method('PUT')
                @endif
                @csrf
                    <div class="form-group">
                    <label for="name">Name</label>
                        <input id="name"  class="form-control" type="text" name="name" value="{{isset($category) ? $category->name : ''}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">{{  isset($category) ? 'Edit category':'Add category'}}</button>
                    </div>
            </form>
            </div>
        </div>
    </div>



@endsection
