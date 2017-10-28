@extends('layout.default')
@section('content')

<div class="container">
<div class="panel panel-info">
            <div class="panel-heading">
                <strong>CREATE A CHAT</strong>
            </div>

    <div class="panel-body">
        <!-- Display Validation Errors -->
       
        <!-- New Task Form -->
        <form action="{{ route('chat') }}" method="POST" class="form-horizontal" >

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Chat</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" placeholder="Input task title" class="form-control">
                </div>
            </div>

            <!-- Task Description -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Message</label>

                <div class="col-sm-6">
                    <input type="text" name="desc" id="task-desc" placeholder="Input task description" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default btn-success">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
            <input type="hidden" value={{Session::token()}} name="_token" />
        </form>
    </div>
    </div>
    </div>







@endsection