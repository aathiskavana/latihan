@extends('layouts.template')
@section('content')

<section id="top">
    <div class="container-fluid p-0">
        <img src="{{route('assets')}}/images/0-logowhite.png" alt="logo-epcon-white" class="logo-epcon-head">
        <img src="{{route('assets')}}/images/8-blog-1header.png" alt="blog-header" class="products-header">
    </div>
</section>

<section>
    <div class="container">
        <div class="col-md-12 mx-auto">
            <div class="blog-detail-layout">
                <div class="row blog-gap-y">
                    <div class="col-md-12">
                        <img src="{{'/storage/'.$blog->main_image}}" class="blog-img-big" alt="blog-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section pt-0 blog-detail-big-outline">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h1 class="blog-detail-big-title">{{$blog->title}}</h1>
            </div>
            
            <hr class="blog-detail-line">
        </div>
        
        <div class="row blog-detail-outline">
            <div class="col-md-4">
                <p class="blog-detail-title-1 blog-detail-title-title">{{date('dS F Y', strtotime($blog->created_at))}}</p>
                <p class="blog-detail-title-1 1-name">written by {{$blog->writer}}</p>
            </div>
            
            <div class="col-md-7 offset-md-1">
            {!!$blog->content!!}
            
            @if($blog_previous)
            <a href="/blog-detail/{{$blog_previous->slug_title}}"><i class="fas fa-arrow-left blog-detail-prev"> <p class="blog-detail-prev-text">Previous</p></i></a>
            @endif
            
            @if($blog_next)
            <a href="/blog-detail/{{$blog_next->slug_title}}"><p class="blog-detail-next-text">Next<i class="fas fa-arrow-right blog-detail-next"></i></p></a>
            @endif
            </div>
        </div>
    </div>
</div>

@stop