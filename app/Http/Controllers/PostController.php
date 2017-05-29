<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Post;
use Auth;

class PostController extends Controller
{
    public function createReply(Request $request, Thread $thread, Post $post)
    {
        return view("post.create_reply", [
            "thread" => $thread,
            "post" => $post
        ]);
    }

    public function storeReply(Request $request, Thread $thread, Post $post = null)
    {
        /* TODO: Validate */

        $level = null;
        if (null === $post->level)
            $level = 0;
        else
            $level = $post->level + 1;

        Post::create([
            "thread_id" => $thread->id,
            "poster_id" => Auth::id(),
            "content" => $request->content,
            "parent_post_id" => $post->id ?? null,
            "level" => $level
        ]);

        return redirect()->route("thread.show", $thread);
    }
}
