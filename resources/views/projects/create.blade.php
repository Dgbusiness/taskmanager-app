@extends('layouts.app')

@section('content')
    <h1>CREATE PROJECT</h1>
    {!! Form::open(['action' => 'projectController@store', 'method' => 'post']) !!}
        <div class="row col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="row col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    {{ Form::label('Name', 'Nombre') }}
                    {{ Form::text('name', '', ['class' => '', 'placeholder' => 'Nombre']) }}
                </div>          
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    {{Form::submit('CREAR', [ 'class' => 'btn btn-info'])}}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection