@extends('layouts.barraDeNavegacion')

@section('content')
<div class="container">

  <form class="" action="/projects/show/{{$idProject}}/tasks/create" method="post">
    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">

    <input type="hidden" value="{{$idProject}}" name="project_id">

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
      <label>Nombre de la tarea</label>
      <input type="text" name="title" class="form-control" placeholder="Nombre de la tarea">
      @if ($errors->has('title'))
          <span class="help-block">
              <strong>{{ $errors->first('title') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
      <label>Descripción de la tarea</label>
      <textarea  class="form-control" name="description" rows="3" placeholder="Descripción"></textarea>
       @if ($errors->has('description'))
          <span class="help-block">
              <strong>{{ $errors->first('description') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
      <div class="col-xs-6">
        <label>Fecha de inicio</label>
        <input type="date" name="start">
         @if ($errors->has('start'))
          <span class="help-block">
              <strong>{{ $errors->first('start') }}</strong>
          </span>
      @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
      <div class="col-xs-6">
        <label>Fecha de terminación</label>
      <input type="date" name="end">
      @if ($errors->has('end'))
          <span class="help-block">
              <strong>{{ $errors->first('end') }}</strong>
          </span>
      @endif
      </div>
    </div>

    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" name="name" value="post" class="btn btn-primary pull-right">Agregar tarea</button>
  </form>

</div>
@endsection
