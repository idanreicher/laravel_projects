@extends('layouts.app')

@section('content')


        @foreach($discussions as $discussion)

        <div class="card">

            @include('discussions.partials.discussion-header')

                <div class="card-body">
                    <div class="text-center">

                        <strong > {{$discussion->title}}</strong>

                    </div>

                </div>

            </div>

        @endforeach
        <div class="card" >
            <div class="card-body" >
                {{$discussions->appends(['channel' => request()->query('channel')])->links()}}
            </div>
        </div>
@endsection
