<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;

use DB;

class TaskController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware("auth");
    // }
    public function index()
    {
        //$tasks = Task::all();
        $tasks = Task::where ("user_id", auth::id())->get();

        return view("task", ["tasks"=> $tasks]);
    }

    public function delete($id)
    {
        Task::find($id)->delete();
        return back();

    }

    public function edit($id)
    {

        $task = Task::find($id);
        $title = "Edit Task";
        return view("edit", compact("task"));
    }

    public function update(Request $request, $id)
    {
        
        $task = Task::find($id);
        $task->title = $request->input('name');
        $task->description = $request->description;
        $task->save();
        return redirect("/task");
    }


    public function postForm(Request $request)
    {
        $this->validate($request,[
            "name" => 'required|min:3',
            "description" => 'min:10|max:15'

            ]);


        $name = $request->get("name");
        $description = $request->get("description");

        $task = new Task;
        $task->title = $name;
        $task->description = $description;
        $task->user_id = Auth::id();
        

        $task->save();
        return back();
    }
}
		