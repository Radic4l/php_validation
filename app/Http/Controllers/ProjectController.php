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

        return view ('projects.index')->with('projects', $projects);
    }

    public function showProject($id)
    {
        $project = Project::find($id);

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
        $this->validate($request, [
            'nom' => 'required',
            'descriptif' => 'required',
        ]);
        //var_dump($request->isMethod('post')); die;
        //$parameters = $request->only(['title', 'description',  Auth::user()]);
        //$parameter1 = $request->except(['_token']);
        //$parameter2 = $request->auteur;

        //Project::create($parameter);

        $project =  new Project();   //var_dump($project->User); die;
        $project->user_id = Auth::user()->id;
        //Auth::user()->firsname->lastname;
        $project->nom = $request->nom;
        $project->descriptif = $request->descriptif;
        $project->save();
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
        if($project->user_id === Auth::user()->id){

            $data = [
                "project" => $project,
            ];
            return view ('projects.edit', $data);

        }

        return redirect()->route('index.project')->with('error', 'Vous n\'êtes pas l\'auteur de ce projet ! IMPOSTEUR !!!');

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
        $project = Project::find($id);

        if($project->user_id === Auth::user()->id){
            $project -> nom = $request->nom;
            $project -> descriptif = $request->descriptif;
            //dd($project);
            $project ->save();
            return redirect()->route('index.project')->with('success', 'Project was updated !');
        }
        return redirect()->route('index.project')->with('error', 'Le projet n\'a pas été mis à jour!');


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
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('index.project')->with('success', 'Project was deleted !');
    }
}
