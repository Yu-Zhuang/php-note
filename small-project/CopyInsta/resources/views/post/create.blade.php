@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">      
            <div class="col-8 offset-2">
                <div class="row" style="text-align: center">
                    <h1 style="margin: 10px auto;">Add new post</h1>
                </div>
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __('Post Caption') }}</label>
    
                    <div class="col-md-6">
                        <input id="caption" type="text" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>
    
                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Post image') }}</label>
    
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
                    <button class="btn btn-primary" style="margin: 0 auto;">Add new post</button>
               </div>

            </div>
        </div>
    </form>
</div>
@endsection
