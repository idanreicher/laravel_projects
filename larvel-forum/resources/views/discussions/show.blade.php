@extends('layouts.app')

@section('content')



        <div class="card my-5">

           @include('discussions.partials.discussion-header')

            <div class="card-body">
                <div class="text-center">

                    <strong > {{$discussion->title}}</strong>

                </div>

                <hr>

                {!!$discussion->content!!}
            </div>

        </div>

        <div class="card">

            <div class="card-header">Add a reply</div>

            <div class="card-body">
                @auth


            <form action="{{route('replies.store', $discussion->slug)}}" method="POST">

                    @csrf

                    <input name="replay" id='replay' type="hidden">
                    <trix-editor input="replay"></trix-editor>

                    <button type="submit" class="btn btn-success btn-sm my-2">

                        Add replay

                    </button>

                </form>


                @else

            <a href="{{route('login')}}" class="btn btn-info">
                Sign in to add a replay
            </a>

                @endauth
            </div>

        </div>

@endsection

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">

@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>

@endsection
