@extends('layouts.app')   
   @section('title')
   Todos List
   @endsection


   @section('content')
          <div class="row justify-content-center">
              <div class="col-md-8">
                    <h1 class="text-center ">Todos Page</h1>
                </ul>
               <div class="card cared-default">
                   <div class="card-header">
                       Todos
                   </div>
                   <div class="card-body">
                       
                        <ul class="list-group">
                         @foreach($todos as $todo)
                             <li class="list-group-item">
                             {{$todo->name}}
                            @if($todo->completed)
                            <a href="#"  class="btn btn-success btn-sm float-right">Completed</a>
                             
                            @endif
                            @if(!$todo->completed)
                            <a href="./todos/{{$todo->id}}/complete"  class="btn btn-warning btn-sm float-right">Remaining</a>
                             
                            @endif
                             <a href="./todos/{{$todo->id}}"  class="btn btn-primary btn-sm float-right mr-2">View</a>
                            
                            </li>
                        
                          @endforeach
                   </div>
               </div>

              </div>
          </div>
    @endsection