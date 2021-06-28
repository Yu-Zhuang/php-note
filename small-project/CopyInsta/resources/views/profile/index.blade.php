@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/storage/{{ $user->profile->image ?? " "}}" class="rounded-circle w-100" srcset="">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h3">{{ $user->username }}</div>
                    @cannot('update', $user->profile)
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @endcannot
                </div>

                @can('update', $user->profile)
                    <a href="/p/create">Add new post</a>
                @endcan
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-3"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-3"><strong>{{ $user->profile->followers->count() }}</strong> follwer</div>
                <div class="pr-3"><strong>{{ $user->following->count() }}</strong> following</div>
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
