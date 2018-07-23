@extends('layouts.admin')
@section('content')
    @extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-users fa-fw"></i> Media
        </div>
        <div class="panel-body">
            @if(Session::has('deleted_photo'))
                <p class="bg-danger">{{session('deleted_photo')}}</p>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Photo name</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($photos)
                        @foreach($photos as $photo)
                            <tr>
                                <td>{{$photo->id}}</td>
                                <td><img height="25px" src="{{$photo->file ? $photo->file : 'http://placehold.it/400x400/'}}" alt="" class="img-rounded"></td>
                                <td>{{$photo->file}}</td>
                                <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : "-"}}</td>
                                <td>{{$photo->updated_at ? $photo->updated_at->diffForHumans() : "-"}}</td>
                                <td>
                                    {!! Form::model($photo, ['method' => 'DELETE' ,'action' => ['AdminMediaController@destroy',$photo->id]]) !!}

                                    <div class="form-group">
                                        {!! Form::submit('Delete photo', ['class' => 'btn btn-danger']) !!}
                                    </div>

                                    {!! Form::close() !!}
                                </td>
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