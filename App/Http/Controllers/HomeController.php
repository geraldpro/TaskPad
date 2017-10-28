<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task as Task;
use Auth;
use App\User as User;
use App\Buyer as Buyer;




class HomeController extends Controller{


/**View Task **/

public function index()
{

// Queries the Task table for data order by 'created_at' in ascending order

 // returns 'index' view by passing $data to index.
 return view('index');

}



public function buy()
{

 return view('buy');

}


public function postitem(Request $request)
{
  // Validates input data using specified rules
$this->validate($request, [

'name' => 'required|max:255',
'email' => 'required',
'phone' => 'required',
'address' => 'required',

  ]);

// Instantiates the Task model class
$item = new Buyer;

// Uses the task object to get or capture inputs
$item->name =  $request->input('name');
$item->email = $request->input('email');
$item->phone = $request->input('phone');
$item->address = $request->input('address');
$item->payoption = $request->input('payoption');
$item->save();

//redirects to index after inputs have been captured and saved
return redirect('/');


}


public function getpay(){

return view('pay');

}




//Tasks view

public function tasks(){


  if(Auth::check()){
 // Queries the Task table for data order by 'created_at' in ascending order
  $tasks = Task::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
// stores tasks data from database in an array
 //  $data['tasks'] = $tasks;
 // // returns 'index' view by passing $data to index.
 return view('tasks')->withTasks($tasks);


}  return redirect('/auth/login');

}



/**Add Task **/

// function to display the 'add' tasks form
public function getTask(){

  if(Auth::check()){
    return view('add');

  }

  return redirect('/auth/login');
}

// function to submit the 'add' tasks form
public function postTask (Request $request){

// Validates input data using specified rules
$this->validate($request, [

'name' => 'required|max:255',
'desc' => 'required',


	]);

 
// Instantiates the Task model class
$task = new Task;

// Uses the task object to get or capture inputs
$task->title =  $request->input('name');
$task->description = $request->input('desc');
$task->user_id = Auth::user()->id;
$task->save();

//redirects to index after inputs have been captured and saved
return redirect('/tasks');
}


/**Delete Task **/

// delete function with an id
public function delete($id){

  if(Auth::check()){
// Queries the Task table for $id and stores in $task_to_delete 
     $task_to_delete = Task::find($id);
  // deletes captured task by id 
     $task_to_delete->delete();
  // redirectss to previous URL or page
     return redirect()->back();
  }

  return redirect('/auth/login');
}




/**Payment process selection**/ 

//public function getPay($id){


//$buyer = Buyer::find($id);

///return view('pay')->with(array('buyers'=>$buyer ));




//}



  

/**Update Task **/ 

public function getEdit($id){

if(Auth::check()){

$task = Task::find($id);

return view('edit')->with(array('tasks'=>$task ));

}

return redirect('/auth/login');


}


public function postEdit(Request $request, $id){

$task= Task::find($id);

$task->title =  $request->input('name');
$task->description = $request->input('desc');
$task->save();
 
return redirect('/tasks');

}

}



