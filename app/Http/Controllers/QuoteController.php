<?php

namespace App\Http\Controllers;

use App\Alert;
use App\Mailus;
use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quote = Quote::paginate(20);

        return view('admin.pages.quote.index')
            ->with('quotes', $quote)
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
    public function unidid(){
        $token = "";
        $codes = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codes .= "abcdefghijklmnopqrstuvwxyz";
        $codes .= "0123456789";
        $max = strlen($codes);
        for($i=0; $i < 15; $i++){
            $token.= $codes[random_int(0, $max-1)];
        }
        return $token;
    }

    public function unid(){
        return uniqid($this->unidid(),false);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'yname' => 'required',
            'yemail' => 'required',
            'phone' => 'required',
            'interest' => 'required',
            'message' => 'required',
        ]);

        $data['ticket'] = $this->unid();
        if(Quote::create($data)){
            $email['person'] = $request->input('yemail');
            $email['company'] = $request->input('c_email');

            //create new notification
            $alert = array();
            $alert['table'] = 'quotes';
            $alert['table_id'] = Quote::orderBy('id', 'desc')->first()->id;
            $alert['type'] = 'quote';
            $alert['key'] = $this->unid();
            Alert::create($alert);

//            $mails = new Mailus(); todo uncomment for live server
//            $mails->prepMail($email); todo uncomment for live server

            return back()->withMessage('Your quote has been submitted and an email sent to you. You will be contacted shortly. Thank you.');
        }else{
            return back()->withErrors(array('message'=>'Unable to complete. Try again later.'))->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        //
    }
}
