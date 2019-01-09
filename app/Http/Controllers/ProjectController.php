<?php

namespace App\Http\Controllers;

use App\project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }


    public function index()
    {
        $projects = Project::where('owner_id', auth()->id())->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view('projects.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        // $project = new Project;
        // $project->title = request('title');
        // $project->description = request('description');
        // $attribute = (['owner_id'=> auth()->id()]);

        // $project->save($attribute);
        $attribute = request()->validate([
            'title' => ['required'],
            'description' => ['required']
        ]);
        $attribute['owner_id'] = auth()->id();
        Project::create($attribute);
        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        
        // $this->authorize('view', $project);
        if($project->owner_id != auth()->id()){
            abort(403);
        }

        return view('projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $project = Project::findorfail();
        $project = Project::findorfail($id);
         if($project->owner_id != auth()->id()){
            abort(403);
        }

        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
      $project = Project::findorfail($id);
      $project->title = request('title');
      $project->description = request('description');
      $project->save();
      return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
              Project::findorfail($id)->delete();
                    
              return redirect('/projects');


    }
}
