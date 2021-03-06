@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-users fa-fw"></i> Posts table
        </div>
        <div class="panel-body">
            @if(Session::has('deleted_post'))
                <p class="bg-danger">{{session('deleted_post')}}</p>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th><i class="fa fa-comments-o" aria-hidden="true"></i></th>
                        <th>Photo</th>
                        <th>Body</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Go</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($posts)
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td><a href="{{route('posts.edit', $post->id)}}">{{str_limit($post->title, 30)}}</a></td>

                                <td><a href="{{route('comments.show',$post->id)}}">{{$post->commentCount($post->comments,$post->id)}}</a></td>
                                <td class="text-center"><img height="25px" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400/'}}" alt=""></td>
                                <td>{{str_limit($post->body, 30)}}</td>
                                <td>{{$post->user['name']}}</td>
                                <td>{{$post->category ? $post->category->name : "uncategorized"}}</td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->updated_at->diffForHumans()}}</td>
                                <td class="text-center"><a href="{{route('home.post',$post->id)}}"><i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </a></td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
    </div>
@endsection

