<?php

namespace App\Http\Controllers;

use App\Servic;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servic = Servic::paginate(20);

        return view('admin.pages.service.index')
            ->with('servic', $servic)
            ->with('person', Auth::user());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.service.add')
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
        $len = strlen($request->input('intro'));
        if($len > 280 || $len < 70 ){
            return redirect(route('servic.create'))->withInput($request->input())
                ->withErrors(array('message'=>"Service Intro Length Error! Use max character: 250, min character: 150."));
        }else{
            $data = $request->all();
            $data['unid'] = '';
            $data['status'] = '';

            //validate live url
            if(Servic::where('live_url', $request->input('live_url'))->get()->count() > 0){
                return back()->withErrors(array('error'=>'Live Url "'.$request->input('live_url').'" already exist'))->withInput($request->input());
            }

            if(Servic::create($data)){
                return redirect(route('servic.index'))->withMessage('New Service Created');
            }else{
                return back()->withErrors(array('message'=>"This passport is too large. Compress and try again"));
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servic  $servic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Servic::where('unid', $id)->first();
        if(!empty($service))
            return view('admin.pages.service.show')
                ->with('person', Auth::user())
                ->with('service',$service);
        else
            return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servic  $servic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Servic::where('unid', $id)->first();
        if(!empty($service))
            return view('admin.pages.service.edit')
                ->with('person', Auth::user())
                ->with('service',$service);
        else
            return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servic  $servic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $len = strlen($request->input('intro'));
        if($len > 280 || $len < 70 ){
            return back()->withErrors(array('message'=>"Service Intro Length Error! Use max character: 250, min character: 150."));
        }else{

            $servic = Servic::where('unid', $id)->first();
            if(!empty($servic)){

                //validate live url

                $data = $request->all();
                $data['unid'] = '';
                $data['status'] = '';

                if($servic->update($data)){
                    return redirect(route('servic.edit', $servic->unid))->withMessage('Service Updated');
                }else{
                    return back()->withErrors(array('message'=>"Unable to complete request. Try again later!"));
                }
            }else{
                return back();
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servic  $servic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servic $servic)
    {
        //
    }
}
