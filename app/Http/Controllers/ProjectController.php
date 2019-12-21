<?php

namespace App\Http\Controllers;

use App\Project;
use App\Team;
use Illuminate\Http\Request;
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
        $project = Project::paginate(20);

        return view('admin.pages.project.index')
            ->with('projects', $project)
            ->with('person', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.project.add')
            ->with('person', Auth::user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        return $request->all();


        if(empty($request->input('details'))){
            return back()->withInput($request->input())->withErrors(array('errors'=>'Details Field is Empty'));
        }

        //create new project
        $data['title'] = $request->input('title');
        $data['type'] = $request->input('type');
        $data['priority'] = $request->input('priority');
        $data['cost'] = $request->input('cost');
        $data['start_date'] = strtotime($request->input('start_date'));
        $data['due_date'] = strtotime($request->input('due_date'));
        $data['details'] = $request->input('details');

        Project::create($data);

        return redirect()->route('project.index')->withMessage('New Project Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.pages.project.show')
            ->with('project', $project)
            ->with('teams', Team::where('project_id', $project->id)->get())
            ->with('person', Auth::user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.pages.project.manage')
            ->with('project', $project)
            ->with('person', Auth::user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
