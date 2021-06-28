@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://picsum.photos/200" class="rounded-circle" srcset="">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="/p/create">Add new post</a>
            </div>
            <a href="/profile/{{ $user->id }}/edit">Edit profile</a>

            <div class="d-flex">
                <div class="pr-3"><strong>{{ $user->post->count() }}</strong> posts</div>
                <div class="pr-3"><strong>20</strong> follwer</div>
                <div class="pr-3"><strong>10</strong> following</div>
            </div>
            <div class="pt-3">{{ $user->profile->title ?? "unset title" }}</div>
            <div class="">{{ $user->profile->description ?? "unset description" }}</div>
            <div class=""><a href="#">{{ $user->profile->url ?? "unset url" }}</a></div>
        </div>
    </div>

    <div class="row pt-4">
        @foreach ($user->post as $p)
            <div class="col-4 pb-4">
                <a href="/p/{{ $p->id }}"><img src="/storage/{{ $p->image }}" class="w-100" srcset=""></a>
            </div>            
        @endforeach
    </div>
</div>
@endsection
