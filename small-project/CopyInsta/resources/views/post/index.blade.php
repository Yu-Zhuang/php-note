@extends('layouts.app')

@section('content')
<div class="container">
@foreach ($posts as $post)

    <div class="row">
        <div class="col-6 offset-3 pb-3">
            <a href="/p/{{ $post->id }}">
                <img style="max-width: 400px" src="/storage/{{ $post->image }}" alt="" srcset="">
            </a>
       </div>
        <div class="col-6 offset-3">
            <div class="">
                <div class="d-flex align-items-center">
                    <img src="/storage/{{ $post->user->profile->image }}" style="max-width: 40px" class="rounded-circle">
                    <h4 class="pl-3"><a href="/profile/{{ $post->user->id }}" style="font-text-decoration: black; color: black;">{{ $post->user->username }}</a></h4>
                </div>         
                <p>
                    <span class="pr-2" style="font-weight: 2000"><a href="/profile/{{ $post->user->id }}" style="font-text-decoration:black; color: black;">{{ $post->user->username }}</a></span>{{ $post->caption }}
                </p>
            </div>
            <hr>   
        </div>
    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
 
@endforeach
</div>
@endsection
