<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categs')->get();
        $products = DB::table('products')->get();
        $userID = \Auth::id();

        return view('pos.frontend.frontend', [
            'categories' => $categories,
            'products' => $products,
            'userID' => $userID
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
        $paid = $request->get('payment');
        $items = $request->get('items');
        if($request->get('code_used')){
            $discountCode = $request->get('code_used');
        }else{
            $discountCode = 'none';
        }
        $order = new Order([
            'user_id' => $request->get('user_id'),
            'item_ammount' => $items,
            'code_used' => $discountCode,
            'total' => $request->get('total'),
            'tax' => $request->get('tax')
        ]); 

        $order->save();

        $arr = explode(',', $items);
        $products = Product::findMany($arr);

        $compare = $request->get('code_used');

        $percent = DB::table('coupons')
            ->where('code', '=', $compare)
            ->first();

        $change = $paid - $request->get('total');

        return view('pos.frontend.receipt', [
            'order' => $order,
            'products' => $products,
            'percent' => $percent,
            'change' => $change
        ]);
    }

    public function check(Request $request)
    {
        $compare = $request->get('code');

        $check = DB::table('coupons')
            ->where('code', '=', $compare)
            ->first();

        if($check){
            return $check->percentage;
        }else{
            return 'false';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
