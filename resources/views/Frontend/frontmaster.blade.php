@include('Frontend.include.head')
<body>
  @include('Frontend.include.header')

  @yield('frntcontent')

@include('Frontend.include.footer')

<!-- Bootstrap core JavaScript -->

<!--<script src="vendor/jquery/jquery.slim.min.js"></script>-->
{{-- <script src="{{asset('frontEnd/vendor/jquery/jquery.min.js')}}"></script> --}}

<script src="{{asset('frontEnd/vendor/jquery/jquery.proper.min.js')}}"></script>
<script src="{{asset('frontEnd/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="{{asset('frontEnd/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontEnd/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- =====jQuery Waypoints==== -->
<script src="{{asset('frontEnd/js/waypoints.min.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery.counterup.min.js')}}"></script>

<!-- Custom scripts for this template -->
<script src="{{asset('frontEnd/js/active.js')}}"></script>

</body>

</html>
