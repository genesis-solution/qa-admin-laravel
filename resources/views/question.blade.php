@extends('layouts.topic')
@section('content')
    <img src="{{asset('assets/img/q1.fw.png')}}" width="150px" >
    <h1>您平常喜歡睡怎樣的床?</h1>
    <div class="inputBox">
        <input type="submit" value="最喜歡軟的床" id="btn">
        <input type="submit" value="不軟不硬" id="btn">
        <input type="submit" value="軟中偏硬一點" id="btn">
        <input type="submit" value="喜歡硬的床" id="btn">
    </div>
@endsection
@section('scripts')
    @parent
@endsection