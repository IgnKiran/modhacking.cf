@extends('layouts.admin')
@section('content')
    <div class="table-responsive">

        @if(count($comments) > 0)
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Comment</th>
                    <th><i class="fa fa-comments-o" aria-hidden="true"></i></th>
                    <th>on</th>
                    <th>Author</th>
                    <th>Photo</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>operations</th>
                </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{str_limit($comment->body, 30)}}</td>
                    <td><a href="{{route('replies.show',$comment->id)}}">{{$comment->replyCount($comment->replies,$comment->id)}}</a></td>
                    <td><a href="{{route('home.post', $comment->post->id)}}">{{str_limit($comment->post->title, 30)}}</a></td>
                    <td>{{str_limit($comment->author,30)}}</td>
                    <td><img height="25px" src="{{$comment->photo ? $comment->photo : 'http://placehold.it/400x400/'}}" alt=""></td>
                    <td>{{str_limit($comment->email,30)}}</td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td>{{$comment->updated_at->diffForHumans()}}</td>
                    <td>
                        @if($comment->is_active)
                            {!! Form::model($comment,['method' => 'PATCH' ,'action' => ['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::button('<i class="fa fa-thumbs-down" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-success col-sm-6']) !!}
                            </div>

                            {!! Form::close() !!}
                        @else
                            {!! Form::model($comment,['method' => 'PATCH' ,'action' => ['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::button('<i class="fa fa-thumbs-up" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-info col-sm-6']) !!}
                            </div>

                            {!! Form::close() !!}

                        @endif

                        {!! Form::model($comment,['method' => 'DELETE' ,'action' => ['PostCommentsController@destroy', $comment->id]]) !!}

                        <div class="form-group">
                            {!! Form::button('<i class="fa fa-times" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-danger col-sm-6']) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

            @else

        <h1 class="text-center">No Comments</h1>

            @endif
    </div>
    <!-- /.table-responsive -->
@endsection