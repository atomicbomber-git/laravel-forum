<li class="list-group-item {{ $level % 2 === 0 ? "list-group-item-success" : "list-group-item-warning"}}">
    <div>
        <strong> <small> {{ $post->poster->name }} replied on {{ $post->created_at }}: </small> </strong>
    </div>
    <p> "{{ $post->content }}"
        <a href="{{ route("post.reply.create", ["thread" => $thread, "post" => $post]) }}">
            Reply This Post
        </a>
    </p>

    @if (!$post->children->isEmpty())
        <ul class="list-group">
            @foreach ($post->children()->orderBy("created_at", "DESC")->get() as $child)
                @include("thread.post_reply", ["post" => $child, "level" => $level + 1])
            @endforeach
        </ul>
    @endif
</li>
