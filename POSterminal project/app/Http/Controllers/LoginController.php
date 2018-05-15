<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
    * Redirect to login page.
    */
    public function showLogin()
    {
        return view('login');
    }

    /**
    * Login user and redirect to first page, or throw errors.
    */
    public function doLogin()
    {
        //rules for email and password
        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|alphaNum|min:3'
        );

        $validator = Validator::make(Input::all(), $rules);

        //data from input files
        $userdata = array(
            'email'     => Input::get('email'),
            'password'  => Input::get('password')
        );

        // attempt to do the login
        if (Auth::attempt($userdata)) {
            // validation successful
            return redirect('statistics');
            
        } else {        
            return redirect('login')
                ->withErrors($validator->errors()->add('field', 'Email or password are incorrect.')) 
                ->withInput(Input::except('password'));
                // validation not successful, sending errors
                return redirect('login');

        }
    }

    /**
    * Logout user.
    */
    public function doLogout()
    {
        Auth::logout(); 
        return redirect(url('login')); 
    }
    
    /**
    * Redirect to register page.
    */
    public function showRegister()
    {
        return view('register');
    }
    
    /**
    * Register user.
    */
    public function doRegister()
    {
        //rules for email and password
        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|alphaNum|min:3'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
        // if the validator fails - required form is not valid, redirect back to the form
            return redirect('login')
                ->withErrors($validator) 
                ->withInput(Input::except('password'));
        
        } else {
            // form is valid, create user
            $userdata = array(
                'name'      => Input::get('name'),
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );

            $user = new User();
            $user->name = $userdata['name'];
            $user->password = Hash::make($userdata['password']);
            $user->email = $userdata['email'];
            $user->save();
                
            return redirect('login');
        }
    }

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
}
