@extends('admin.layouts.app')

@section('content')
  <div id="app">
    <edit-product-component :product-id="{{$id}}">
    </edit-product-component>
  </div>
@endsection