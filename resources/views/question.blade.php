@extends('layouts.topic')
@section('content')
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