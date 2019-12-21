<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

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

    public function signin(Request $request){
//        return $request->all();
        $access = trim($request->input('access'));
        $password = trim($request->input('password'));

        if(filter_var($access, FILTER_VALIDATE_EMAIL)){
            if (Auth::attempt(['email' => $access, 'password' => $password])) {
                return redirect(route('admin.dashboard'));
            }
            else {
                return back()->withErrors(array('access' => 'Invalid credentials given'));
            }
        }else{
            if (Auth::attempt(['username' => $access, 'password' => $password])) {
                return redirect(route('admin.dashboard'));
            }
            else {
                return back()->withErrors(array('access' => 'Invalid credentials given'));
            }
        }

    }

    public function lostpass(){
        return view('admin.auth.passwords.email');
    }
    public function logout(){
        Auth::logout();
        return redirect(route('admin.login'));
    }

    public function passreset(Request $request){

        //fetch user with email
        $user = User::where('email', $request->input('email'))->first();

        //generate 1 time reset token
        if(!empty($user)){
            $token = $user->makeToken(120);
        }

        //set  with 1hr lifespan
        $cd = time() + (60 * 60);

        $set['countdown_pass'] = $cd;
        $set['reset_toke'] = $token;
        $user->update($set);

        $email = $request->input('email');
        $name = $user->setName();
        $link = route('email.resetpassword',$token);
        $message = $name. ", Please follow the bellow to rest your login credentials.";

        $mail['email'] = $email;

        //send email
//        return $mail;
        $object = [
            'email'=>$email,
            'message'=>$message,
            'link'=>$link,
            'subject'=>'Password Reset Request',
        ];
        MailusController::mailsender($object);

        return back()->withMessage('An email has been sent to ' . $request->input('email') .' to reset your password');
    }

    public function PasswordReset($token){
        $user = User::where('reset_toke', $token)->first();

        if(!empty($user)){
            //get validity
            if(time() < $user->countdown_pass){
                // send to reset page
                return view('admin.auth.passwords.reset')->with('token', $token);
            }else{
                return redirect()->route('admin.login');
            }
        }else{
            return redirect()->route('admin.login');
        }
    }

    public function passwordRectify(Request $request, $token){

        if(!empty($token)){

            $user = User::where('email', $request->input('email'))->first();
            $user_valid = User::where('reset_toke', $token)->first();

            if($user->id === $user_valid->id){
                if($request->input('password') === $request->input('password_confirmation')){
                    $set['password'] = $request->input('password');
                    $set['reset_toke'] = null;
                    $user->update($set);

                    return redirect()->route('password.request')->withMessage('Your password reset was successful. Try login in again!');
                }
            }
        }

        return redirect()->route('admin.login');
    }
}
