@extends('layouts.app')

@section('content')
<h1 class="cente"></h1>


<div class="row justify-content-center">

    <div class="col-md-6">

    <div class="card card-default">
        <div class="card-header">
            Edit Todo
        </div>
        <div class="card-body">

            @if($errors->any() )
            .<div class="alert alert-danger">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <ul class="list-group">
                            <li class="list-group-item ">{{$error}}</li>
                        </ul>
                    @endforeach
                </ul>
                </div>

            @endif
                </div>

            <form action="/todos/{{ $todo->id }}/update-todos" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ $todo->name }} ">


                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" class="form-control" col="5" rows="5" name="description" value="">{{ $todo->description }}</textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Udate Todo</button>
                </div>
            </form>
        </div>
    </div>

 </div>

</div>
@endsection
