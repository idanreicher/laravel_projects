@extends('layouts.app')

@section('content')

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My profile</div>

                <div class="card-body">

                    <form action="{{route('users.update-profile')}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" class="form-control" type="text" name="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="about">Abuot</label>
                            <textarea id="about" class="form-control" cols="5" rows="5" name="about" >{{$user->about}}</textarea>
                        </div>
                        <button class="btn btn-success" type="submit">Update user</button>
                    </form>
                </div>
            </div>
        </div>

@endsection
