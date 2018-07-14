@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-users fa-fw"></i> Create post
        </div>
        <div class="panel-body">
            {!! Form::open(['method' => 'POST' ,'action' => 'AdminPostsController@store', 'files' => true]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', '', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', [1 => 'PHP', 0 => 'javaScript'], '', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Image') !!}
                {!! Form::file('photo_id', null,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body', 'Content') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create post', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

            @include('includes.form_errors')
        </div>
    </div>
@endsection