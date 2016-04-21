@extends('layouts.app')

@section('title')
预约房间
@stop

@section('content')
<div class="container">
    <div class="row">
        @if (count($room->orders))
        <div class="col-sm-6">
        @else
        <div class="col-sm-6 col-sm-offset-3">
        @endif
            <h1 class="page-header">预约房间</h1>

            <form action="{{ route('orders.store') }}" method="POST">
                {!! csrf_field() !!}
                <input type="hidden" name="no" value="{{ $room->no }}">
                <div class="form-group">
                    <label for="no">房间号</label>
                    <input type="text" class="form-control" id="no" value="{{ $room->no }} - {{ $room->price * $room->discount / 10 }}¥/天" disabled>
                </div>
                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label for="phone">手机号</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
                <!-- Idcard field -->
                <div class="form-group{{ $errors->has('idcard') ? ' has-error' : '' }}">
                    <label for="idcard">身份证号</label>
                    <input type="text" class="form-control" id="idcard" name="idcard" value="{{ old('idcard') }}">
                    @if ($errors->has('idcard'))
                        <span class="help-block">
                            <strong>{{ $errors->first('idcard') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('check_in_at') ? ' has-error' : '' }}">
                    <label for="check_in_at">入住日期</label>
                    <input type="date" class="form-control" id="check_in_at" name="check_in_at" value="{{ old('check_in_at') }}">
                    @if ($errors->has('check_in_at'))
                        <span class="help-block">
                            <strong>{{ $errors->first('check_in_at') }}</strong>
                        </span>
                    @endif
                </div>
                <!-- Check_out_at field -->
                <div class="form-group{{ $errors->has('check_out_at') ? ' has-error' : '' }}">
                    <label for="check_out_at">退房日期</label>
                    <input type="date" class="form-control" id="check_out_at" name="check_out_at" value="{{ old('check_out_at') }}">
                    @if ($errors->has('check_out_at'))
                        <span class="help-block">
                            <strong>{{ $errors->first('check_out_at') }}</strong>
                        </span>
                    @endif
                </div>

                <input type="submit" value="预约" class="btn btn-primary">
            </form>
        </div>
        @if (count($room->orders))
        <div class="col-sm-6">
            <h1 class="page-header">当前预约({{ count($room->orders) }})</h1>

            <ul class="list-group">
                <li class="list-group-item">
                    <b>用户</b>
                    <b>预约日期</b>
                    <b>退房日期</b>
                </li>
            @foreach ($room->orders as $order)
                <li class="list-group-item">
                    <b>{{ displayPhone($order->phone) }}</b>
                    <b>{{ $order->check_in_at->format('Y-m-d') }}</b>
                    <b>{{ $order->check_out_at->format('Y-m-d') }}</b>
                </li>
            @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
@stop
