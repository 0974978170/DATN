<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('admin.users.login', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
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
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {
            $user = DB::table('users as u')
                ->select('u.roles')
                ->where('u.email', $request->input('email'))
                ->get();
            $id = $user[0]->roles;
            Session::put('id', $id);
            return  redirect()->route('admin');
        }

        Session::flash('error', 'Email hoặc Password không đúng');
        return redirect()->back();
    }

    public function info(Request $request)
    {
        $id = $request->session()->all()['login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d'];
        $user = DB::table('users as u')
            ->select('u.*')
            ->where('u.id', $id)
            ->get();
        return view('admin.users.info', [
            'title' => 'Thông Tin Tài Khoản',
            'user' => $user[0]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'newpassword' => 'required',
            'confirmpassword' => 'required',
        ],
            [
                'newpassword.required' => 'Vui Lòng Nhập Mật Khẩu Mới',
                'confirmpassword.required' => 'Vui Lòng Nhập Xác Nhận Mật Khẩu',
            ]
        )->validate();
        try {
            if ($request->confirmpassword == $request->newpassword) {
                $id = $request->session()->all()['login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d'];
                $user = User::find($id);
                $user->password = Hash::make($request->confirmpassword);
                $user->save();
                Session::flash('success', 'Đổi Mật Khẩu Thành Công');
                return redirect()->back();
            } else {
                Session::flash('error', 'NewPassword và ConfirmPassword không trùng nhau');
                return redirect()->back();
            }
        } catch (\Exception $err) {
            Session::flash('error', 'Đổi Mật Khẩu Lỗi');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
