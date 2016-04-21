@extends('layouts.app')

@section('style')
<style>
@media (min-width: 768px) {
    #page-wrapper {
        position: inherit;
        margin: 20px 0 0 250px;
        padding: 0 30px;
        border-left: 1px solid #e7e7e7;
    }
}
</style>
@stop

@section('sidebar')
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav app-navbar-collapse" aria-expanded="false" style="height: 1px;">
        <ul class="nav in" id="side-menu">
            <li>
                <a href="{{ url('admin') }}"><i class="fa fa-fw fa-dashboard"></i> 控制台</a>
            </li>
            <li>
                <a href="{{ route('admin.orders.index') }}"><i class="fa fa-fw fa-calculator"></i> 订单管理</a>
            </li>
            <li>
                <a href="{{ route('admin.setting') }}"><i class="fa fa-fw fa-cog"></i> 系统设置</a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}"><i class="fa fa-fw fa-users"></i> 用户管理</a>
            </li>
            <li>
                <a href="{{ route('admin.rooms.types.index') }}"><i class="fa fa-fw fa-tags"></i> 房间分类</a>
            </li>
            <li>
                <a href="{{ route('admin.rooms.index') }}"><i class="fa fa-fw fa-credit-card-alt"></i> 房间管理</a>
            </li>
        </ul>
    </div>
</div>
@stop

@section('content')
<div id="page-wrapper">
    @yield('page')
</div>
@stop

@section('footer')
@stop
