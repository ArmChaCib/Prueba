@extends('layouts.barraDeNavegacion')

@section('content')
{{ Session::get('message') }}
<div class="container">

  <div class="container">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        
        @yield('content')
  </div>

  <div class="row">

    <div class="col-xs-12   ">
        <h3>
            Tareas
            <a href="/projects/show/{{$idProject}}/tasks/create" type="button" class="btn btn-default pull-right">
                <i class="fa  fa-plus"></i>
                Agregar tarea
            </a> 
        </h3>  
    </div>  

  </div>

  <div class="row">
        
        <div class="col-xs-12 margin-top-10">

            <table class="table table-bordered">

               <thead>
                 <tr>
                   <th># de tarea</th>
                   <th>Nombre de tarea</th>
                   <th>Descripción de tarea</th>
                   <th>Usuario</th>
                   <th>Acción</th>
                   <th>Status</th>
                 </tr>
               </thead>

               <tbody>
                 {{$puedeComentar = false}}
                 @foreach ($tasks as $task)
                 <tr>

                  <td>{{ $task->id }}</td>
                  <td>{{$task->title}}</td>
                  <td>{{$task->description}}</td>  
                  <td>{{$task->user->name}}</td> 
                  {{$puedeComentar = true}}

                  <td>
                     <div class="dropdown">
                         <button class="btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown">Acción
                         <span class="caret"></span></button>
                         <ul class="dropdown-menu">

                         <li>
                              <a href="/projects/show/{{$idProject}}/tasks/show/{{$task->id}}">
                                  <i class="fa fa-eye"> </i>
                                  Ver
                              </a>
                          </li>

                          @if ($task->user->name == Auth::user()->name)
                            <li>
                              <a href="/projects/show/{{$idProject}}/tasks/{{ $task->id }}/edit">
                                <i class="fa fa-edit"> </i>
                                Editar
                              </a>
                            </li>
                          

                           <li>
                                <a  data-toggle="modal" data-target="#myModal" v-on:click=setDelete({{$task->id}})>
                                    <i class="fa fa-trash"> </i>
                                    Eliminar
                                </a>
                            </li>
                          @endif
                         </ul>
                       </div>  
                  </td>
                  
                  <td>
                    @if ($task->status)
                      Tarea terminada

                    @else
                      @if ($task->user->name == Auth::user()->name)
                        <button  data-toggle="modal" data-target="#finishModal" v-on:click=setDelete({{$task->id}})>
                            <i class="fa fa-flag-checkered"> </i>
                              Finalizar tarea
                        </button>
                      @else
                        Tarea no finalizada
                      @endif

                    @endif
                  </td>
                  
                 </tr>
                 @endforeach
               </tbody>
            </table>

        </div>

  <div class="row">
    <div class="col-xs-12 ">
        <h3>
            <a href="/projects" type="button" class="btn btn-success pull-right">
               <i class="fa  fa-home"></i>
               Regresar
            </a> 
        </h3>    
    </div> 
  </div>

  <div class="container">

    @foreach ($comments as $comment)

      <div class="row">
        <div class="col-xs-12">
          <b>Creado por: </b>{{$comment->user->name}}
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          {{$comment->created_at}}
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          {{$comment->comment}}
        </div>
      </div>
      <br>
      <br>
    @endforeach

  </div> 



  <div class="container">
    @if ($puedeComentar)
      <form class="" action="/projects/show/{{$idProject}}/tasks" method="post">
        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
        <input type="hidden" value="{{$idProject}}" name="project_id">
        <div class="form-group">
          <label>Comentario</label>
          <textarea  class="form-control" name="comment" rows="3" placeholder="Comentario"></textarea>
          {{ ($errors->has('comment')) ? $errors->first('comment') : '' }} <br>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" name="name" value="post" class="btn btn-primary pull-right">Comentar</button>
        
      </form>
    @else
      <div class="col-xs-12"> Solo usuarios involucrados en alguna de estas tareas puede comentar</div>
    @endif
  </div>
    



  <div class="modal fade" id="myModal" role="dialog"  method="post">

    <div class="modal-dialog modal-sm">

      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Eliminar</h4>
        </div>

        <div class="modal-body">
          <p>¿Seguro que deseas eliminar la tarea?</p>
        </div>
        
        <div class="modal-footer">
          <form action="/projects/show/{{$idProject}}/tasks/delete/@{{idDelete}}" method="post">
          {{csrf_field()}}
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-danger" >Aceptar</button>
          </form>
        </div>
        
      </div>
    </div>
  </div>


  <div class="modal fade" id="finishModal" role="dialog"  method="post">

    <div class="modal-dialog modal-sm">

      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Finalizar</h4>
        </div>

        <div class="modal-body">
          <p>¿Seguro que deseas finalizar la tarea?</p>
        </div>
        
        <div class="modal-footer">
          <form action="/projects/show/{{$idProject}}/tasks/finished/@{{idDelete}}" method="post">
          {{csrf_field()}}
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-danger" >Aceptar</button>
          </form>
        </div>
        
      </div>
    </div>
  </div

</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.27/vue.js"></script>
<script>
        new Vue({
          el: '#app',
          data: {
            idDelete: ''
          },
          methods: {
            setDelete:function(id){
              this.idDelete=id;
            }
          }
        });
</script>
@endsection
