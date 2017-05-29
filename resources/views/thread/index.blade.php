<!DOCTYPE html>
    <html>
    <head>
        <title> All Threads </title>
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

            <h2> Create A New Thread </h2>
            <form method="POST" action="{{ route("thread.store") }}">
                <div class="form-group">
                    <label class="control-label">
                        Thread Title:
                    </label>
                    <input class="form-control" type="text" name="title" placeholder="Literally the title">
                </div>
                <div class="form-group">
                    <label class="control-label">
                        Content:
                    </label>
                    <textarea class="form-control" name="content" placeholder="What you want to say..."></textarea>
                </div>
                <div style="text-align: right;">
                    <button class="btn btn-primary btn-sm"> Post Thread </button>
                </div>
                {{ csrf_field() }}
            </form>

            <h2> All Threads </h2>

            <ul class="list-group">
                @foreach ($threads as $thread)
                <li class="list-group-item">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                {{-- <img class="media-object" src="..." alt="..."> --}}
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a class="title-link" href="{{ route("thread.show", $thread) }}"> "{{ $thread->title }}" </a>
                            </h4>
                            <h5> By <a> {{ $thread->poster->name }} </a> </h5>
                        </div>
                    </div>

                </li>
                @endforeach
            </ul>


        </div>
            
        <script type="text/javascript" src="{{ mix("js/app.js") }}"></script>
    </body>
</html>