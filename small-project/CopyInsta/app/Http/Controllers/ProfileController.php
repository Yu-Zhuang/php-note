<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
use App\User;

class ProfileController extends Controller
{
    public function index($user) {
        $user = User::findOrFail($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $postCount = Cache::remember(
            'count.post.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->post->count();
            }
        );
        return view('profile.index', ['user' => $user, 'follows' => $follows, 'postCount' => $postCount]);
    }

    public function edit(User $user) {
        $this->authorize('update', $user->profile);
        return view('profile.edit', ['user' => $user]);
    }

    public function update(User $user) {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'image'
        ]);

        if(request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save(); 
            $imageArray = ['image' => $imagePath];
        }
        
        auth()->user()->profile()->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        $postCount = Cache::remember(
            'count.post.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->post->count();
            }
        );

        return view('profile.index', ['user' => $user, 'postCount' => $postCount]);
    }
}
