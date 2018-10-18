<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
	public function Loguserview(){
    if(Auth::check()){

        return redirect()->route('cbnoptions');
    }else{
    		return view ('loguserview');
      }
    }
    public function PostLogin(Request $request){
      $remember = true;
    	/*  User::create( [
                  'username' => $request->username,
                  'password' => bcrypt($request->password),
                
               ]);
    		 */
    		
        	if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $remember)) {
        		  return redirect()->route('cbnoptions');
        				}else{  
        					return back();
        				} 
    



    } 




    public function FgView(){
      if(Auth::check()){

        return redirect()->route('cbnoptions');
    }else{
       // return view ('loguserview');
            return view('fgview');
      }

    }
}
