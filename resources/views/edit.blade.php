@extends('layout.default')

@section('content')

    <!-- Bootstrap Boilerplate... -->
<div class="container">
<div class="panel panel-info">
            <div class="panel-heading">
                <strong>EDIT TASK</strong>
            </div>

    <div class="panel-body">
        
        <!-- Display Validation Errors -->
       
        <!-- New Task Form -->
        <form action="{{ route('edittask', ['id' => $tasks->id]) }}" method="POST" class="form-horizontal" >

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" value="{{ $tasks->title }} " class="form-control">
                </div>
            </div>

            <!-- Task Description -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Description</label>

                <div class="col-sm-6">
                    <input type="text" name="desc" id="task-desc" value="{{ $tasks->description }} " class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Update Task
                    </button>
                </div>
            </div>
            <input type="hidden" value={{Session::token()}} name="_token" />
        </form>
    </div>
</div>
</div>

    <!-- TODO: Current Tasks -->
@endsection