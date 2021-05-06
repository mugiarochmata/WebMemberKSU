<script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ URL::asset('assets/js/popper.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Swiper JS -->
<script src="{{ URL::asset('assets/plugins/swiper/js/swiper.min.js')}}"></script>
<!-- Datetimepicker JS -->
<script src="{{ URL::asset('assets/js/moment.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Full Calendar JS -->
<script src="{{ URL::asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/fullcalendar/jquery.fullcalendar.js')}}"></script>
<!-- Sticky Sidebar JS -->
<script src="{{ URL::asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>
<!-- Select2 JS -->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Fancybox JS -->
<script src="{{ URL::asset('assets/plugins/fancybox/jquery.fancybox.min.js')}}"></script>
<!-- Dropzone JS -->
<script src="{{ URL::asset('assets/plugins/dropzone/dropzone.min.js')}}"></script>

<!-- Bootstrap Tagsinput JS -->
<script src="{{ URL::asset('assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>

<!-- Profile Settings JS -->
<script src="{{ URL::asset('assets/js/profile-settings.js')}}"></script>
<!-- Circle Progress JS -->
<script src="{{ URL::asset('assets/js/circle-progress.min.js')}}"></script>
<!-- Slick JS -->
<script src="{{ URL::asset('assets/js/slick.js')}}"></script>

<!-- Custom JS -->
<script src="{{ URL::asset('assets/js/script.js')}}"></script>
<script src="{{ URL::asset('assets/js/custom.min.js')}}"></script>

@if(Route::is(['map-grid','map-list']))
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6adZVdzTvBpE2yBRK8cDfsss8QXChK0I"></script>
<script src="assets/js/map.js"></script>
@endif
<script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
<script>
	var scroll = new SmoothScroll('a[href*="#"]');
</script>