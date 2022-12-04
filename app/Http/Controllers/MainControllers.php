<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Product\ProductService;
use Illuminate\Support\Facades\Session;

class MainControllers extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(SliderService $slider,MenuService $menu, ProductService $product)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
    }

    public function index()
    {
        return view('main', [
            'title' => "Shop COZA STORE",
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
            'products' => $this->product->get(),
        ]);
    }

    public function loadProduct(Request $request)
    {
        dd(1);
        $page = $request->input('page', 0);

        $result = $this->product->get($page);
        if (count($result) != 0 ) {
            $html = view('products.list', ['products' => $result])->render();
            return response()->json(['html' => $html]);
        }

        return response()->json(['html' => '']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $Contact = new Contact();
        $Contact->name = $request->Name;
        $Contact->email = $request->Email;
        $Contact->phone = $request->Phone;
        $Contact->content = $request->Content;
        $Contact->created_at = date('Y-m-d H:i:s');;
        $Contact->updated_at = date('Y-m-d H:i:s');;
        $Contact->save();
        Session::flash('contact', 'Liên Hệ Thành Công');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('contact', [
            'title' => 'Liên Hệ'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('infomation', [
            'title' => 'Thông Tin Về Shop'
        ]);
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
