<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreProject;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\Comments;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $projects = Project::all();
       return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.createProject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProject $request)
    {

        Project::create($request->all());
        return redirect('projects')->with('message','Post has been inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasks = Task::where('project_id',$id)->get();
        $project = Project::find($id);
        return view('projects.detailProject',compact('project','tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
                       
       
       // display the article to single page
       return view('projects.editProject')->with('project',$project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProject $request, $id)
    {
        $project = Project::find($id);
        $project->title = $request->title;
        $project->description = $request->description;
        $project->start=$request->start;
        $project->end=$request->end;
        $project->save();
        return redirect('projects')->with('message','Post has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $project = Project::find($id);
       Task::where('project_id',$id)->delete();
       Comments::where('project_id',$id)->delete();
       $project->delete();
       return redirect('projects')->with('message','data hasbeen deleted!');
    }
}

