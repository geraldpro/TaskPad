@extends('layout.default')

@section('content')
    <!-- Create Task Form... -->

    @if (count($tasks) > 0)
    <div class="container">

        <div class="panel panel-info">
            <div class="panel-heading">
                <strong>MY RECENT TASKS LIST</strong>
            </div>
           <div class="panel panel-default">
                  <!-- Default panel contents -->
                     <!-- Table -->
       <table class="table table-striped">
        <thead>
        <tr>
        <th>TITLE</th>
        <th>DESCRIPTION</th>
        <th>TIME</th>
        <th>ACTION</th>

      </tr>
      </thead>
    
                   
     </div>
           

    <tbody>
     

     @foreach ($tasks as $task)
        
        
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div><strong>{{ $task->title }}</strong></div> 
                                </td>

                                <!-- Task Description -->
                                <td class="table-text">
                                    <div>{{ $task->description }}</div>
                                </td>

                                <!-- Delete Button -->
                              <td>
                               <div>{{ $task->created_at->diffForHumans() }}</div></td>

                               <td>
                    <a class="btn btn-success" href="{{ route('edittask', ['id' => $task->id]) }}" role="button">Edit</a>
                    <a class="btn btn-danger" href="{{ route('delete', ['id' => $task->id]) }}" role="button">Delete</a>
                             
                               </td>
                            </tr>
    
    @endforeach        
                    
                       
    </tbody>
             
            </table>
      
        </div>
                </div>
      @else
<div class="container">
         <div class="jumbotron">
          <h1 class="text-uppercase">Hello {{ Auth::user()->name }}</h1>
                 <p>You have not created a task yet. Click the button bellow to get started</p>
         <p><a class="btn btn-success btn-lg" href="{{ url('/add') }}" role="button">Create Task</a></p>
        </div>
      </div>

    @endif
@endsection
