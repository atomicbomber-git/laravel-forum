<!DOCTYPE html>
    <html>
    <head>
        <title> Thread #{{ $thread->id }} </title>
        <link rel="stylesheet" type="text/css" href="{{ mix("css/app.css") }}">

        <style type="text/css">
            a.title-link {
                text-decoration: none;
                font-weight: bold;
                color: black;
            }
        </style>

    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <a class="navbar-brand">
                    An Experimental Forum
                </a>
            </div>
        </nav>

        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Thread #{{ $thread->id }} : <strong> "{{ $thread->title }}" </strong>

                    <div>
                        <small>
                            by {{ Auth::user()->name }} on {{ $thread->created_at }}
                        </small>
                    </div>
 
                </div>
                <div class="panel-body">
                    <p> {{ $thread->content }} </p>
                </div>

                <div class="panel-footer">
                    <form id="reply-form" method="POST" action="{{ route("post.reply.store", ["thread" => $thread]) }}">
                        <div class="form-group">
                            <label class="control-label"> Reply: </label>
                            <textarea class="form-control" name="content" placeholder="Your reply here..."></textarea>
                        </div>
                        <div style="text-align: right;">
                            <button class="btn btn-primary btn-sm" form="reply-form" type="submit"> Submit Reply </button>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>

            <h1> Replies: </h1>

            @foreach ($thread->posts as $post)
                @include("thread.post_reply", ["post" => $post, "level" => 0])
            @endforeach
    
        </div>
            
        <script type="text/javascript" src="{{ mix("js/app.js") }}"></script>
    </body>
</html>