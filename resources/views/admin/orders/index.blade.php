@extends('admin.app')

@section('title')
订单管理
@stop

@section('page')
<h1 class="page-header">订单管理</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th><i class="fa fa-home"></i></th>
            <th><i class="fa fa-money"></i></th>
            <th><i class="fa fa-tags"></i></th>
            <th><i class="fa fa-phone"></i></th>
            <th><i class="fa fa-credit-card-alt"></i></th>
            <th>入住时间</th>
            <th>退房时间</th>
            <th>删除</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($orders as $order)
    <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->room_no }}</td>
        <td>¥: {{ $order->room->price * $order->check_in_at->diffInDays($order->check_out_at) }}</td>
        <td>{{ $order->room->type->name }}</td>
        <td>{{ $order->phone }}</td>
        <td>{{ $order->idcard }}</td>
        <td>{{ $order->check_in_at->format('Y-m-d') }}</td>
        <td>{{ $order->check_out_at->format('Y-m-d') }}</td>
        <td>
            <form action="{{ route('admin.orders.destroy', ['id' => $order->id]) }}" style='display: inline' method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-sm btn-danger btn-xs" onclick="return confirm('确定删除?')"><i class="fa fa-remove"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{!! $orders->links() !!}
@stop
