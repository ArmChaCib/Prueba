<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tasks = Task::all();
       return view('task.index',['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'start' => 'required',
            'end' =>'required',
            ]);
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->start=$request->start;
        $task->end=$request->end;
        $task->user = "Armando";
        $task->save();
        return redirect('task')->with('message','Post has been updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
               
               // return to 404 page
               if(!$task){
                 abort(404);
               }
               
               // display the article to single page
               return view('task.detail')->with('task',$task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
                       
                       // return to 404 page
                       if(!$task){
                         abort(404);
                       }
                       
                       // display the article to single page
                       return view('task.edit')->with('task',$task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
                    'title'=>'required',
                    'description'=>'required',
                    'start' => 'required',
                    'end' =>'required',
                    ]);
                $task = Task::find($id);
                $task->title = $request->title;
                $task->description = $request->description;
                $task->start=$request->start;
                $task->end=$request->end;
                $task->user = "Armando";
                $task->save();
                return redirect('task')->with('message','Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $task = Task::find($id);
              $task->delete();
              return redirect('task')->with('message','data hasbeen deleted!');
    }
}
