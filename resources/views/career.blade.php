@extends('layouts.template')
@section('content')

<section id="top">
    <div class="container-fluid p-0">
        <img src="{{route('assets')}}/images/0-logowhite.png" alt="logo-epcon-white" class="logo-epcon-head">
        <img src="{{route('assets')}}/images/6-career-1header.png" alt="career-header" class="products-header">
    </div>
</section>

<section>
    <div class="container">
        <div class="col-md-8 mx-auto">
            <h1 class="products-title">CAREER</h1>
            <div class="container products-contain">
                <div class="row">
                    <div class="col-md-12" style="padding-left:0; padding-right:0;">
                        <hr class="about-line-orange-blue-1">
                    </div>
                    <div class="col-md-8 mx-auto contain-subtitle">
                        <p class="text-center">{!!$page->description!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section career-section-job">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 offset-md-3">
                <h1>JOB VACANCY</h1>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="slider-arrows-flash-career-2 px-8" data-provide="slider" data-arrows="true" data-slides-to-show="2" data-focus-on-select="true">
                    @foreach($careers as $career)    
                    <div class="career-contain-slider">
                        
                        <h3 class="career-contain-title"><span class="career-round-2">{{$career->order}}</span> {{$career->title}}</h3>
                        {!! htmlspecialchars_decode($career->description) !!}
                    </div>
		            @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- footer 1 -->
<header class="header header-footer" style="background-image:url({{route('assets')}}/images/0-footer.png)" alt="footer img">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-12 mx-auto">
              <h1 class="navbarasfooter-banner-title navbarasfooter-banner-title-2">ARE YOU READY TO JOIN US?</h1>
            </div>
        </div>
        <div class="row navbarasfooter-mt-custom">
            <div class="col-md-8 col-8 mx-auto">
                <p class="navbarasfooter-banner-subtitle navbarasfooter-banner-subtitle-2">Send us your motivation letter and CV to</p>
                <h3 class="navbaras-footer-banner-big-subtitle">HRD@EPCON.CO.ID</h3>
                
            </div>
        </div>
    </div>
</header>
<!-- /footer 1 -->

@stop