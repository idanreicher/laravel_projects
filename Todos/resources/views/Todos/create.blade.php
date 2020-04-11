@extends('layouts.app')

@section('content')
<h1 class="cente"></h1>


<div class="row justify-content-center">

    <div class="col-md-6">

    <div class="card card-default">
        <div class="card-header">
            Create Todo
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

            <form action="/store-todos" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }} ">


                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" class="form-control" name="description" value="{{ old('description') }} "></textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Create Todo</button>
                </div>
            </form>
        </div>
    </div>

 </div>

</div>
@endsection
