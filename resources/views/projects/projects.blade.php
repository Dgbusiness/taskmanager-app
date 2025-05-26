<style>
    .border {
        border-radius: 2vh;
        border-color: black;
    }
</style>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <h1>{{ $data['proy']->name }}</h1>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <a class="btn btn-dark" href={{ route('projects.index') }}>Return</a>
            </div>
            @if ($data['tasks']->count() > 0)
                <div class="sort_menu container">
                    @foreach ($data['tasks'] as $item)
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" data-id={{ $item->id }}>
                                <div class="row handle border col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                        {{ $item->priority }}
                                    </div>
                                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                        {{ $item->name }}
                                    </div>
                                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                        <a class="btn btn-info" href={{ route('task.edit', ['task'=>$item->id]) }}>Edit</a>
                                    </div>
                                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                        {!!Form::open(['action' => ['taskController@destroy', $item->id], 'method' => 'POST', 'class' => ''])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('ELIMINAR', ['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!} 
                                    </div>
                                </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <a class="btn btn-success" href={{ route('creation', ['id'=>$data['proy']->id]) }}>Create Task</a>
                </div>
            @else
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <a class="btn btn-success" href={{ route('creation', ['id'=>$data['proy']->id]) }}>Create Task</a>
                </div>
            @endif
        </div>
    </div>

    <script>
        $(document).ready(function(){
    
            function updateToDatabase(idString){
                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
                
                $.ajax({
                    url:'{{url('task/update-order')}}',
                    method:'POST',
                    data:{ids:idString},
                    success:function(){
                        alert('Successfully updated')
                        //do whatever after success
                    }
                })

                location.reload();
            }
    
            var target = $('.sort_menu');
            target.sortable({
                handle: '.handle',
                placeholder: 'highlight',
                axis: "y",
                update: function (e, ui){
                    var sortData = target.sortable('toArray',{ attribute: 'data-id'})
                    updateToDatabase(sortData.join(','))
                }
            })
            
        })
    </script>
@endsection