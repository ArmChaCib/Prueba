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
                <a href="/task/create" type="button" class="btn btn-default pull-right">
                    <i class="fa  fa-plus"></i>
                    Agregar tarea
                </a> 
            </h3>    
        </div>


        
        <div class="col-xs-12 margin-top-10">

            <table class="table table-bordered">

               <thead>
                 <tr>
                   <th># de tarea</th>
                   <th>Nombre de tarea</th>
                   <th>Descripción de tarea</th>
                   <th>Usuario</th>
                   <th>Acción</th>
                 </tr>
               </thead>

               <tbody>
                 @foreach ($tasks as $task)
                 <tr>

                 

                   <td>{{ $task->id }}</td>
                   <td>{{$task->title}}</td>
                   <td>{{$task->description}}</td>
                   <td>{{$task->user}}</td>

                   <td>
                     <div class="dropdown">
                         <button class="btn btn-primary dropdown-toggle center-block" type="button" data-toggle="dropdown">Realizar acción
                         <span class="caret"></span></button>
                         <ul class="dropdown-menu">

                         <li>
                              <a href="/task/{{ $task->id }}">
                                  <i class="fa fa-eye"> Ver</i>
                              </a>
                          </li>


                           <li>
                                <a href="/task/{{ $task->id }}/edit">
                                    <i class="fa fa-edit"> Editar</i>
                                </a>
                            </li>

                           <li>
                                <a  data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-trash"> Eliminar</i>
                                </a>
                            </li>

                            


                         </ul>
                       </div>  
                   </td>
                  
                 </tr>
                 @endforeach
               </tbody>
            </table>

        </div>

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
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
            
          </div>
          
        </div>
      </div>
    </div>

</div>
@endsection
