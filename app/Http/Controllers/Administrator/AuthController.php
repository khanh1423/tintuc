<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $view = 'administrator.modules.auth.';

    public function ViewLogin()
    {
        return view($this->view . 'index');
    }

    public function PostLogin(Request $request)
    {
        $valdidateData = $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ],[
            'email.required'     => 'Vui lòng nhập Email',
            'password.required'  => 'Vui lòng nhập Password',
            
        ]);
 
        if (Auth::attempt($valdidateData)) {
            if(auth()->user()->status == 1){
                return redirect()->route('admin.index');
            }else {
                return redirect()->route('ViewLogin');
            }

        }else {
            return redirect()->route('ViewLogin');
        }
    }


    public function PostLogout()
    {
        Auth::logout();
        return redirect()->route('ViewLogin');
    }
}
