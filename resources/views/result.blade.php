@extends('layouts.topic', ['title' => 'ONE PAGE 專屬於你的書是/舒適/睡感-'.$_index])

@section('content')
    @if(isset($image_path) && isset($_index))
        <img src="{{asset('assets/img/'.$image_path)}}" width="100%" >
    @else
        <div>Error</div>
    @endif
@endsection
@section('scripts')
    @parent
@endsection