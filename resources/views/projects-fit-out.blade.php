@extends('layouts.template')
@section('content')

<section style="display:none;">
    <div class="container-fluid p-0">
        <img src="{{route('assets')}}/images/0-logowhite.png" alt="logo-epcon-white" class="logo-epcon-head">
        <img src="{{route('assets')}}/images/4-projects-1header.png" alt="products-header" class="products-header">
    </div>
</section>

<section style="display:none;">
    <div class="container">
        <div class="col-md-8 mx-auto">
            <h1 class="products-title">PROJECTS</h1>
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


<section class="section"  id="top">
    <div class="container products-desc-layout">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-10 offset-1">
                <h1 class="projects-title-subtitle">{!!$page->description!!}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-12 offset-md-0">
                <ul class="nav nav-tabs-shadow nav-tabs-border projects-nav-tab">
					@foreach($project_types as $project_type)
                    <li class="nav-item">
                      @if($project_type->name == 'Fit Out')
                      <a class="nav-link active hover-card-products projects-nav-link" data-toggle="tab" href="{{'/projects/'.str_slug($project_type->name)}}">
                      @else
                      <a class="nav-link hover-card-products projects-nav-link" href="{{'/projects/'.str_slug($project_type->name)}}">
				      @endif
                        <h1 class="projects-title-number">{{$project_type->order}}.</h1>
                        <h6 class="projects-icon-title">{{$project_type->name}}</h6>
                      </a>
                    </li>
					@endforeach
                </ul>
            </div>
            
             
            <div class="col-md-9" style="padding-bottom:100px;">
                <div class="tab-content">

                    <div class="tab-pane fade active show" id="fo">
                        <div class="container-fluid">
        					@foreach($project_fit_outs as $project_fit_out)
                            <div class="row">
                                <h6 class="home-fo-title">{{$project_fit_out->name}}</h6>
            					@foreach($project_fit_out->project_fit_out_images as $project_fit_out_image)
                                <div class="col-md-4 col-6">
                                    <img src="{{'/storage/'.$project_fit_out_image->main_image}}" alt="Google" class="projects-detail-fo">
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
              </div>
            </div>
        </div>
    </div>
</section>

<section class="section" style="display:none;">
    <div class="container projects-clients-work-layout">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="container-fluid" data-aos="fade-in" style="position:relative; z-index:100;">
                    <div class="row">
                        <div class="col-md-5 offset-md-8">
                            <ul class="nav nav-dark">
                                <li class="nav-item text-center">
                                  <a class="nav-link active" data-toggle="tab" href="#clients"><img src="{{route('assets')}}/images/4-projects-icon1orange.png" class="projects-icon"><h1 class="products-tab-icon">CLIENTS</h1></a>
                                </li>
                                <li class="nav-item text-center">
                                  <a class="nav-link" data-toggle="tab" href="#work"><img src="{{route('assets')}}/images/4-projects-icon2orange.png.png" class="projects-icon"><h1 class="products-tab-icon">WORK</h1></a>
                                </li>
                              </ul>
                        </div>
                    </div>
                </div>
                
                <div class="tab-content" data-aos="fade-in" style="position:relative; z-index:1;">
                    <div class="tab-pane fade show active" id="clients">
                        <div class="projects-col-unique">
                            <h1>CLIENTS <span style="opacity:0.6;">&amp;<br> SCOPE OF WORK</span></h1>
                            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                            
                            <div class="form-group input-group projects-form">
                              <input type="text" class="form-control projects-search" placeholder="Search for...">
                              <div class="input-group-append">
                                <a href=""><span class="fa fa-search form-control-feedback"></span></a>
                              </div>
                            </div>
                        </div>
                        
                        <div class="container-fluid products-contain-final">
                            <div class="row projects-tab-layout">
                                <div class="col-md-4 col-4" style="position:fixed;">
                                  <ul class="nav nav-tabs-shadow nav-tabs-border products-nav-custom projects-nav-custom" style="display: block;">
                                    <li class="nav-item">
                                      <a class="nav-link active" data-toggle="tab" href="#institution">
                                        <h6 class="projects-nav-title">BANKING / INSURANCE / FINANCIAL INSTITUTION</h6>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#retail">
                                        <h6 class="projects-nav-title">COMMERCIAL / RETAIL</h6>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#data">
                                        <h6 class="projects-nav-title">DATA CENTER</h6>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#hospital">
                                        <h6 class="projects-nav-title">HOSPITAL</h6>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#hotels">
                                        <h6 class="projects-nav-title">HOTELS</h6>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#office">
                                        <h6 class="projects-nav-title">OFFICE BUILDINGS</h6>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#others">
                                        <h6 class="projects-nav-title">OTHERS</h6>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#residential">
                                        <h6 class="projects-nav-title">RESIDENTIAL</h6>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#school">
                                        <h6 class="projects-nav-title">SCHOOL / UNIVERSITY</h6>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                                
                                <div class="col-md-8 offset-md-4 col-8 offset-4">
                                    <div class="tab-content">

                                        <div class="tab-pane fade show active" id="institution">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-danamon.png" alt="danamon" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-btn.png" alt="btn" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bca.png" alt="bca" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-mandiri.png" alt="mandiri" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bii.png" alt="bii" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-hsbc.png" alt="hsbc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-dbs.png" alt="dbs" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-citibank.png" alt="citibank" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bni.png" alt="bni" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-zurich.png" alt="zurich" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-commonwealth.png" alt="commonwealth" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-manulife.png" alt="manulife" class="projects-clients-tab-icon products-icon-manulife">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-barclays.png" alt="barclays" class="projects-clients-tab-icon">
                                                      </div><div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-Schatered.png" alt="standard chartered" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="tab-pane fade" id="retail">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-giant.png" alt="giant" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-hypermart.png" alt="hypermart" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-itc.png" alt="itc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-makro.png" alt="makro" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-manggadua.png" alt="manggadua" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-moi.png" alt="moi" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-shell.png" alt="shell" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-starbucks.png" alt="starbucks" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-tangcity.png" alt="tangcity" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="tab-pane fade" id="data">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-danamon.png" alt="danamon" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-btn.png" alt="btn" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bca.png" alt="bca" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-mandiri.png" alt="mandiri" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bii.png" alt="bii" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-hsbc.png" alt="hsbc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-dbs.png" alt="dbs" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-citibank.png" alt="citibank" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bni.png" alt="bni" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-zurich.png" alt="zurich" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-commonwealth.png" alt="commonwealth" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-manulife.png" alt="manulife" class="projects-clients-tab-icon products-icon-manulife">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-barclays.png" alt="barclays" class="projects-clients-tab-icon">
                                                      </div><div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-Schatered.png" alt="standard chartered" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="tab-pane fade" id="hospital">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-danamon.png" alt="danamon" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-btn.png" alt="btn" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bca.png" alt="bca" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-mandiri.png" alt="mandiri" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bii.png" alt="bii" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-hsbc.png" alt="hsbc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-dbs.png" alt="dbs" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-citibank.png" alt="citibank" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bni.png" alt="bni" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-zurich.png" alt="zurich" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-commonwealth.png" alt="commonwealth" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-manulife.png" alt="manulife" class="projects-clients-tab-icon products-icon-manulife">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-barclays.png" alt="barclays" class="projects-clients-tab-icon">
                                                      </div><div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-Schatered.png" alt="standard chartered" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="hotels">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-danamon.png" alt="danamon" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-btn.png" alt="btn" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bca.png" alt="bca" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-mandiri.png" alt="mandiri" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bii.png" alt="bii" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-hsbc.png" alt="hsbc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-dbs.png" alt="dbs" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-citibank.png" alt="citibank" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bni.png" alt="bni" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-zurich.png" alt="zurich" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-commonwealth.png" alt="commonwealth" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-manulife.png" alt="manulife" class="projects-clients-tab-icon products-icon-manulife">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-barclays.png" alt="barclays" class="projects-clients-tab-icon">
                                                      </div><div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-Schatered.png" alt="standard chartered" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="office">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-danamon.png" alt="danamon" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-btn.png" alt="btn" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bca.png" alt="bca" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-mandiri.png" alt="mandiri" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bii.png" alt="bii" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-hsbc.png" alt="hsbc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-dbs.png" alt="dbs" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-citibank.png" alt="citibank" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bni.png" alt="bni" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-zurich.png" alt="zurich" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-commonwealth.png" alt="commonwealth" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-manulife.png" alt="manulife" class="projects-clients-tab-icon products-icon-manulife">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-barclays.png" alt="barclays" class="projects-clients-tab-icon">
                                                      </div><div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-Schatered.png" alt="standard chartered" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="others">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-danamon.png" alt="danamon" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-btn.png" alt="btn" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bca.png" alt="bca" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-mandiri.png" alt="mandiri" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bii.png" alt="bii" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-hsbc.png" alt="hsbc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-dbs.png" alt="dbs" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-citibank.png" alt="citibank" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bni.png" alt="bni" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-zurich.png" alt="zurich" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-commonwealth.png" alt="commonwealth" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-manulife.png" alt="manulife" class="projects-clients-tab-icon products-icon-manulife">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-barclays.png" alt="barclays" class="projects-clients-tab-icon">
                                                      </div><div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-Schatered.png" alt="standard chartered" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="residential">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-danamon.png" alt="danamon" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-btn.png" alt="btn" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bca.png" alt="bca" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-mandiri.png" alt="mandiri" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bii.png" alt="bii" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-hsbc.png" alt="hsbc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-dbs.png" alt="dbs" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-citibank.png" alt="citibank" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bni.png" alt="bni" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-zurich.png" alt="zurich" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-commonwealth.png" alt="commonwealth" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-manulife.png" alt="manulife" class="projects-clients-tab-icon products-icon-manulife">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-barclays.png" alt="barclays" class="projects-clients-tab-icon">
                                                      </div><div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-Schatered.png" alt="standard chartered" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="school">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-danamon.png" alt="danamon" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-btn.png" alt="btn" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bca.png" alt="bca" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-mandiri.png" alt="mandiri" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bii.png" alt="bii" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-hsbc.png" alt="hsbc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-dbs.png" alt="dbs" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-citibank.png" alt="citibank" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bni.png" alt="bni" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-zurich.png" alt="zurich" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-commonwealth.png" alt="commonwealth" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-manulife.png" alt="manulife" class="projects-clients-tab-icon products-icon-manulife">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-barclays.png" alt="barclays" class="projects-clients-tab-icon">
                                                      </div><div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-Schatered.png" alt="standard chartered" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="work">
                        <div class="projects-col-unique">
                            <h1><span style="opacity:0.6;">CLIENTS &amp;<br></span> SCOPE OF WORK</h1>
                            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                            
                            <div class="form-group input-group projects-form">
                              <input type="text" class="form-control projects-search" placeholder="Search for...">
                              <div class="input-group-append">
                                <a href=""><span class="fa fa-search form-control-feedback"></span></a>
                              </div>
                            </div>
                        </div>
                            
                        <div class="container-fluid products-contain-final">
                            <div class="row projects-tab-layout">
                                <div class="col-md-4 col-4" style="position:fixed;">
                                  <ul class="nav nav-tabs-shadow nav-tabs-border products-nav-custom projects-nav-custom" style="display: block;">
                                    <li class="nav-item">
                                      <a class="nav-link active" data-toggle="tab" href="#institution">
                                        <h6 class="projects-nav-title">BANKING / INSURANCE / FINANCIAL INSTITUTION</h6>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#retail">
                                        <h6 class="projects-nav-title">COMMERCIAL / RETAIL</h6>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#data">
                                        <h6 class="projects-nav-title">DATA CENTER</h6>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#hospital">
                                        <h6 class="projects-nav-title">HOSPITAL</h6>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#hotels">
                                        <h6 class="projects-nav-title">HOTELS</h6>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#office">
                                        <h6 class="projects-nav-title">OFFICE BUILDINGS</h6>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#others">
                                        <h6 class="projects-nav-title">OTHERS</h6>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#residential">
                                        <h6 class="projects-nav-title">RESIDENTIAL</h6>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#school">
                                        <h6 class="projects-nav-title">SCHOOL / UNIVERSITY</h6>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                                
                                <div class="col-md-8 offset-md-4 col-8 offset-4">
                                    <div class="tab-content">

                                        <div class="tab-pane fade show active" id="institution">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-danamon.png" alt="danamon" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-btn.png" alt="btn" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bca.png" alt="bca" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-mandiri.png" alt="mandiri" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bii.png" alt="bii" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-hsbc.png" alt="hsbc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-dbs.png" alt="dbs" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-citibank.png" alt="citibank" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bni.png" alt="bni" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-zurich.png" alt="zurich" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-commonwealth.png" alt="commonwealth" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-manulife.png" alt="manulife" class="projects-clients-tab-icon products-icon-manulife">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-barclays.png" alt="barclays" class="projects-clients-tab-icon">
                                                      </div><div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-Schatered.png" alt="standard chartered" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="tab-pane fade" id="retail">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-giant.png" alt="giant" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-hypermart.png" alt="hypermart" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-itc.png" alt="itc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-makro.png" alt="makro" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-manggadua.png" alt="manggadua" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-moi.png" alt="moi" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-shell.png" alt="shell" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-starbucks.png" alt="starbucks" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo2-tangcity.png" alt="tangcity" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="tab-pane fade" id="data">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-danamon.png" alt="danamon" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-btn.png" alt="btn" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bca.png" alt="bca" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-mandiri.png" alt="mandiri" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bii.png" alt="bii" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-hsbc.png" alt="hsbc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-dbs.png" alt="dbs" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-citibank.png" alt="citibank" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bni.png" alt="bni" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-zurich.png" alt="zurich" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-commonwealth.png" alt="commonwealth" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-manulife.png" alt="manulife" class="projects-clients-tab-icon products-icon-manulife">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-barclays.png" alt="barclays" class="projects-clients-tab-icon">
                                                      </div><div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-Schatered.png" alt="standard chartered" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="tab-pane fade" id="hospital">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-danamon.png" alt="danamon" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-btn.png" alt="btn" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bca.png" alt="bca" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-mandiri.png" alt="mandiri" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bii.png" alt="bii" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-hsbc.png" alt="hsbc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-dbs.png" alt="dbs" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-citibank.png" alt="citibank" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bni.png" alt="bni" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-zurich.png" alt="zurich" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-commonwealth.png" alt="commonwealth" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-manulife.png" alt="manulife" class="projects-clients-tab-icon products-icon-manulife">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-barclays.png" alt="barclays" class="projects-clients-tab-icon">
                                                      </div><div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-Schatered.png" alt="standard chartered" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="hotels">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-danamon.png" alt="danamon" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-btn.png" alt="btn" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bca.png" alt="bca" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-mandiri.png" alt="mandiri" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bii.png" alt="bii" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-hsbc.png" alt="hsbc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-dbs.png" alt="dbs" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-citibank.png" alt="citibank" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bni.png" alt="bni" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-zurich.png" alt="zurich" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-commonwealth.png" alt="commonwealth" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-manulife.png" alt="manulife" class="projects-clients-tab-icon products-icon-manulife">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-barclays.png" alt="barclays" class="projects-clients-tab-icon">
                                                      </div><div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-Schatered.png" alt="standard chartered" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="office">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-danamon.png" alt="danamon" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-btn.png" alt="btn" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bca.png" alt="bca" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-mandiri.png" alt="mandiri" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bii.png" alt="bii" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-hsbc.png" alt="hsbc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-dbs.png" alt="dbs" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-citibank.png" alt="citibank" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bni.png" alt="bni" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-zurich.png" alt="zurich" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-commonwealth.png" alt="commonwealth" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-manulife.png" alt="manulife" class="projects-clients-tab-icon products-icon-manulife">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-barclays.png" alt="barclays" class="projects-clients-tab-icon">
                                                      </div><div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-Schatered.png" alt="standard chartered" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="others">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-danamon.png" alt="danamon" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-btn.png" alt="btn" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bca.png" alt="bca" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-mandiri.png" alt="mandiri" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bii.png" alt="bii" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-hsbc.png" alt="hsbc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-dbs.png" alt="dbs" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-citibank.png" alt="citibank" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bni.png" alt="bni" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-zurich.png" alt="zurich" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-commonwealth.png" alt="commonwealth" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-manulife.png" alt="manulife" class="projects-clients-tab-icon products-icon-manulife">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-barclays.png" alt="barclays" class="projects-clients-tab-icon">
                                                      </div><div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-Schatered.png" alt="standard chartered" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="residential">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-danamon.png" alt="danamon" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-btn.png" alt="btn" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bca.png" alt="bca" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-mandiri.png" alt="mandiri" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bii.png" alt="bii" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-hsbc.png" alt="hsbc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-dbs.png" alt="dbs" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-citibank.png" alt="citibank" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bni.png" alt="bni" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-zurich.png" alt="zurich" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-commonwealth.png" alt="commonwealth" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-manulife.png" alt="manulife" class="projects-clients-tab-icon products-icon-manulife">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-barclays.png" alt="barclays" class="projects-clients-tab-icon">
                                                      </div><div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-Schatered.png" alt="standard chartered" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="school">
                                            <div class="container">
                                                <div class="row text-center">
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-danamon.png" alt="danamon" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-btn.png" alt="btn" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bca.png" alt="bca" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-mandiri.png" alt="mandiri" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bii.png" alt="bii" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-hsbc.png" alt="hsbc" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-dbs.png" alt="dbs" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-citibank.png" alt="citibank" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-bni.png" alt="bni" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-zurich.png" alt="zurich" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-commonwealth.png" alt="commonwealth" class="projects-clients-tab-icon">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-manulife.png" alt="manulife" class="projects-clients-tab-icon products-icon-manulife">
                                                      </div>
                                                      <div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-barclays.png" alt="barclays" class="projects-clients-tab-icon">
                                                      </div><div class="col-md-4 col-6">
                                                          <img src="{{route('assets')}}/images/logo1-Schatered.png" alt="standard chartered" class="projects-clients-tab-icon">
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                        
                                    </div>
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
                <div class="form-group input-group">
                    <input type="text" class="form-control navbarasfooter-subscribe-placeholder" placeholder="Enter e-mail address">
                    <div class="input-group-append ml-4">
                        <i class="fas fa-arrow-right fs30-12" style="color:white;"></i>
                     </div>
                </div>
            </div>
            
        </div>
    </div>
</header>
<!-- /footer 1 -->

@stop