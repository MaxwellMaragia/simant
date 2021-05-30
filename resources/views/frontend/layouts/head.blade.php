
@section('meta')
@show



<!-- Standard Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

<!-- For iPhone 4 Retina display: -->
<link rel="apple-touch-icon-precomposed" href="{{ asset('favicon.ico') }}">

<!-- For iPad: -->
<link rel="apple-touch-icon-precomposed" href="{{ asset('favicon.ico') }}">

<!-- For iPhone: -->
<link rel="apple-touch-icon-precomposed" href="{{ asset('favicon.ico') }}">

<!-- Library - Google Font Familys -->
<link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700%7cMontserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Library -->
<link href="{{ asset('frontend/assets/css/lib.css')}}" rel="stylesheet">

<!-- Custom - Common CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/rtl.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css')}}">

<!--[if lt IE 9]>
<script src="{{ asset('frontend/js/html5/respond.min.js')}}"></script>
<![endif]-->

  @section('headSection')
    @show
