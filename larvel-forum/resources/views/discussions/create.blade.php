@extends('layouts.app')

@section('content')


            <div class="card">
                <div class="card-header">Add Discussion</div>
                    <div class="card-body">

                    <form action="{{'discussions.store'}}" action="POST">

                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" class="form-control" type="text" name="title">
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea id="content" class="form-control" cols="5" rows="5" type="text" name="content">

                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="channel">Cannel</label>
                            <select id="channel" class="form-control" name="channel">
                                @foreach($channels as $channel)
                                    <option value="{{$channel->id}}">{{$channel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Create Discussion</button>
                    </form>

                    </div>

            </div>

@endsection
