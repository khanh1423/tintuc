<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Str;


class UserController extends Controller
{

    private $view  = 'administrator.modules.user.';

    private $route = 'admin.user.index';

    /**
     * @param  
     * @return 
     */
    public function index(){
        $data   = User::orderBy('id', 'ASC')->get();
        return view($this->view . 'index', compact('data'));
    }

    /**
     * @param  
     * @return 
     */
    public function create(){
        return view($this->view . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valdidateData = $request->validate([
            'name'                  => 'required',
            'phone'                 => 'required',
            'email'                 => 'required|unique:users',
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ],[
            'name.required'                     => 'Vui lòng nhập tên người dùng',
            'phone.required'                    => 'Vui lòng nhập số điện thoại',
            'email.unique'                      => 'Email này đã tồn tại',
            'email.required'                    => 'Vui lòng nhập email',
            'password.required'                 => 'Vui lòng nhập mật khẩu',
            'password.min'                      => 'Mật khẩu có 6 kí tự',
            'password.confirmed'                => 'Xác thực mật khẩu không khớp',
            'password_confirmation.required'    => 'Vui lòng nhập lại mật khẩu',
            
        ]);
        
        $data = $request->except('_token', 'password_confirmation');
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;
        $data['password'] = bcrypt($request->password);

        User::insert($data);

        return redirect()->route($this->route);

    }


    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->route('admin.user.index');
    }
}
