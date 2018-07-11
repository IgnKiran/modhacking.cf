@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-users fa-fw"></i> Edit user - {{$user->name}}
        </div>
        <div class="panel-body">
            {!! Form::model($user, ['method' => 'PATCH' ,'action' => ['AdminUserController@update', $user->id], 'files' => true]) !!}

            <div class="row">
                <div class="col-sm-3">
                    <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400/'}}" alt="" class="img-responsive img-rounded">
                </div>
                <div class="col-sm-9">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status') !!}
                {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role') !!}
                {!! Form::select('role_id', $roles , null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Image') !!}
                {!! Form::file('photo_id', null,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update user', ['class' => 'btn btn-primary']) !!}
            </div>
                </div>
            </div>

            {!! Form::close() !!}

            @include('includes.form_errors')
        </div>
    </div>
@endsection