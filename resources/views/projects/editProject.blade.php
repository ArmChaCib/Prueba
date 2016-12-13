@extends('layouts.barraDeNavegacion')

@section('content')
<div class="container">

  <form class="" action="/task/{{$task->id}}/edit" method="post">

    <div class="form-group">
      <label>Nombre de la tarea</label>
      <input type="text" name="title" class="form-control" value="{{$task->title}}" placeholder="Nombre de la tarea">
      {{ ($errors->has('title')) ? $errors->first('title') : '' }} <br>
    </div>

    <div class="form-group">
      <label>Descripción de la tarea</label>
      <textarea  class="form-control" name="description" rows="3"   placeholder="Descripción">{{$task->description}}</textarea>
      {{ ($errors->has('description')) ? $errors->first('description') : '' }} <br>
    </div>

    <div class="form-group">
      <div class="col-xs-6">
        <label>Fecha de inicio</label>
        <input type="date" name="start"  value="{{$task->start}}">
        {{ ($errors->has('start')) ? $errors->first('start') : '' }}
      </div>

      <div class="col-xs-6">
        <label>Fecha de terminación</label>
      <input type="date" name="end"  value="{{$task->end}}">
      {{ ($errors->has('end')) ? $errors->first('end') : '' }}
      </div>
    </div>

    <input type="hidden" name="_method" value="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" name="name" value="edit" class="btn btn-primary pull-right">Editar tarea</button>
  </form>

</div>
@endsection
