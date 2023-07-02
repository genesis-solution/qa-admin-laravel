@extends('layouts.topic', ['title' => 'ONE PAGE❘夢境如詩一頁 舒眠一夜-測驗問券Q'.$_index])

@section('content')
    @if(isset($data) && isset($_index) && isset($userid))
        <img src="{{asset('assets/img/'.$data[0]->image_path)}}" width="150px" >
        <h1>{{ $data[0]->desc }}</h1>
        <div class="inputBox">
            <input type="submit" value="{{ $data[0]->q1 }}" id="btn" onclick="event.preventDefault();
                        document.getElementById('qa-1').submit();">
            <input type="submit" value="{{ $data[0]->q2 }}" id="btn"
                   onclick="event.preventDefault();
                        document.getElementById('qa-2').submit();">
            <input type="submit" value="{{ $data[0]->q3 }}" id="btn"
                   onclick="event.preventDefault();
                        document.getElementById('qa-3').submit();">
            <input type="submit" value="{{ $data[0]->q4 }}" id="btn"
                   onclick="event.preventDefault();
                        document.getElementById('qa-4').submit();">
        </div>
        <form id="qa-1" action="{{ url('question/'.$_index.'/1?userid='.$userid) }}" method="POST" style="display: none;">
            @csrf
        </form>
        <form id="qa-2" action="{{ url('question/'.$_index.'/2?userid='.$userid) }}" method="POST" style="display: none;">
            @csrf
        </form>
        <form id="qa-3" action="{{ url('question/'.$_index.'/3?userid='.$userid) }}" method="POST" style="display: none;">
            @csrf
        </form>
        <form id="qa-4" action="{{ url('question/'.$_index.'/4?userid='.$userid) }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
        <div>Error</div>
    @endif
@endsection
@section('scripts')
    @parent
@endsection