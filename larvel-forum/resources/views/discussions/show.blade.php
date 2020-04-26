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

                @if($discussion->bestReply)

                    <div class="card card-success my-5">

                        <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">

                                <div>

                                    <img src="{{Gravatar::src($discussion->bestReply->owner->email)}}" class="rounded-circle" width="20px" height="20px" alt="">
                                    <strong>

                                        {{$discussion->bestReply->owner->name}}

                                    </strong>

                                </div>

                                <div>Best Reply</div>

                            </div>
                            <div class="card-body">

                                {{-- <h5 class="card-title">{{$discussion->bestReply()->}}</h5> --}}
                                <p class="card-text">{!! $discussion->bestReply->content !!}</p>
                            </div>
                        </div>



                    </div>

                @endif
            </div>

        </div>

        @foreach($discussion->replies()->paginate(3) as $reply)

            <div class="card my-5">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">

                            <div>
                                <img src="{{Gravatar::src($reply->owner->email)}}" class="rounded-circle" width="40px" height="40px" alt="">
                                <span>{{$reply->owner->name}}</span>
                            </div>

                            <div>

                            @if(auth()->user()->id == $discussion->author->id)

                                <form action="{{route('discssions.best-reply', ['discussion' => $discussion->slug, 'reply' => $reply->id])}}" method="POST">
                                    @csrf

                                    <button type="submit" class="btn btn-primary btn-sm">mark as best reply</button>

                                </form>

                            @endif



                            </div>

                        </div>
                    </div>
                    <div class="card-body">

                        {!!$reply->content!!}

                    </div>

                </div>
            </div>


        @endforeach

        {{$discussion->replies()->paginate(3)->links()}}


        <div class="card">

            <div class="card-header">Add a reply</div>

            <div class="card-body">
                @auth


            <form action="{{route('replies.store', $discussion->slug)}}" method="POST">

                    @csrf

                    <input name="content" id='content' type="hidden">
                    <trix-editor input="content"></trix-editor>

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
