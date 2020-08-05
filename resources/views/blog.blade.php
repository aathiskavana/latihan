@extends('layouts.template')
@section('content')

<section id="top">
    <div class="container-fluid p-0">
        <img src="{{route('assets')}}/images/0-logowhite.png" alt="logo-epcon-white" class="logo-epcon-head">
        <img src="{{route('assets')}}/images/8-blog-1header.png" alt="blog-header" class="products-header">
        <h1 class="blog-title">BLOGS & NEWS</h1>
    </div>
</section>

<section>
    <div class="container">
        <div class="col-md-10 mx-auto">
            <div class="blog-layout">
                <div class="row blog-gap-y">
                    <div class="col-md-12">
                        <div style="width: 100%; background-image: url('{{'/storage/'.$blog_first->main_image}}');background-size: cover; background-position: center;background-repeat: no-repeat;height:300px !important;">
                            <div class="hover-overlay-left blog-title-width-30">
                                <div class="blog-detail-container">
                                    <h3 class="blog-title">{{$blog_first->title}}</h3>
                                    <h6 class="blog-subtitle">{{$blog_first->subtitle}}</h6>
                                    <a href="/blog-detail/{{$blog_first->slug_title}}"><p class="blog-readmore blog-readmore-title">Read more<i class="fas fa-arrow-right ml-3"></i></p></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row blog-gap-y">
                    @foreach($blog_rests as $key=>$blog)
                        @if($key!=0)
                        <div class="col-md-4 p-0 blog-col-custom">
                            <img src="{{'/storage/'.$blog->main_image}}" class="blog-img-small" alt="blog-{{$key+2}}">
                            <div class="hover-overlay-left">
                                <div class="blog-detail-container">
                                    <h3 class="blog-title">{{$blog->title}}</h3>
                                    <h6 class="blog-subtitle">{{$blog->subtitle}} </h6>
                                    <a href="/blog-detail/{{$blog->slug_title}}"><p class="text-white blog-readmore">Read more<i class="fas fa-arrow-right ml-3"></i></p></a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                
                <div class="row blog-more-layout" style="display:none;">
                    <div class="col-md-4 col-3">
                        <hr class="blog-hr hidden-xs">
                    </div>
                    
                    <div class="col-md-4 col-6" style="display: none;">
                        <a href="#"><h4 class="blog-read-more">Read More Blog </h4></a>
                    </div>
                    
                    <div class="col-md-4 col-3">
                        <hr class="blog-hr hidden-xs">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>



@stop