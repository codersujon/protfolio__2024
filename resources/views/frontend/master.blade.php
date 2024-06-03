
        
        @include('frontend.layouts.styles')
        <!-- preloader-start -->
        <div id="preloader">
            <div class="rasalina-spin-box"></div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        @include("frontend.layouts.header")
        <!-- header-area-end -->

        <!-- main-area -->
        <main>

            @yield('main-content')

        </main>
        <!-- main-area-end -->


        <!-- Footer-area -->
        @include('frontend.layouts.footer')
        <!-- Footer-area-end -->


		<!-- JS here -->
        @include('frontend.layouts.scripts')