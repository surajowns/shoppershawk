<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Session;

class LoginController extends Controller
{
    public function validateUser(Request $request)
    {
        
        // dd($request->all());
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                    'email' => 'required',
                    'password'	=> 'required',
            ]);

            if ($validator->fails()) {
                    return redirect('admin/login')
                            ->withInput()
                            ->withErrors($validator);
            }  
            
            try{
                
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials, $request->has('remember')) ){
               
                if (Auth::User()['role']==2)
                { 
                    $user=Auth::User();
                    Session::put('logid',Auth::User()['id']) ; 
                  
                    return redirect('/home')->with('success', 'Login Successfully');
                    
                }
                else{
                    Auth::logout();
                    return back()->with('failed', 'Invalid Credential.');
                }
               
                
            }else{
                Auth::logout();
                return back()->with('failed', 'Invalid Credential.');
            }
           }catch(\Exception $e){
            return back()->with('failed', $e->getMessage());

         }

        }
    }
}
