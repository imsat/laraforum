
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: Satyajit--}}
 {{--* Date: 3/7/2019--}}
 {{--* Time: 4:36 PM--}}
 {{--*/--}}
<div class="card mt-3">
    <div class="card-header"><a href="" class="btn">{{$reply->owner->name}}</a>said {{$reply->created_at->diffForHumans()}}...</div>

    <div class="card-body">
        {{$reply->body}}
    </div>
</div>
