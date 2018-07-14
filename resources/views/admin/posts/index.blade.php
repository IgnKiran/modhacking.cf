@extends('layouts.admin')
@section('content')
    @extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-users fa-fw"></i> Posts table
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Photo</th>
                        <th>Body</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Created</th>
                        <th>Updated</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($posts)
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td><img height="25px" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400/'}}" alt=""></td>
                                <td>{{$post->body}}</td>
                                <td>{{$post->user['name']}}</td>
                                <td>{{$post->category ? $post->category->name : "uncategorized"}}</td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->updated_at->diffForHumans()}}</td>
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

@endsection