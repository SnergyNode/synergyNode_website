<?php

namespace App\Http\Controllers;

use App\Alert;
use App\Alerted;
use App\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsoleController extends Controller
{
    public function dashboard(){
        return view('admin.pages.dashboard.index')
            ->with('visits', Visit::where('time','>=',strtotime('today'))->get())
            ->with('person',Auth::user());
    }


    public function viewAlert(){

    }
}
