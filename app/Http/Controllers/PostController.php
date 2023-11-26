<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == "User") {
            $posts = Post::with('user')->where('user_id', Auth::id())->get();
        } else {
            $posts = Post::with('user')->get();
        }

        return view('user.post.index', compact('posts'));
    }

    public function create()
    {
        return view('user.post.create');
    }

    public function store(PostRequest $request)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {
            $image = $validated['image'];

            $image->store('image/post', 'public');
            $imgPath = $image->store('image/post', 'public');

            Post::create([
                'title' => $validated['title'],
                'image' => $imgPath,
                'content' => $validated['content'],
                'user_id' => Auth::id(),
                'date' => Carbon::now()
            ]);

            DB::commit();

            return redirect()->route('user.post.index')->with('status', 'Data add successfully');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('user.post.index')->with('status', 'Something wrong!');
        }
    }

    public function edit(Post $post) {
        return view('user.post.edit', compact('post'));
    }

    public function update(PostUpdateRequest $request, Post $post) {
        $validated = $request->validated();

        DB::beginTransaction();

        try {
            $updated = [
                'title' => $validated['title'],
                'content' => $validated['content'],
            ];

            if($validated['image'] != null) {
                $image = $validated['image'];

                $image->store('image/post', 'public');
                $imgPath = $image->store('image/post', 'public');
                $updated['image'] = $imgPath;
            }

            $post->update($updated);

            DB::commit();

            return redirect()->route('user.post.index')->with('status', 'Data edit successfully');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            return redirect()->route('user.post.index')->with('status', 'Something wrong!');
        }
    }

    public function destroy(Post $post) {
        $post->delete();

        return redirect()->route('user.post.index')->with('success', 'Data deleted successfully');
    }
}
