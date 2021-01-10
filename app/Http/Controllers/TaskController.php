<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    public function store(Request $request){
        //dd($request->all());

        $this->validate($request, [
            'task'=>'required|max:100|min:5'
        ]);

        $t = new Task();

        if($request->taskid == null){
            //model obj -> db col = request var -> html element name
            $t->task=$request->task;
            $t->save();
        }else{
            $id = $request->taskid;
            $task = $request->task;
            $data = Task::find($id);
            $data->task=$task;
            $data->save();
        }

        //var = Model
        //$taskdata = Task::all();
        // dd($taskdata);

        // return view('tasks')->with('datatasks',$taskdata);
        return redirect() -> back();
    }

    public function markascompleted($id){
        $task = Task::find($id);
        if($task->iscompleted){
            $task->iscompleted=0;
        }
        else{
            $task->iscompleted=1;
        }
        $task->save();
        return redirect()->back();
    }
    public function delete($id){
        $task = Task::find($id);
        $task->delete();
        return redirect()->back();
    }
}
