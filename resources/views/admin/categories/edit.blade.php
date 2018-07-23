@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-users fa-fw"></i> Edit category
        </div>
        <div class="panel-body">
            {!! Form::model($category, ['method' => 'PATCH' ,'action' => ['AdminCategoriesController@update',$category->id]]) !!}

            <div class="form-group">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update category', ['class' => 'btn btn-primary col-sm-6']) !!}
            </div>

            {!! Form::close() !!}
            {!! Form::model($category, ['method' => 'DELETE' ,'action' => ['AdminCategoriesController@destroy',$category->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete category', ['class' => 'btn btn-danger col-sm-6']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection