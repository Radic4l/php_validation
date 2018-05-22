<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Link;
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
        //$data = ['projects' => $projects];
        //var_dump(Project::all()); die;

        return view ('projects.index')->with('projects', $projects);
    }

    public function showProject($id)
    {
        $project = Project::find($id);
        //$project->user_id = $project->user->user_id;
        //dd($project->user->user_id);
        $data = [
          'project' => $project,
        ];
        return view('projects.showProject', $data);
    }

    public function createProject()
    {
       return view ('projects.create');
    }

    public function valid(Request $request)
    {
        //var_dump($request->isMethod('post')); die;
        //$parameters = $request->only(['title', 'description',  Auth::user()]);
        //$parameter1 = $request->except(['_token']);
        //$parameter2 = $request->auteur;

        //Project::create($parameter);

        $project =  new Project();
        //var_dump($project->User); die;
        $project->user_id = Auth::user()->id;
        //Auth::user()->firsname->lastname;
        $project->nom = $request->nom;
        $project->descriptif = $request->descriptif;
        $project->save();
        //dump($parameter1); die;
       return redirect()->route('index.project')->with('success', 'Project was created !');
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
        $data = [
            "project" => $project,
        ];
        return view ('projects.edit', $data);
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
        //$project = Project::find($id);
        //$project->user_id = Auth::user()->id;
        //$project -> nom = $request->nom;
        //$project -> descriptif = $request->descriptif;
        //dd($project);
        //$project ->save();
        return redirect()->route('index.project')->with('success', 'Project was updated !');
        //return redirect(route('projects.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view ('projects.index');
    }
}
