@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-users fa-fw"></i> Categories
        </div>
        <div class="panel-body">
            @if(Session::has('deleted_category'))
                <p class="bg-danger">{{session('deleted_category')}}</p>
            @endif
            <div class="row">
                <div class="col-sm-4">
                    {!! Form::open(['method' => 'POST' ,'action' => 'AdminCategoriesController@store']) !!}

                    <div class="form-group">
                        {!! Form::text('name', '', ['placeholder' => 'Enter category', 'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Create category', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
                <div class="col-sm-8">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Created</th>
                                <th>Updated</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($categories)
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
                                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : "-"}}</td>
                                        <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : "-"}}</td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.table-responsive -->
        </div>
    </div>
@endsection