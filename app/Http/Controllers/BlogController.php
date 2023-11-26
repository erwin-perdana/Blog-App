<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Http\Requests\AddReplyRequest;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\ReplyPostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function home() {
        $posts = Post::with('user')->get();

        return view('blog.home', compact('posts'));
    }

    public function detail(Post $post) {
        return view('blog.detail', compact('post'));
    }

    public function addComment(AddCommentRequest $request, Post $post) {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $validated['post_id'] = $post->id;

        DB::beginTransaction();

        try {
            PostComment::create($validated);

            DB::commit();
            return redirect()->route('blog.detail', $post->id);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('blog.detail', $post->id);
        }
    }

    public function addReply(AddReplyRequest $request, PostComment $postComment) {
        $validated = $request->validated();
        $validated['post_comment_id'] = $postComment->id;
        $validated['user_id'] = Auth::id();

        DB::beginTransaction();

        try {
            ReplyPostComment::create($validated);

            DB::commit();
            return redirect()->route('blog.detail', $postComment->post_id);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('blog.detail', $postComment->post_id);
        }
    }
}
