<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function create($no)
    {
        $room = Room::where('no', $no)
            ->with(['orders' => function($query) {
                return $query->where('check_out_at', '>=', Carbon::today());
            }])
            ->firstOrFail();

        return view('orders.create', compact('room'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'no' => 'required|exists:rooms,no',
            'phone' => 'required|phone',
            'idcard' => 'required|idcard',
            'check_in_at' => 'required|date|after:today',
            'check_out_at' => 'required|date|after:check_in_at|live_half_month_and_not_conflict'
        ], [], [
            'phone' => '手机号',
            'idcard' => '身份证号',
            'check_in_at' => '入住日期',
            'check_out_at' => '退房日期'
        ]);

        Order::create([
            'room_no'      => $request->get('no'),
            'phone'        => $request->get('phone'),
            'idcard'       => $request->get('idcard'),
            'check_in_at'  => Carbon::parse($request->get('check_in_at')),
            'check_out_at' => Carbon::parse($request->get('check_out_at')),
        ]);

        flashy()->success('预约成功', '#');

        return redirect('/');
    }
}
