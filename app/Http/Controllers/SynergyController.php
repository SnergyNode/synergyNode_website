<?php

namespace App\Http\Controllers;

use App\Synergy;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SynergyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $synergy = Synergy::first();

        return view('admin.pages.site.index')
            ->with('synergy', $synergy)
            ->with('person', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $synergy = Synergy::first();
        if(empty($synergy)){
            if(Synergy::create()){
                return back()->with('synergy', Synergy::first())->withMessage('Settings Activated');
            }else{
                return $this->errored();
            }
        }else{
            return back()->withMessage('Settings Already Active');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Synergy  $synergy
     * @return \Illuminate\Http\Response
     */
    public function show(Synergy $synergy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Synergy  $synergy
     * @return \Illuminate\Http\Response
     */
    public function edit(Synergy $synergy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Synergy  $synergy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Synergy $synergy)
    {
        if(!empty($synergy)){
            $data = $request->all();
            if($synergy->update($data)){
                return back()->withMessage('Settings Info Updated');
            }else{
                return $this->errored();
            }
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Synergy  $synergy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Synergy $synergy)
    {
        //
    }

    public function errored(){
        return back()->withErrors(array('message'=>"Unable to process. Try again later."));
    }
}
