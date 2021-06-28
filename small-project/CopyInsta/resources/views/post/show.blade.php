@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img class="w-100" src="/storage/{{ $post->image }}" alt="" srcset="">
        </div>
        <div class="col-4">
            <div class="">
                <div class="d-flex align-items-center">
                    <img src="/storage/{{ $post->user->profile->image }}" style="max-width: 40px" class="rounded-circle">
                    <h4 class="pl-3"><a href="/profile/{{ $post->user->id }}" style="font-text-decoration: black; color: black;">{{ $post->user->username }}</a></h4>
                    <a href="" class="pl-3">Follow</a>
                </div>
                <hr>
                <p>
                    <span class="pr-2" style="font-weight: 2000"><a href="/profile/{{ $post->user->id }}" style="font-text-decoration:black; color: black;">{{ $post->user->username }}</a></span>{{ $post->caption }}
                </p>
            </div>
        </div>
    </div>

</div>
@endsection
