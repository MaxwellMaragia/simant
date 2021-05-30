<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.layouts.head')
</head>
<body data-offset="200" data-spy="scroll" data-target=".ownavigation">
<!-- Loader -->
<div id="site-loader" class="load-complete">
    <div class="loader">
        <div class="line-scale"><div></div><div></div><div></div><div></div><div></div></div>
    </div>
</div><!-- Loader /- -->

<!-- Header Section -->
@include('frontend.layouts.header')
<!-- Header Section /- -->
<div class="clearfix"></div>

<div class="main-container">

    <main class="site-main">

        <!-- Slider Section -->
    @section('slider')
    @show
    <!-- Slider Section /- -->

        <!-- Page Content -->
        <div class="container-fluid no-left-padding no-right-padding page-content">
            <!-- Container -->
            <div class="container">
                <div class="row">
                    <!-- Content Area -->
                @section('main-content')

                @show
                <!-- Content Area /- -->
                    <!-- Widget Area -->
                @include('frontend.layouts.sidebar')
                <!-- Widget Area /- -->
                </div>
            </div><!-- Container /- -->
        </div><!-- Page Content /- -->

    </main>

</div>



@include('frontend.layouts.footer')

</body>
</html>

