@extends('admin.layouts.app')

@section('content')
  <div id="app">
    <edit-career-component :career-id="{{$id}}">
    </edit-career-component>
  </div>
@endsection