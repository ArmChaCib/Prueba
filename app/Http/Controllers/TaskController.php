<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Comments;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idProject)
    {
       $tasks = Task::where('project_id',$idProject)->get();
       $comments = Comments::where('project_id',$idProject)->get();
       return view('projects.task.index')->with(compact('tasks'))->with(compact('idProject'))->with(compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idProject)
    {

        return view('projects.task.create',compact('idProject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$idProject)
    {
        
        Task::create($request->all());
        return redirect('projects/show/'.$idProject.'/tasks');
        // return redirect('projects/show/{{$idProject}}/tasks',compact('tasks'),compact('idProject'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idProject,$id)
    {
        $task = Task::find($id);

        return view('projects.task.detail',compact('task'),compact('idProject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idProject,$idTask)
    {
        $task = Task::find($idTask);
                       
       // return to 404 page
       if(!$task){
         abort(404);
       }
       
       // display the article to single page
       return view('projects.task.edit',compact('task'),compact('idProject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idProject,$idTask)
    {
        $task = Task::find($idTask);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->start=$request->start;
        $task->end=$request->end;
        $task->save();
        return redirect('projects/show/'.$idProject.'/tasks');

    }


    public function taskFinished(Request $request, $idProject,$idTask)
    {
        $task = Task::find($idTask);
        $task->status = true;
        $task->save();
        return redirect('projects/show/'.$idProject.'/tasks');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idProject,$idTask)
    {
       $task = Task::find($idTask);
       $task->delete();
       return redirect('projects/show/'.$idProject.'/tasks');
    }
}
