<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $page->description }}">
    <meta name="keywords" content="{{ $page->name }}">
    <meta property="og:title" content="EPCON | {{ $page->name }}" />
	  <meta property="og:type" content="website" />
	  <meta property="og:description" content="{{ $page->description }}" />
    <title>EPCON | {{ $page->name }}</title>

    <!-- Styles -->
    <link href="{{route('assets')}}/css/page.min.css" rel="stylesheet">
    <link href="{{route('assets')}}/css/style.css" rel="stylesheet">
    <link href="{{route('assets')}}/css/custom.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Prompt:400,500,700,800&display=swap" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{route('assets')}}/images/faviconiibc2020.png">
    <link rel="icon" href="{{route('assets')}}/images/faviconiibc2020.png">
    <meta name="api-base-url" content="{{route('index')}}">
  <link href="https:////cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
    <body>
        
<div class="container" style="position:fixed; z-index:100; width:8.33%; margin-top:5px; display:none;">
    <div class="row">
        <div class="home-offcanvas-menu">
            <a class="nav-link" href="#" data-toggle="offcanvas" data-target="#offcanvas-menu">&#9776;</a>
        </div>
    </div>
    <div class="scroll-top">
    <a href="#top"><i class="fa fa-chevron-up backtotop"></i></a>
    <a href="#top"><p class="orange r90">back to top</p></a>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bignavbar-top" data-navbar="smart">
    <div class="container">
      <div class="row">

        <div class="col-lg-5">
          <section class="navbar-mobile">
            <nav class="nav nav-navbar">
              @foreach($menus[0] as $menu)
                @foreach($menu->menu_contents as $menu_content)
                  @if(array_key_exists(3, preg_split('#/#', $current_page)) && preg_split('#/#', $current_page)[3] == preg_split('#/#', $menu_content->url)[3])
                    <a class="nav-link nav-top active" href="{{$menu_content->url}}">{{$menu_content->name}}</a>
                  @else
                    <a class="nav-link nav-top" href="{{$menu_content->url}}">{{$menu_content->name}}</a>
                  @endif
                @endforeach    
              @endforeach
            </nav>
          </section>
        </div>

        <div class="col-7 col-lg-2 text-lg-center">
            <div class="navbar-left mr-4">
              <button class="navbar-toggler" type="button"><span class="navbar-toggler-icon"></span></button>
                <a class="navbar-brand" href="#">
                    <img class="logo-dark" src="{{route('assets')}}/images/0-logowhite.png" alt="logo">
                    <img class="logo-light" src="{{route('assets')}}/images/0-logowhite.png" alt="logo">
                </a>
            </div>
        </div>

        <div class="col-lg-5">
          <section class="navbar-mobile">
            <nav class="nav nav-navbar">
              @foreach($menus[1] as $menu)
                  @foreach($menu->menu_contents as $menu_content)
                      @if(array_key_exists(3, preg_split('#/#', $current_page)) && preg_split('#/#', $current_page)[3] == preg_split('#/#', $menu_content->url)[3])
                        <a class="nav-link nav-top active" href="{{$menu_content->url}}">{{$menu_content->name}}</a>
                      @else
                        <a class="nav-link nav-top" href="{{$menu_content->url}}">{{$menu_content->name}}</a>
                      @endif
                  @endforeach
              @endforeach
            </nav>
          </section>
        </div>

      </div>
    </div>
  </nav>
        
    @yield('content')
        
    <!-- Navbar as Footer -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="position:relative; background-color:#414143;">
        <div class="container">

          <section class="navbar-mobile">
            <nav class="nav nav-navbar mr-auto text-white">
              @foreach($menus[2] as $menu)
                        @foreach($menu->menu_contents as $menu_content)
                          @if(array_key_exists(3, preg_split('#/#', $current_page)) && preg_split('#/#', $current_page)[3] == preg_split('#/#', $menu_content->url)[3])
                            <a class="nav-link active" href="{{$menu_content->url}}">{{$menu_content->name}}</a>
                          @else
                            <a class="nav-link" href="{{$menu_content->url}}">{{$menu_content->name}}</a>
                          @endif
                        @endforeach
                @endforeach
            </nav>
          </section>

          <section class="navbar-footer-mobile">
            <nav class="nav nav-navbar mr-auto text-white">
              @foreach($menus[2] as $menu)
                        @foreach($menu->menu_contents as $menu_content)
                          @if(array_key_exists(3, preg_split('#/#', $current_page)) && preg_split('#/#', $current_page)[3] == preg_split('#/#', $menu_content->url)[3])
                            <a class="nav-link active" href="{{$menu_content->url}}">{{$menu_content->name}}</a>
                          @else
                            <a class="nav-link" href="{{$menu_content->url}}">{{$menu_content->name}}</a>
                          @endif
                        @endforeach
                @endforeach
            </nav>
          </section>

        </div>
    </nav>
    
    <div class="container-fluid" style="margin-top:50px; margin-bottom:50px">
        <div class="row">
            <div class="col-md-4 offset-md-1">
                <img src="{{route('assets')}}/images/0-logocolor.png" alt="EPCON">
                <h6 class="text-footer mt20px"> {{$content[93]->description}}<br/>{{$content[96]->description}}</h6>
                <p class="copyright">{{$content[94]->description}}</p>
            </div>
            
            <div class="col-md-3 offset-md-3 col-10 offset-1" style="padding-top:20px">
                <div class="row mb10px">
                    <table style="width:100%">
                      <tr>
                        <td style="width:20%"><img src="{{route('assets')}}/images/0-footer-icon1.png" class="image-footer" alt="icon-phone"></td>
                        <td><p style="font-size: 16px;">{{$content[91]->description}}</p></td>
                      </tr>
                      <tr>
                        <td style="width:20%"><img src="{{route('assets')}}/images/0-footer-icon2.png" class="image-footer" alt="icon-fax"></td>
                        <td><p style="font-size: 16px;">{{$content[92]->description}}</p></td>
                      </tr>
                      <tr>
                        <td style="width:20%"><img src="{{route('assets')}}/images/0-footer-icon3.png" class="image-footer" alt="icon-email"></td>
                        <td><p style="font-size: 16px;">{{$content[95]->description}}</p></td>
                      </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Offcanvas Menu -->
    <div id="offcanvas-menu" class="offcanvas text-white w-300 px-7" data-animation="slide-left" style="background-color: rgba(32,68,147,1)">
          <button type="button" class="close position-static px-0" data-dismiss="offcanvas" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <nav class="nav nav-lead flex-column my-7 text-right">
            @foreach($menus[2] as $menu)
                @foreach($menu->menu_contents as $menu_content)
                    @if(array_key_exists(3, preg_split('#/#', $current_page)) && preg_split('#/#', $current_page)[3] == preg_split('#/#', $menu_content->url)[3])
                      <a class="nav-link active" href="{{$menu_content->url}}">{{$menu_content->name}}</a>
                    @else
                      <a class="nav-link" href="{{$menu_content->url}}">{{$menu_content->name}}</a>
                    @endif
                @endforeach
            @endforeach
          </nav>
        <div class="logo">
          <img src="{{route('assets')}}/images/0-logowhite.png" alt="logo epcon">
        </div>
    </div>
    <!-- scripts -->
    <script src="{{route('assets')}}/js/page.min.js"></script>
    <script src="{{route('assets')}}/js/script.js"></script>
    
    <script>
        $('button').on('click', function(){
            $('button').removeClass('selected');
            $(this).addClass('selected');
        });
    </script>
      
    </body>
</html>

