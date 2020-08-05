@extends('layouts.template')
@section('content')

<section class="section" id="top">
    <div class="container products-desc-layout">
        <div class="row">
            <div class="col-md-3 col-12 offset-md-0">
                <ul class="nav nav-tabs-shadow nav-tabs-border">
		            @foreach($products as $key=>$product)
                    <li class="nav-item">
                      @if($product->order == 1)
                      <a class="nav-link active hover-card-products card-products" data-toggle="tab" href="{{'#'.str_slug($product->name).', #pt-'.((int)($key)+1)}}">
                      @else
                      <a class="nav-link hover-card-products card-products" data-toggle="tab" href="{{'#'.str_slug($product->name).', #pt-'.((int)($key)+1)}}">
                      @endif
                        <img src="{{'/storage/'.$product->main_image}}" class="products-img-nav" alt="icon-products">
                        <h6 class="products-icon-title">{{ Str::upper($product->name) }}</h6>
                      </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            
            
            <div class="col-md-9">
                <div class="tab-content">
		            
                    @foreach($products as $key=>$product)
                    @if($product->order == 1)
                    <div class="tab-pane fade active show" id="{{str_slug($product->name)}}">
                    @else
                    <div class="tab-pane fade" id="{{str_slug($product->name)}}">
                    @endif
                        {!! htmlspecialchars_decode($product->description) !!}
                        
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="products-portfolio-final">PORTFOLIO</h1>
                                </div>
                            </div>
                            
                            <div class="row">
                                @foreach($product->product_portofolios as $product_portofolio)
                                <div class="col-3 col-md-3 op-hover">
                                    <img src="/storage/{{$product_portofolio->main_image}}" class="products-portfolio-img"><h1 class="products-desc-title products-portfolio-text">{{$product_portofolio->name}}</h1>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="tab-pane fade" id="bas-eng" style="display:none;">
                      <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="products-desc-title">Building Automation System (BAS / BMS / BCMS)</h1>
                                    <p class="products-description-text">In today’s buildings, the power of an innovative, easy-to-use building automation system is a big deal.</p>
                                    <img src="{{route('assets')}}/images/bas-1.png" alt="WebCTRL" class="products-bas-1">
                                    <p class="products-description-text">The Automated Logic® WebCTRL® building automation system offers an intuitive user interface and powerful tools to help facility managers keep occupants comfortable, manage energy conservation measures, identify key operational problems, and analyze the results. And, best of all, this can all be done anytime/anywhere, through a variety of Internet devices, from desktop PCs to web-enabled cell phones.</p>
                                    <p class="products-description-text">WebCTRL systems provide local to global energy management and control, and easily interface with all major electrical and mechanical subsystems in the building. With these capabilities and more, facility managers can access, configure, and manage building control systems in ways that best serve their operating needs and budget.</p>
                                    <p class="products-description-text">Key Features and Benefits</p>
                                    <p class="products-description-text">
                                        <ul class="products-bas-ul">
                                            <li>Powerful, comprehensive building management with intuitive, point-and-click graphical access</li>
                                            <li>Dynamic color floor plans convey a quick understanding of building conditions</li>
                                            <li>Customizable graphics, schedules, trends, reports, and alarms</li>
                                            <li>Inherent WebCTRL Environmental Index™ tool for measuring, analyzing, and comparing comfort conditions against setpoints, helping you balance comfort with efficiency</li>
                                            <li>Powerful WebCTRL Time-lapse™ graphics for analyzing and troubleshooting up to 24 hours of past building operation</li>
                                            <li>Built-in Fault Detection and Diagnostics (FDD), to help anticipate, provide insight, and automatically respond to building issues</li>
                                            <li>Readily participates in energy rebate programs using the OpenADR® 2.0 protocol</li>
                                            <li>Optional EnergyReports™ analysis package can be added to analyze, compare, and normalize building energy consumption data over different time periods</li>
                                            <li>Optional Eco-Screen® sustainability kiosk software can be added to showcase building systems and energy efficient building features to occupants and visitors</li>
                                            <li>Easily integrates to other building systems and third party software using BACnet, Modbus®, LonWorks®, and other third party protocols</li>
                                            <li>Fully compatible with Automated Logic legacy systems</li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="products-desc-title">Mission Critical for Datacenter / OT Room Automation / Clean Room</h1>
                                    <p class="products-description-text">Automated Logic helps mission critical companies maximize uptime while facilitating improved overall efficiency (PUE) so that our customers spend less on energy while maintaining conditions conducive to a data center environment. By balancing PUE and exhibiting a greater commitment to sustainability, data centers stand to attract more clients.</p>
                                    <p class="products-description-text">Automated Logic has built an incredibly strong portfolio of satisfied mission critical clients over the past decade. We understand the data center environment and are best positioned to tune these incredibly complex systems to increase efficiency while maintaining reliability. We combine a thorough understanding of your environmental requirements with the unmatched versatility of a secure architecture, the industry standard in graphical programming and enhanced reporting capabilities.</p>
                                    <img src="{{route('assets')}}/images/bas-2.png" alt="WebCTRL-2" class="products-bas-2">
                                    <p class="products-description-text">The WebCTRL System for mission critical facilities skillfully maximizes uptime while facilitating the delivery of PUE and adherence to strict environmental conditions set forth in a client Service Level Agreements (SLAs). The WebCTRL system is easily deployed on your secure intranet and accessed through any standard browser from a desktop, laptop, web-enabled cell phone or tablet computer, delivering a high degree of precision and perfection in executing our work. From Time-Lapse™ graphics to Fault Detection and Diagnostics, the WebCTRL system for mission critical facilities helps to ensure systems are operating at their peak efficiency.</p>
                                    <img src="{{route('assets')}}/images/bas-3.png" alt="WebCTRL-3" class="products-bas-2">
                                    <p class="products-description-text">Other Features: </p>
                                    <p class="products-description-text">
                                        <ol type="1" class="products-bas-ul">
                                            <li>System and Location Audit Reporting</li>
                                            <li>Advanced Trending and Scatter Plots</li>
                                            <li>Fault Detection & Diagnostics and Advanced Alarming</li>
                                            <li>Thermographic Color Floor Plans – convey a quick understanding of facility-wide operating conditions</li>
                                            <li>Logical Alarming – generates alarms and notifies users after specified events have occurred</li>
                                            <li>Trends and Scatter Plot Tools – enables operators to track and troubleshoot building conditions</li>
                                            <li>Time-lapse™ Graphics – rolls back time, up to a 24-hour slice, playing back hours of real-time data in just minutes</li>
                                            <li>Logging/Reporting – extracts and formats building data from a browser to Acrobat®, Excel® and other applications with a single click</li>
                                        </ul>
                                    </p>
                                    <img src="{{route('assets')}}/images/bas-4.png" alt="WebCTRL-4" class="products-bas-2">
                                </div>
                            </div>
                        </div>
                    </div>
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