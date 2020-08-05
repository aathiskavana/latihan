@extends('layouts.template')
@section('content')

<section id="top">
    <div class="container-fluid p-0">
        <img src="{{route('assets')}}/images/0-logowhite.png" alt="logo-epcon-white" class="logo-epcon-head">
        <img src="{{route('assets')}}/images/6-career-1header.png" alt="career-header" class="products-header">
    </div>
</section>

<section style="margin-bottom:70px;" >
    <div class="container">
        <div class="col-md-10 mx-auto">
            <h1 class="products-title">CONTACT US</h1>
            <div class="container products-contain">
                <div class="row">
                    <div class="col-md-12" style="padding-left:0; padding-right:0;">
                        <hr class="about-line-orange-blue-1">
                    </div>
                    <div class="col-md-10 mx-auto contain-subtitle">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 contact-layout-text">
                                    <p class="contact-text">{!!$page->description!!}</p>
                                    
                                    <table style="width:100%">
  
                                      <tr>
                                        <td style="width:20%"><img src="{{route('assets')}}/images/0-footer-icon1.png" class="contact-icon" alt="icon-phone"></td>
                                        <td><p class="contact-small-info">{{$content[91]->description}}</p></td>
                                      </tr>
                                      <tr>
                                        <td style="width:20%"><img src="{{route('assets')}}/images/0-footer-icon2.png" class="contact-icon" alt="icon-fax"></td>
                                        <td><p class="contact-small-info">{{$content[92]->description}}</p></td>
                                      </tr>
                                      <tr>
                                        <td style="width:20%"><img src="{{route('assets')}}/images/7-contact-location.png" class="contact-icon" alt="icon-address"></td>
                                        <td><p class="contact-small-info">{!!$content[93]->description!!}</p></td>
                                      </tr>
                                    </table>
                                </div>
                                
                                <div class="col-md-6" id="app">
                                    <contact-front-component></contact-front-component>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop