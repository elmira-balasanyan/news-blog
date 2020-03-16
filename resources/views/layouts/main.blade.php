@include('layouts.header')

@yield('content')
    </div>
</div>


<!-- jQuery -->
<script src='{{ asset('assets/js/jquery.min.js') }}'></script>
<!-- jQuery Easing -->
<script src='{{ asset('assets/js/jquery.easing.1.3.js') }}'></script>
<!-- Bootstrap -->
<script src='{{ asset('assets/js/bootstrap.min.js') }}'></script>
<!-- Waypoints -->
<script src='{{ asset('assets/js/jquery.waypoints.min.js') }}'></script>
<!-- Flexslider -->
<script src='{{ asset('assets/js/jquery.flexslider-min.js') }}'></script>
<!-- Magnific Popup -->
<script src='{{ asset('assets/js/jquery.magnific-popup.min.js') }}'></script>
<script src='{{ asset('assets/js/magnific-popup-options.js') }}'></script>
<!-- Owl Carousel -->
<script src='{{ asset('assets/js/owl.carousel.min.js') }}'></script>
<!-- Sticky Kit -->
<script src='{{ asset('assets/js/sticky-kit.min.js') }}'></script>


<!-- MAIN JS -->
<script src='{{ asset('assets/js/main.js') }}'></script>

<script src='https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js'></script>

@yield('script')
</body>
</html>




