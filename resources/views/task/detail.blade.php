@extends('layouts.barraDeNavegacion')

@section('content')
{{ Session::get('message') }}
<div class="container">

    <div class="row">

        
        <div class="col-xs-12 margin-top-10">

            <table class="table table-bordered">

               <thead>
                 <tr>
                   <th># de tarea</th>
                   <th>Nombre de tarea</th>
                   <th>Descripción de tarea</th>
                   <th>Usuario</th>
                   <th>Fecha de inicio</th>
                   <th>Fecha de fin</th>
                 </tr>
               </thead>

               <tbody>
                 <tr>

                 

                   <td>{{ $task->id }}</td>
                   <td>{{$task->title}}</td>
                   <td>{{$task->description}}</td>
                   <td>{{$task->user}}</td>
                   <td>{{$task->start}}</td>
                   <td>{{$task->end}}</td>

              
                  
                 </tr>
               </tbody>
            </table>

        </div>

    </div>
    
 <div class="col-xs-12   ">
     <h3>
         <a href="/task" type="button" class="btn btn-success pull-right">
             <i class="fa  fa-home"></i>
             Regresar
         </a> 
     </h3>    
 </div>

</div>
@endsection
