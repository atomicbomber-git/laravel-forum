<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Post;
use Auth;
use Illuminate\Support\Collection;


class ThreadController extends Controller
{
    public function index()
    {
        return view("thread.index", [
            "threads" => Thread::where("is_active", 1)->get()
        ]);
    }

    public function show(Request $request, Thread $thread)
    {
        /* Eager load data */
        $thread->load([
            "posts" => function ($query) {
                $query->where("level", 0);
                $query->orderBy("created_at", "DESC");
            },
            "poster"
        ]);

        return view("thread.show", ["thread" => $thread]);
    }

    private function getOrderedPost($store, $posts)
    {
        foreach ($posts as $post) {
            $store->push($post);

            if (!$post->children->isEmpty()) {
                $this->getOrderedPost($store, $post->children);
            }

        }
        return $store;
    }

    public function store(Request $request)
    {
        /* TODO: Validate request */

        $thread = new Thread([
            "poster_id" => Auth::id(),
            "title" => $request->title,
            "content" => $request->content
        ]);

        $thread->save();


        return back();
    }
}
