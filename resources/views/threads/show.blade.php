{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: Satyajit--}}
 {{--* Date: 3/7/2019--}}
 {{--* Time: 2:24 PM--}}
 {{--*/--}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="#" class="btn">{{$thread->creator->name}}</a>posted:
                        {{$thread->title}}
                    </div>

                    <div class="card-body">
                        {{$thread->body}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($thread->replies as $reply)
                @include('threads.reply')
                @endforeach
            </div>
        </div>
        @if(auth()->check())
        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <form method="POST" action="{{$thread->path().'/replies'}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea class="form-control" name="body" rows="6" placeholder="Have something to say?"></textarea>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        @else
        <p class="p-5 text-center">Please <a href="{{route('login')}}">sign in</a> to participate in this discussion</p>
        @endif
    </div>
@endsection
