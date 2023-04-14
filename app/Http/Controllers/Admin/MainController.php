<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $count_product = DB::table('products')->count();
        $count_contact = DB::table('contacts')->count();
        $count_cart = DB::table('carts')->where('active_flag', 1)->count();
        $count_sum = DB::table('carts as c')->where('active_flag', 1)->select(DB::raw('SUM(c.pty * c.price) as total_sales'))->get();
        $time = getdate()['weekday'] . ',' .getdate()['mday'] . ' ' . getdate()['month'] . ' ' . getdate()['year'];
        $customer = DB::table('customers')->orderByDesc('created_at')->get();
//        $customer = DB::table('customers')->whereDate('created_at', Carbon::today ())->get();
        return view('admin.home', [
            'title' => 'Trang Quản Trị',
            'count_product' => $count_product,
            'count_contact' => $count_contact,
            'count_cart' => $count_cart,
            'total_revenue' => $count_sum[0]->total_sales,
            'time' => $time,
            'customers' => $customer
        ]);
    }
}
