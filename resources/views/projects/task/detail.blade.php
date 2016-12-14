@extends('layouts.barraDeNavegacion')

@section('content')
{{ Session::get('message') }}
<div class="container">

    <div class="row">

        
        <div class="col-xs-12 margin-top-10">
			<h1>{{$task->title}}</h1>

			@php
				use Carbon\Carbon;
				$start = new Carbon($task->start);
				$end = new Carbon($task->end);
			@endphp

			<h4>Desde {{$start->toDayDateTimeString()}}</h4>
            <h4>Hasta {{$end->toDayDateTimeString()}}</h4>

            <h3>{{$task->description}}</h3>

        </div>

    </div>
    
<div class="col-xs-12   ">
     <h3>
         <a href="/projects/show/{{$idProject}}/tasks" type="button" class="btn btn-success pull-right">
             <i class="fa  fa-home"></i>
             Regresar
         </a> 
     </h3>    
</div>

</div>
@endsection
