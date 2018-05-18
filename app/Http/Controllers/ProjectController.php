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
        //$project->auteur = $project->user->user_id;
        dd($project->user->user_id);
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
        $project->auteur = Auth::user()->id;
        //Auth::user()->firsname->lastname;
        $project->nom = $request->nom;
        $project->descriptif = $request->descriptif;
        $project->save();
        //dump($parameter1); die;
       return redirect()->route('index.project')->with('success', 'Project was created !');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$user = Auth::user();
       // $user -> nom = $request ->
       // $project = $request->input('title');

        return view('projects.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view ('projects.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ('projects.edit');
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
        //
        return view ('projects.index');
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
