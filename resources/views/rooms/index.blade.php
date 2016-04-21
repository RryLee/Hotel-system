@extends('layouts.app')

@section('title')
全部房间
@stop

@section('content')
<div class="container">
    @include('rooms.partial.room')

    {!! $rooms->links() !!}
</div>
@stop
