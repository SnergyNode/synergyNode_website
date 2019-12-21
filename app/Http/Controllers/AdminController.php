<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::paginate(20);

        return view('admin.pages.admin.index')
            ->with('users', $users)
            ->with('person', Auth::user());
    }


    public function create()
    {
        return view('admin.pages.admin.add')
            ->with('person', Auth::user());
    }


    public function store(Request $request)
    {


        //save a new user
        $data = $request->all();

//        return $data;
        $data['password'] = 'password';
        $data['unid'] = '';
        $data['active'] = true;
        //validate phone
        if(!is_numeric($request->input('phone'))){
            return back()->withErrors(array('message'=>"Only numbers allowed for phone. Check and retry!"))->withInput($request->input());
        }

        //validate email
        $request->validate([
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
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

        if(User::create($data)){
            return redirect(route('admin.index'))->withMessage('New Admin Created Successfully.');
        }else{
            return back()->withErrors(array('message'=>'Unable to Complete. Try again later'))->withInput($request->input());
        }

        //
    }


    public function show($id)
    {
        $admin = User::where('unid', $id)->first();
        if(!empty($admin)>0)
            return view('admin.pages.admin.show')
                ->with('person', Auth::user())
                ->with('admin',$admin);
        else
            return back();
    }

    public function profile($id)
    {
        $admin = User::where('unid', $id)->first();
        if(!empty($admin)>0)
            return view('admin.pages.admin.profile')
                ->with('person', Auth::user())
                ->with('admin',$admin);
        else
            return back();
    }


    public function edit($id)
    {
        $admin = User::where('unid', $id)->first();
        if(!empty($admin)>0)
            return view('admin.pages.admin.edit')
                ->with('person', Auth::user())
                ->with('admin',$admin);
        else
            return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $admin = User::where('unid',$id)->first();
        $errorz=null;

        if(!empty($admin)>0){
            if(Auth::user()->id===$admin->id){

                $data = $request->all();
                if ($request->hasFile('passport')) {




                    $allowedfileExtension = ['jpg', 'png', 'bmp', 'jpeg'];

                    $photo = $request->file('passport');

//            $filename = $photo->getClientOriginalName();


                    $extension = $photo->getClientOriginalExtension();

                    $extension = strtolower($extension);

                    $size = $photo->getClientSize();

                    if ($size > 600000) {
                        return back()->withErrors(array('message'=>"The passport is too large. Max 7MB! Compress and try again."));
                    }

                    $time = Carbon::now();

                    $check = in_array(strtolower($extension), $allowedfileExtension);

                    $filename = str_random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;

                    if ($check) {

                        $directory = 'data/img/' . date_format($time, 'Y') . '/' . date_format($time, 'm');
                        $data['passport'] = $directory . '/' . $filename;

                        $photo->storeAs($directory, $filename, 'public');


                        if(!empty($admin->passport)){
//                    @unlink(public_path($teacher->passport))
                            if(file_exists($admin->passport)){
                                unlink($admin->passport);
                            }
                        }

//              release memory... lol
//              ini_set('memory_limit', $limit);

                    } else {

                        return back()->withErrors(array('message' => 'Your passport must be of types : jpeg,bmp,png,jpg.'));

                    }
                }

                if(!empty($request->input('reset'))){

                    if(Auth::user()->unid === $admin->unid){
                        $data['password'] = $request->input('reset');
                    }else{
                        $errorz = array('message'=>"You do not have access to reset this users password.");
                    }
                }

                if($admin->update($data)){
                    return redirect(route('admin.index'))
                        ->withMessage('Update Successful')
                        ->withErrors($errorz);
                }else{
                    return back()->withErrors(array('message'=>"Unable to complete. Please try again."));
                }
            }else{
                return redirect(route('admin.index'))
                    ->withErrors(array('message'=>'Unable to complete. Access Denied.'));
            }
        }else{
            return redirect(route('admin.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::where('unid',$id)->first();
        if(!empty($admin) >0){


            if($admin->delete()){
                if(!empty($admin->passport)){
//                    @unlink(public_path($teacher->passport))
                    if(file_exists($admin->passport)){
                        unlink($admin->passport);
                    }
                }

                return redirect(route('admin.index'))
                    ->withMessage('Update Successful');

            }else{
                return back()->withErrors(array('message'=>"Unable to complete. Please try again."));
            }

        }else{
            return redirect(route('admin.index'));
        }
    }
}
