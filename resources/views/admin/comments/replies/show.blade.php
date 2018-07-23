@extends('layouts.admin')
@section('content')
    <p class="well">Replies to<br><i>"{{$comment->body}}"</i></p>
    @if(count($replies) > 0)
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Replies</th>
                <th>Author</th>
                <th>Photo</th>
                <th>Email</th>
                <th>Created</th>
                <th>Updated</th>
                <th>opration</th>
            </tr>
            </thead>
            <tbody>
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{str_limit($reply->body, 30)}}</td>
                    <td>{{str_limit($reply->author,30)}}</td>
                    <td><img height="25px" src="{{$reply->photo ? $reply->photo : 'http://placehold.it/400x400/'}}" alt=""></td>
                    <td>{{str_limit($reply->email,30)}}</td>
                    <td>{{$reply->created_at->diffForHumans()}}</td>
                    <td>{{$reply->updated_at->diffForHumans()}}</td>
                    <td>
                        @if($reply->is_active)
                            {!! Form::model($reply,['method' => 'PATCH' ,'action' => ['CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::button('<i class="fa fa-thumbs-up" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-info col-sm-6']) !!}
                            </div>

                            {!! Form::close() !!}
                        @else
                            {!! Form::model($reply,['method' => 'PATCH' ,'action' => ['CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::button('<i class="fa fa-thumbs-down" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-success col-sm-6']) !!}
                            </div>

                            {!! Form::close() !!}
                        @endif

                        {!! Form::model($reply,['method' => 'DELETE' ,'action' => ['CommentRepliesController@destroy', $reply->id]]) !!}

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

        <h1 class="text-center">No Replies</h1>

    @endif
@endsection