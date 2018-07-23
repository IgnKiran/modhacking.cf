@extends('layouts.blog-post')
@section('content')
    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="{{$post->photo->file ? $post->photo->file : 'http://placehold.it/900x300'}}" alt="">

        <hr>

        <!-- Post Content -->
        <p>{{$post->body}}</p>

        <hr>

        <!-- Blog Comments -->

        <!-- Auth check: If the user is not logged in form won't show -->
    @if(Auth::check())

        <!-- Comments Form -->
            <div class="well">
                @if(Session::has('comment_message'))
                    <p class="bg-info">{{session('comment_message')}}</p>
                @endif
                <h4>Leave a Comment:</h4>

                {!! Form::open( ['method' => 'POST' ,'action' => 'PostCommentsController@createComment']) !!}

                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="form-group">
                    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '3']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('submit comment', ['class' => 'btn btn-primary']) !!}

                </div>

                {!! Form::close() !!}


            </div>
            <hr>

    @endif
    <!-- Auth check -->



        <!-- Posted Comments -->

    @if(count($comments) > 0)
        @foreach($comments as $comment)
            <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img height="64px" width="64px" class="media-object img-rounded" src="{{$comment->photo ? $comment->photo : 'http://placehold.it/64x64'}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                    {{$comment->body}}

                    @foreach($comment->replies as $reply)
                        @if($reply->is_active == 1)
                        <!-- Nested Comment -->
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img height="64px" width="64px" class="media-object img-rounded" src="{{$reply->photo ? $reply->photo : 'http://placehold.it/64x64'}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                    </h4>
                                    {{$reply->body}}
                                </div>



                            </div>

                            <!-- End Nested Comment -->
                            @endif
                            @endforeach
                        <div class="comment-reply-container">
                            <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                            <div class="comment-reply col-sm-10">
                            {!! Form::open(['method' => 'POST' ,'action' => 'CommentRepliesController@createReply']) !!}
                            <input type="hidden" name="com_id" value="{{$comment->id}}">
                            <div class="form-group">
                                {!! Form::label('body', 'Reply') !!}
                                {!! Form::text('body', '', ['class' => 'form-control', 'rows' => '1']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}
                            </div>

                            {!! Form::close() !!}
                            </div>

                        </div>

                    </div>
                </div>
            @endforeach
        @endif

    </div>
@endsection
@section('scripts')
    <script>
       $('.toggle-reply').click(function(){
          $(this).next().toggle('show');
       });
    </script>
@endsection