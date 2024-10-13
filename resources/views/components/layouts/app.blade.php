<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-navbar-fixed layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../../assets/"
    data-template="vertical-menu-template-no-customizer-starter">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title>JMCGeoMaster</title>

        <meta name="description" content="" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet" />

        <!-- Icons -->
        <link rel="stylesheet" href="{{asset('vendor/fonts/fontawesome.css')}}"/>
        <link rel="stylesheet" href="{{asset('vendor/fonts/tabler-icons.css')}}" />
        <link rel="stylesheet" href="{{asset('vendor/fonts/flag-icons.css')}}" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{asset('vendor/css/rtl/core.css')}}" />
        <link rel="stylesheet" href="{{asset('vendor/css/rtl/theme-default.css')}}" />
        <link rel="stylesheet" href="{{asset('css/demo.css')}}" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
        <link rel="stylesheet" href="{{asset('vendor/libs/node-waves/node-waves.css')}}" />

        <link rel="stylesheet" href="{{asset('vendor/libs/typeahead-js/typeahead.css')}}" />
        <link rel="stylesheet" href="{{asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
        <link rel="stylesheet" href="{{asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
        <link rel="stylesheet" href="{{asset('vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />
        <link rel="stylesheet" href="{{asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
        <link rel="stylesheet" href="{{asset('vendor/libs/flatpickr/flatpickr.css')}}" />

        <link rel="stylesheet" href="{{asset('vendor/libs/quill/typography.css')}}" />
        <link rel="stylesheet" href="{{asset('vendor/libs/quill/katex.css')}}" />
        <link rel="stylesheet" href="{{asset('vendor/libs/quill/editor.css')}}" />

        <link rel="stylesheet" href="{{asset('vendor/libs/dropzone/dropzone.css')}}" />
        <link rel="stylesheet" href="{{asset('vendor/libs/swiper/swiper.css')}}" />
        <link rel="stylesheet" href="{{asset('vendor/css/pages/ui-carousel.css')}}" />

        <!-- Row Group CSS -->
        <link rel="stylesheet" href="{{asset('vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}" />
        <!-- Form Validation -->
        <link rel="stylesheet" href="{{asset('vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
        <!-- Page CSS -->

        <!-- Helpers -->
        <script src="{{asset('vendor/js/helpers.js')}}"></script>

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="{{asset('js/config.js')}}"></script>

        @livewireStyles
        @stack('styles')
    </head>

    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('components.layouts.partials.menu')
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    @include('components.layouts.partials.navbar')
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->
                        {{ $slot }}
                        <!-- / Content -->

                        <!-- Footer -->
                        @include('components.layouts.partials.footer')
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>

            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>
        </div>
        <!-- / Layout wrapper -->

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="{{asset('vendor/libs/jquery/jquery.js')}}"></script>
        <script src="{{asset('vendor/libs/popper/popper.js')}}"></script>
        <script src="{{asset('vendor/js/bootstrap.js')}}"></script>
        <script src="{{asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('vendor/libs/node-waves/node-waves.js')}}"></script>

        <script src="{{asset('vendor/libs/hammer/hammer.js')}}"></script>
        <script src="{{asset('vendor/libs/i18n/i18n.js')}}"></script>
        <script src="{{asset('vendor/libs/typeahead-js/typeahead.js')}}"></script>

        <script src="{{asset('vendor/js/menu.js')}}"></script>

        <script src="{{asset('vendor/libs/quill/katex.js')}}"></script>
        <script src="{{asset('vendor/libs/quill/quill.js')}}"></script>

        <script src="{{asset('vendor/libs/dropzone/dropzone.js')}}"></script>
        <!-- endbuild -->

        <!-- Flat Picker -->
        <script src="{{asset('vendor/libs/moment/moment.js')}}"></script>
        <script src="{{asset('vendor/libs/flatpickr/flatpickr.js')}}"></script>

        <!-- Vendors JS -->
        <script src="{{asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>

        <!-- Main JS -->
        <script src="{{asset('js/main.js')}}"></script>

        @stack('scripts')
        @livewireScripts
    </body>
</html>
