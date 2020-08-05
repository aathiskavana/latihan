@extends('layouts.template')
@section('content')

<section id="top">
    <div class="container-fluid p-0">
        <img src="{{route('assets')}}/images/2-about-1header.png" alt="about-header" class="about-header">
    </div>
</section>

<section>
    <div class="container">
        <div class="col-md-10 mx-auto">
            <h1 class="text-white about-title">WHO WE ARE</h1>
            <div class="container about-contain">
                <div class="row">
                    <div class="col-md-12" style="padding-left:0; padding-right:0;">
                        <hr class="about-line-orange-blue-1">
                    </div>
                    <div class="col-md-10 mx-auto">
                        <p class="text-center about-text-contain">{!!$page->description!!}</p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4 offset-md-1 text-center">
                        <img src="{{route('assets')}}/images/2-about-2vision.png" class="about-contain-image">
                        <h3 class="about-contain-title">VISION</h3>
                        <p>{{$content[1]->description}}</p>
                    </div>
                    
                    <div class="col-md-2">
                        <hr class="about-line-orange-blue-2">
                    </div>
                    
                    <div class="col-md-4 text-center">
                        <img src="{{route('assets')}}/images/2-about-2mission.png" class="about-contain-image">
                        <h3 class="about-contain-title">MISSION</h3>
                        <p>{{$content[2]->description}}</p>
                    </div>
                </div>
                
            </div>
            
            
        </div>
        
        <div class="row">
            <div class="col-md-6 col-10 mx-auto">
                <div class="container about-contain-2">
                    <h2 class="about-contain-2-title">EPCON</h2>
                    <h2 class="about-contain-2-subtitle">ONE INTEGRATED SOLUTION</h2>
                    <h5 class="about-contain-2-text">The four companies enable EPCON in providing the most comprehensive engineering services</h5>
                    <box class="about-contain-2-arrow"></box>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-10 offset-md-1 col-10 offset-2 text-center about-epcon-outline-2">
                <div class="container">
                    <h2 class="about-3-title">EPCON MITRA GUNA</h2>
                    <p class="about-3-subtitle">PRODUCT PROVIDER</p>
                    
                    <div class="row about-epcon-row">
                        <circle class="epcon-3-1"></circle>
                        <circle class="epcon-3-2"></circle>
                        <circle class="epcon-3-3"></circle>
                        <circle class="epcon-3-4"></circle>
                        <hr class="about-line-orange-blue-2 about-line-unique-2 visible-xs">
                        
                        
                        <div class="col-md-5 about-3-epcongrahaguna">
                            <h2 class="about-3-title">EPCON GRAHA GUNA</h2>
                            <p class="about-3-subtitle">DESIGN & INSTALLATION OF OFFICE BUILDING, FITTING OUT</p>
                        </div>
                        
                        <div class="col-md-2">
                            <hr class="about-line-orange-blue-2 about-line-unique-2 hidden-xs">
                        </div>
                        
                        <div class="col-md-5 about-3-epconmultiguna">
                            <h2 class="about-3-title">EPCON MULTI GUNA</h2>
                            <p class="about-3-subtitle">DESIGN & INSTALLATION OF BUILDING AUTOMATION, SECURITY, EMS, & ELV SYSTEM</p>
                        </div>
                    </div>
                    
                    <h2 class="about-3-title">EPCON PRIMA GUNA</h2>
                    <p class="about-3-subtitle">SERVICES & MAINTENANCE</p>
                </div>
            </div>
        </div>
        
    </div>
</section>

<section class="section about-4-sectionlayout" style="background: #f4f4f4;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>OUR HISTORY</h1>
                <hr class="about-4-slider-line" style="margin-top:50px">
                <div class="slider-arrows-circle-dark" id="history-slider" data-center-mode="true" data-center-padding="10%" style="margin-top:-100px" data-provide="slider" data-arrows="true" data-slides-to-show="1" data-focus-on-select="true">
                    <div class="container">
                        <div class="about-slider-year">
                            <h1 class="about-slider-year-text">1995</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{route('assets')}}/images/2-about-history1.png">
                            </div>
                            <div class="col-md-8">
                                <p class="about-4-text">{{$content[3]->description}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="about-slider-year">
                            <h1 class="about-slider-year-text">2000</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{route('assets')}}/images/2-about-history1.png">
                            </div>
                            <div class="col-md-8">
                                <p class="about-4-text">{{$content[4]->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    
   
        
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6" style="padding-right:0">
                <h1 class="text-right">MEET OUR TEAM</h1>
            </div>
        </div>
        
        
        <div class="tab-content text-center">
        <div class="tab-pane fade show active" id="about-1">
            <div class="row">
                
                <div class="col-md-6 p-0">
                    <img src="{{route('assets')}}/images/2-about-team1.png" alt="about team 1">
                </div>
                
                <div class="col-md-6" style="padding-right: 50px; padding-left: 50px">
                    <p align="left">
                        {!!$content[6]->description!!}                
                    </p>

                </div>
            </div>
        </div>
        
        <div class="tab-pane fade" id="about-2">
            <div class="row">
                
                <div class="col-md-6 p-0"style="padding-right: 50px; padding-left: 50px">
                    <img src="{{route('assets')}}/images/2-about-team2.png" alt="about team 2">
                </div>
                
                <div class="col-md-6" style="padding-right: 50px; padding-left: 50px">
                    <p align="left">
                        {!!$content[6]->description!!}                
                    </p>
                </div>
            </div>
        </div>
        
        </div>
        
        </div>
        
        
    </div>
     <div class="container-fluid nav-about-team">
        <div class="row">
            <div class="col-md-6 offset-md-6 about-navbar-number">
                <ul class="nav nav-tabs-outline" style="justify-content:left">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#about-1"style="padding-left:0">01</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#about-2">02</a>
                    </li>
                </ul>
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