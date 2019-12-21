<?php

namespace App\Http\Controllers;

use App\Client;
use App\Project;
use App\Projectlist;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends MyController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Client::paginate(20);

        return view('admin.pages.client.index')
            ->with('users', $users)
            ->with('person', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.client.add')
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


        //save a new user
        $data = $request->all();

//        return $data;

        //validate phone
        if(!is_numeric($request->input('phone'))){
            return back()->withErrors(array('message'=>"Only numbers allowed for phone. Check and retry!"))->withInput($request->input());
        }

        //validate email
        $request->validate([
            'email' => 'required|unique:clients',
            'phone' => 'required|unique:clients',
        ]);

        if ($request->hasFile('passport')) {

            $allowedfileExtension = ['jpg', 'png', 'bmp', 'jpeg'];

            $photo = $request->file('passport');

//            $filename = $photo->getClientOriginalName();


            $extension = $photo->getClientOriginalExtension();

            $extension = strtolower($extension);

            $size = $photo->getClientSize();

            if ($size > 600000) {
                return back()->withErrors(array('message'=>"This passport is too large. Compress and try again"))->withInput($request->input());
            }

            $time = Carbon::now();

            $check = in_array(strtolower($extension), $allowedfileExtension);

            $filename = str_random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;

            if ($check) {

                $directory = 'data/img/' . date_format($time, 'Y') . '/' . date_format($time, 'm');
                $data['passport'] = $directory . '/' . $filename;

                $photo->storeAs($directory, $filename, 'public');

//              release memory... lol
//              ini_set('memory_limit', $limit);

                //send email of account creation on synergy

            } else {

                return back()->withErrors(array('message' => 'Your passport must be of types : jpeg,bmp,png,jpg.'))->withInput($request->input());

            }
        }

        if(Client::create($data)){
            return redirect(route('client.index'))->withMessage('New Client Created Successfully.');
        }else{
            return back()->withErrors(array('message'=>'Unable to Complete. Try again later'))->withInput($request->input());
        }

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }

    public function assign($id){
        $project = Project::where('id',$id)->first();
        return view('admin.pages.team.addClient')
            ->with('project', $project)
            ->with('users', Client::get());
    }

    public function projectBuild(Request $request, $id)
    {
        //validate that the team lead is selected

        $teamlead = $request->input('teamlead');
        $process = false;

        if(in_array($teamlead,$request->input('userID') )){


//            return $request->all();


            foreach ($request->input('userID') as $user){
                $team = new Projectlist();
                $team->client_id = $user;
                $team->project_id = $id;

                //for emails
                $pname = $team->project($id)->title;
                $ddate = $team->project($id)->due_date;
                $pclient = '';

                if($teamlead === $user){
                    $team->lead = true;
                }else{
                    $team->lead = false;
                }

                //check if team member exist and update or


                //store user
                $team->save();

                //send email to team members

                $uzer = Client::find($user);
                $object = [
                    'email'=>$uzer->email,
                    'subject'=>'Hello Client from Synergy Node!',
                ];
                $mdata = [
                    'pname'=>$pname,
                    'pclient'=>$pclient,
                    'date'=>$ddate,
                    'name'=>$uzer->first_name
                ];
                @$this->sendMails($object, $mdata, 'client');
            }

            return back()->withMessage('Client Added to Project.');

        }else{

            return back()->withErrors(array('errors'=>'Opps! team lead should be selected!'));

        }

    }
}
