<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('roles', 2)
            ->get();
        if ($users) {
            return view('admin.users.list', [
                'title' => 'Danh Sách User',
                'users' => $users
            ]);
        } else {
            return false;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add', [
            'title' => 'Thêm User mới'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'inlineRadioOptions'   => 'required',
            'phoneNumber'   => 'required',
            'email'   => 'required',
            'password'   => 'required',
        ],
            [
                'firstName.required' => 'Vui Lòng Nhập Họ',
                'lastName.required' => 'Vui Lòng Nhập Tên',
                'phoneNumber.required' => 'Vui Lòng Nhập Số Điện thoại',
                'email.required' => 'Vui Lòng Nhập Email',
                'password.required' => 'Vui Lòng Nhập password',
            ]
        )->validate();
        try {
            $User = new User();
            $User->name = $request->firstName . ' ' . $request->lastName;
            $User->email = $request->email;
            $User->password = Hash::make($request->password);
            $User->first_name = $request->firstName;
            $User->last_name = $request->lastName;
            $User->roles = 2;
            $User->gender = $request->inlineRadioOptions;
            $User->phone_number = $request->phoneNumber;
            $User->remember_token = Str::random(10);
            $User->created_at = date('Y-m-d H:i:s');
            $User->updated_at = date('Y-m-d H:i:s');
            $User->save();
            Session::flash('success', 'Thêm User mới thành công');
            return redirect()->back();
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm User LỖI');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $users = User::where('id', (int) $user)
            ->get();
        if ($users) {
            return view('admin.users.edit', [
                'title' => 'Chỉnh Sửa User',
                'users' => $users[0]
            ]);
        } else {
            return false;
        }
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
    public function update(Request $request, $user)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'inlineRadioOptions'   => 'required',
            'phoneNumber'   => 'required',
            'email'   => 'required',
            'password'   => 'required',
        ],
            [
                'firstName.required' => 'Vui Lòng Nhập Họ',
                'lastName.required' => 'Vui Lòng Nhập Tên',
                'phoneNumber.required' => 'Vui Lòng Nhập Số Điện thoại',
                'email.required' => 'Vui Lòng Nhập Email',
                'password.required' => 'Vui Lòng Nhập password',
            ]
        )->validate();
        try {
            $User = User::find($user);
            $User->name = $request->firstName . ' ' . $request->lastName;
            $User->email = $request->email;
            $User->password = Hash::make($request->password);
            $User->first_name = $request->firstName;
            $User->last_name = $request->lastName;
            $User->roles = 2;
            $User->gender = $request->inlineRadioOptions;
            $User->phone_number = $request->phoneNumber;
            $User->remember_token = Str::random(10);
            $User->updated_at = date('Y-m-d H:i:s');
            $User->save();
            Session::flash('success', 'Sửa User Thành Công');
            return redirect()->back();
        } catch (\Exception $err) {
            Session::flash('error', 'Sửa User LỖI');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::where('id', $request->input('id'))->first();
        if ($user) {
            $user->delete();
            return response()->json([
                'error' => false,
                'message' => 'Xóa user thành công'
            ]);
        }

        return response()->json(['error' => true ]);
    }

    public function changePassword(Request $request)
    {
        return view('admin.users.change_password', [
            'title' => 'Đổi mật khẩu',
        ]);
    }

    public function statistics()
    {
        $count_sum = DB::table('carts as c')->where('active_flag', 1)->select(DB::raw('SUM(c.pty * c.price) as total_sales'))->get();
        return view('admin.statistics.index', [
            'title' => 'Thống Kê Doanh Thu',
            'total_revenue' => $count_sum[0]->total_sales,
        ]);
    }

    public function views(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'startDate' => 'required',
            'endDate' => 'required'
        ],
            [
                'startDate.required' => 'Vui Lòng Nhập Ngày Bắt Đầu',
                'endDate.required' => 'Vui Lòng Nhập Ngày Kết Thúc'
            ]
        )->validate();

        if ($request->startDate > $request->endDate) {
            $validator = \Validator::make([], []);

            $validator->errors()->add('error', 'Vui Lòng Chọn Khoảng Thời Gian Phù Hợp');

            throw new \Illuminate\Validation\ValidationException($validator);
        } else if ($request->startDate == $request->endDate) {
            $key = explode('/', $request->startDate);
            $count = DB::table('carts')
                ->whereDate('created_at', $key[2] . '-' . $key[0] . '-' . $key[1])
                ->where('active_flag', 1)
                ->select(DB::raw('SUM(carts.pty * carts.price) as total'))->get();
            $request->endDate = null;
        } else {
            $key1 = explode('/', $request->startDate);
            $time1 = $key1[2] . '-' . $key1[0] . '-' . $key1[1];
            $key2 = explode('/', $request->endDate);
            $time2 = $key2[2] . '-' . $key2[0] . '-' . $key2[1];
            $count = DB::table('carts')
                ->whereDate('created_at', '>=', $time1)
                ->whereDate('created_at', '<=', $time2)
                ->where('active_flag', 1)
                ->select(DB::raw('SUM(carts.pty * carts.price) as total'))->get();
        }
        $count_sum = DB::table('carts as c')->where('active_flag', 1)->select(DB::raw('SUM(c.pty * c.price) as total_sales'))->get();
        return view('admin.statistics.view', [
            'title' => 'Thống Kê Doanh Thu',
            'total_revenue' => $count_sum[0]->total_sales,
            'count' => $count[0]->total,
            'times' => $request
        ]);

    }
}
