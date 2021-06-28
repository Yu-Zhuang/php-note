@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row" style="text-align: center">
                    <h1 style="margin: 10px auto;">Edit profile</h1>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('title') }}</label>
    
                    <div class="col-md-6">
                        <input id="title" type="text" name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title" autofocus>
    
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>
    
                    <div class="col-md-6">
                        <input id="description" type="text" name="description" value="{{ old('description') ?? $user->profile->description }}" required autocomplete="description" autofocus>
    
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('url') }}</label>
    
                    <div class="col-md-6">
                        <input id="url" type="url" name="url" value="{{ old('url') ?? $user->profile->url }}" required autocomplete="url" autofocus>
    
                        @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Profile image') }}</label>
    
                    <div class="col-md-6">
                        <input id="image" type="file" class="image" name="image">
    
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row pt-3">
                    <button class="btn btn-primary" style="margin: 0 auto;">Save profile</button>
               </div>

            </div>
        </div>
    </form>
</div>
@endsection
