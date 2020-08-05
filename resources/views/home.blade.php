@extends('layouts.template')
@section('content')

<section class="vh-100 home-header" id="top" style="background:url('{{route('assets')}}/images/1-home-header.png');background-size:contain;background-position:right top;background-repeat:no-repeat;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 offset-md-1">
                <div class="container home-tagline">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{route('assets')}}/images/0-logocolor.png" class="home-img-mb-1" alt="logo epcon">
                            <h1 class="home-banner-title"> {{$content[0]->description}}</h1>
                        </div>
                    </div>
                    <div class="row">
                            
                        <div class="col-md-2 col-2">
                            <hr class="line-orange-1">
                            <span class="line-rounded-1"></span>
                            <span class="line-rounded-2"></span>
                           
                        </div> 
                        <div class="col-md-8 col-10">
                            <h6 class="home-banner-subtitle"> {{$content[1]->description}}</h6>
                            <h6 class="home-banner-text"><a href="#home-about-us">Get to know us <span class="fa fa-angle-down orange ml10px" aria-hidden="true"></span></a></h6>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<section id="home-about-us">
    <div class="container-fluid">
        
        <hr class="line-orange-2">
        
        <img src="{{route('assets')}}/images/1-home-img1.png" class="home-img-1" alt="home-img1">
        <div class="row">
            <div class="col-md-6 offset-md-5">
                <div class="container home-section-aboutus" style="background-color:white;">
                    <div class="row" style="padding:20px 30px;">
                        <div class="col-md-12">
                           <h1 class="text-center home-title-aboutus">
                                ABOUT US
                            </h1>
                            {!!$content[2]->description!!}
                            <h6 class="text-right"><a href="{{route('about')}}">Learn more about us <span class="fa fa-angle-right orange" aria-hidden="true"></span></a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <img src="{{route('assets')}}/images/1-home-img2.png" class="home-img-2" alt="home-img2">
            </div>
        </div>
    </div>
</section>

<section class="section section-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 offset-md-1">
                <h1 class="home-our-services">OUR SERVICES</h1>
                <p class="home-services-subtitle">
                    {!!$content[3]->description!!}
                </p>
                <h6><a href="https://epcon.usemono.com/services">Read more about our services <span class="fa fa-angle-right orange" aria-hidden="true"></span></a></h6>
            </div>
        </div>
    </div>
</section>

<section class="section" style="padding-top:0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 offset-md-1">
                <div class="slider-arrows-flash-dark arrows-slider-services" data-provide="slider" data-slides-to-show="3" data-arrows="true">
                    @foreach($services as $service)
                    <div class="home-services-slider-box">
                        <div class="container home-services-box">
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <img src="{{'/storage/'.$service->main_image}}" alt="design" style="width:100%;">
                                </div>
                                <div class="col-md-8 col-8">
                                    <h5>{{$service->name}}</h5>
                                    <p class="home-services-slider-text">
                                    {!!$service->description!!}
                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
              </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <img src="{{route('assets')}}/images/1-home-img3.png" style="width:100%;">
            </div>
            
            <div class="col-md-6 offset-md-1">
                <div class="slider-arrows-flash-light" data-provide="slider" data-arrows="true" data-slides-to-show="1">
	                @foreach($homepage_projects as $homepage_project)
                    <div class="projects-card-0">
                        <div class="container home-projects-card">
                            <img src="{{'/storage/'.$homepage_project->main_image}}" class="home-projects-slider-img" alt="{{$homepage_project->company}}">
                            <h5>{{$homepage_project->company}}</h5>
                            <p>year:{{$homepage_project->year}}</p>
                            <p>{!!$homepage_project->description!!}</p>
                            <h6><a href="{{$homepage_project->url}}">Read more <span class="fa fa-angle-right orange" aria-hidden="true"></span></a></h6>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <div class="col-md-3 text-right">
                <h1 class="home-projects-title">OUR PROJECTS</h1>
            </div>
        </div>
    </div>
</section>

<hr class="home-line-divider visible-xs">

<section class="section product">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 offset-md-1">
                <h1>OUR PRODUCTS</h1>
                <p>{!!$content[8]->description!!}</p>
                <h6><a href="https://epcon.usemono.com/products">Read more about our products<span class="fa fa-angle-right orange" aria-hidden="true"></span></a></h6>
            </div>
            
            <div class="col-md-6">
                <div class="slider-arrows-circle-light" data-provide="slider" data-slides-to-show="2" data-arrows="true">
                    @foreach($homepage_products as $homepage_product)
                    <div class="products-card">
                            <div style="width: 100%; 
                                 background-image: url('{{'/storage/'.$homepage_product->main_image}}');
                                 background-size: cover; background-position: center;
                                 background-repeat: no-repeat;
                                 height:250px !important;"></div>
                            <h6 class="home-products-slider-title"><a href="{{route('products')}}" class="hover-underline">{{$homepage_product->name}}</a></h6>
                            <p class="home-products-slider-text">{!!$homepage_product->description!!}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container-fluid">
        <!--
    <hr class="line-blue-1">
    <hr class="line-blue-orange">
    -->
        <div class="row">
            <div class="col-md-4 offset-md-1">
                <h1>THEY TRUST US</h1>
                <h6 class="home-testi-subtitle"><a href="https://epcon.usemono.com/projects/fit-out">See all your partners and clients <span class="fa fa-angle-right orange" aria-hidden="true"></span></a></h3>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div data-provide="slider" data-slides-to-show="6" data-autoplay="true" data-focus-on-select="true">
                    <?php foreach($clients as $client){ ?>
                    <div>
                        <a href="<?php echo $client->url;?>">
                            <img src="storage/{{ $client->main_image }}" alt="{{$client->name}}">
                        </a>    
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- footer 1 -->
<header class="header header-footer" style="background-image:url({{route('assets')}}/images/0-footer.png)" alt="footer img">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
              <h1 class="navbarasfooter-banner-title mb-6">WE CAN'T WAIT TO HEAR FROM YOU</h1>
              <p class="navbarasfooter-banner-subtitle">Send us an e-mail and get in touch with us</p>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-md-5">
                <div id="mc_embed_signup">
                    <form action="https://epcon.us10.list-manage.com/subscribe/post?u=ac1247805c79d6f0677e75cce&amp;id=dc38612ca6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                            <div class="mc-field-group form-group input-group">
                            	<input type="email" value="" name="EMAIL" class="form-control navbarasfooter-subscribe-placeholder required email" id="mce-EMAIL" placeholder="Enter e-mail address">
                            	<div class="input-group-append ml-4">
                            	    <button class="hover-op" type="submit" style="background:none; border:0;">
                            	        <i class="fas fa-arrow-right fs30-20" style="color:white;"></i>
                            	    </button>
                                </div>
                            </div>
                        </div>
                    	<div id="mce-responses" class="clear">
                    		<div class="response" id="mce-error-response" style="display:none"></div>
                    		<div class="response" id="mce-success-response" style="display:none"></div>
                    	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ac1247805c79d6f0677e75cce_dc38612ca6" tabindex="-1" value=""></div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</header>
<!-- /footer 1 -->
@stop