@extends('layouts.template')
@section('content')

<section id="top">
    <div class="container-fluid p-0">
        <img src="{{route('assets')}}/images/0-logowhite.png" alt="logo-epcon-white" class="logo-epcon-head">
        <img src="{{route('assets')}}/images/5-services-1header.png" alt="service-header" class="products-header">
    </div>
</section>

<section>
    <div class="container">
        <div class="col-md-8 mx-auto">
            <h1 class="products-title">{{strtoupper($page->name)}}</h1>
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

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto services-outline">
                <div class="accordion accordion-arrow-right" id="accordion-4">
               
                @foreach($services as $service)
                <div class="card services-card">
                    @if($service->order == 1)
                    <a data-toggle="collapse" href="#collapse-4-{{$service->order}}">
                    @else
                    <a class="collapsed" data-toggle="collapse" href="#collapse-4-{{$service->order}}">
							  	  @endif
                        <h5 class="card-title text-white">
                            <div class="services-round">{{$service->order}}</div>
                            {{$service->name}}
                    </a>
                  </h5>
                  @if($service->order == 1)
                  <div id="collapse-4-{{$service->order}}" class="collapse show" data-parent="#accordion-4">
                  @else
                  <div id="collapse-4-{{$service->order}}" class="collapse" data-parent="#accordion-4">
							  	@endif
                    <div class="card-body text-white">
                      {!!$service->description!!}
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
        </div>
    </div>
</section>
