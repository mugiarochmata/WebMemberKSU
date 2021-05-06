<!DOCTYPE html>
<html lang="en">

<head>
  @include('layout.partials.head')
</head>
@if(Route::is(['map-grid']))

<body class="map-page">
  @endif
  @if(Route::is(['chat-doctor','chat']))

  <body class="chat-page">
    @endif
    @if(Route::is(['doctor-register','forgot-password','login','register']))

    <body class="account-page">
      @endif
      @if(Route::is(['video-call','voice-call']))

      <body class="call-page">
        @endif
        @include('layout.partials.header')
        @yield('content')
        @if(!Route::is(['chat-doctor','map-grid','map-list','chat','voice-call','video-call']))
        @include('layout.partials.footer')
        @endif
        @include('layout.partials.footer-scripts')
      </body>

</html>
<script>
  $(document).ready(function() {
    // alert(1);
    /*$('.submenu li a').click(function(){
      $(.submenu li a).removeClass("active");
      $(this).addClass("active");
      $('.has-submenu a').removeClass("active");
      $('.has-submenu a').addClass("active");
      
      //$(this).toggleClass("active");
    });*/
  });
</script>