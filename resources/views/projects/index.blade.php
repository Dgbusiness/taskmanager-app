@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>PROJECTS</h1>
        <div class="row">
            @if ($projects->count() > 0)
                @foreach ($projects as $item)
                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <h2>
                            <a href={{ route('projects.show', ['project'=>$item->id]) }}>{{ $item->name }}</a>
                        </h2>
                    </div>
                @endforeach
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <a class="btn btn-success" href={{ route('projects.create') }}>Create Project</a>
                </div>
            @else
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <a class="btn btn-success" href={{ route('projects.create') }}>Create Project</a>
                </div>
            @endif
        </div>
    </div>
@endsection