<?php

namespace App\Http\Controllers;

use App\Project;
use App\Team;
use App\User;
use Illuminate\Http\Request;

class TeamController extends MyController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $project = Project::where('id',$id)->first();
        return view('admin.pages.team.addPerson')
            ->with('project', $project)
            ->with('users', User::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //validate that the team lead is selected

        $teamlead = $request->input('teamlead');
        $process = false;

        $project = Project::find($id)->first();

        if(empty($project)){
            return redirect()->route('project.index')->withErrors(array('errors'=>'Opps! Project Not Found!'));
        }

        if(in_array($teamlead,$request->input('userID') )){


//            return $request->all();


            foreach ($request->input('userID') as $user){

                //check if user exist

                    if(!$project->inTeam($user)){

                        $team = new Team();
                        $team->user_id = $user;
                        $team->project_id = $id;

                        //for emails
                        $pname = $team->project($id)->title;
                        $ddate = $team->project($id)->due_date;
                        $pclient = $team->project($id)->client('setName');

                        if($teamlead === $user){
                            $team->team_lead = true;
                        }else{
                            $team->team_lead = false;
                        }

                        //check if team member exist and update or


                        //store user
                        $team->save();

                        //send email to team member
                        $uzer = User::find($user);

                        $object = [
                            'email'=>$uzer->email,
                            'subject'=>'Hi Teammate from Synergy Node!',
                        ];
                        $mdata = [
                            'pname'=>$pname,
                            'pclient'=>$pclient,
                            'date'=>$ddate,
                            'name'=> $uzer->first_name,
                        ];
                        @$this->sendMails($object, $mdata, 'team');

                    }


                }

            return back()->withMessage('Team Added to Project.');

        }else{

            return back()->withErrors(array('errors'=>'Opps! One team lead should be selected!'));

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::where('id',$id)->first();


        return view('admin.pages.team.managePerson')
            ->with('project', $project)
            ->with('teams', $project->teams);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }

    public function pop($id){
        $team = Team::where('id', $id)->first();
        $team->delete();
        return back();
    }
}
