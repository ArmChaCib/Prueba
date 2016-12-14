@extends('layouts.barraDeNavegacion')

@section('content')
<div class="container">

  <form class="" action="/projects/show/{{$idProject}}/tasks/create" method="post">
    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
    <input type="hidden" value="{{$idProject}}" name="project_id">
    <div class="form-group">
      <label>Nombre de la tarea</label>
      <input type="text" name="title" class="form-control" placeholder="Nombre de la tarea">
      {{ ($errors->has('title')) ? $errors->first('title') : '' }} <br>
    </div>

    <div class="form-group">
      <label>Descripción de la tarea</label>
      <textarea  class="form-control" name="description" rows="3" placeholder="Descripción"></textarea>
      {{ ($errors->has('description')) ? $errors->first('description') : '' }} <br>
    </div>

    <div class="form-group">
      <div class="col-xs-6">
        <label>Fecha de inicio</label>
        <input type="date" name="start">
        {{ ($errors->has('start')) ? $errors->first('start') : '' }}
      </div>

      <div class="col-xs-6">
        <label>Fecha de terminación</label>
      <input type="date" name="end">
      {{ ($errors->has('end')) ? $errors->first('end') : '' }}
      </div>
    </div>

    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" name="name" value="post" class="btn btn-primary pull-right">Agregar tarea</button>
  </form>

</div>
@endsection
