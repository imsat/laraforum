{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: Satyajit--}}
 {{--* Date: 3/7/2019--}}
 {{--* Time: 7:39 PM--}}
 {{--*/--}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Threads</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('threads.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title"></label>
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="body"></label>
                                <textarea class="form-control" name="body" id="body" rows="6" placeholder=""></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
