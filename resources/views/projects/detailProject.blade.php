@extends('layouts.barraDeNavegacion')

@section('content')
{{ Session::get('message') }}
<div class="container">

    <div class="row">

        <div class="col-xs-12 margin-top-10">
			<h1>{{$project->title}}</h1>

			@php
				use Carbon\Carbon;
				$start = new Carbon($project->start);
				$end = new Carbon($project->end);
			@endphp

			<h4>Desde {{$start->toDayDateTimeString()}}</h4>
            <h4>Hasta {{$end->toDayDateTimeString()}}</h4>
            <h6><b>Creado por: </b>{{$project->user->name}}</h6>
            <h3>{{$project->description}}</h3>

        </div>

    </div>

<div class="row">
    <div class="col-xs-8   ">
        <h3>
            <a href="/projects" type="button" class="btn btn-success pull-right">
               <i class="fa  fa-home"></i>
               Regresar
            </a> 
        </h3>    
    </div>  
    <div class="col-xs-4   ">
        <h3>
            <a href="/projects/show/{{$project->id}}/tasks" type="button" class="btn btn-info pull-left">
               <i class="fa  fa-eye"></i>
               Ver tareas
            </a> 
        </h3>    
    </div>  

</div>    



</div>
@endsection
