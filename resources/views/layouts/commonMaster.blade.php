<!DOCTYPE html>

<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="{{ asset('/assets') . '/' }}"
    data-base-url="{{ url('/') }}" data-framework="laravel" data-template="vertical-menu-laravel-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | Accord 360</title>
    <meta name="description"
        content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
    <meta name="keywords"
        content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Canonical SEO -->
    <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
        integrity="sha256-zaSoHBhwFdle0scfGEFUCwggPN7F+ip9XRglo8IWb4w=" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jqueryui@1.11.1/jquery-ui.min.css"
        integrity="sha256-orjEV2zLazjvpIqT0mVRAYVbewIvSmbv6s+l8tW9Xxg=" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css"
        integrity="sha256-h2Gkn+H33lnKlQTNntQyLXMWq7/9XI2rlPCsLsVcUBs=" crossorigin="anonymous">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    {{-- <style>
        .select2-container--default .select2-selection--single {
            height: 50px;
        }
        </style> --}}
         @stack('body-style')

    <!-- Include Styles -->
    @include('layouts/sections/styles')

    <!-- Include Scripts for customizer, helper, analytics, config -->
    @include('layouts/sections/scriptsIncludes')
</head>

<body>


    <!-- Layout Content -->
    @yield('layoutContent')
    <!--/ Layout Content -->



    <!-- Include Scripts -->



    @include('layouts/sections/scripts')

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.0.0/dist/jquery.min.js"
        integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"
        integrity="sha256-9yRP/2EFlblE92vzCA10469Ctd0jT48HnmmMw5rJZrA=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/jqueryui@1.11.1/jquery-ui.min.js"
        integrity="sha256-4JY5MVcEmAVSuS6q4h9mrwCm6KNx91f3awsSQgwu0qc=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"
        integrity="sha256-O11zcGEd6w4SQFlm8i/Uk5VAB+EhNNmynVLznwS6TJ4=" crossorigin="anonymous"></script>

    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


     <script>
     $(document).ready(function () {
    // Attach click event to all elements with class 'mark-read'
    $('.mark-read').on('click', function () {
        var requestId = $(this).data('id');  // Get the request ID from data-id attribute

        // Fetch the correct route using a hidden input or inline PHP
        var markReadUrl = "{{ route('mark-read', ':id') }}";  // Use placeholder for ID
        markReadUrl = markReadUrl.replace(':id', requestId);  // Replace placeholder with actual ID

        // Send an AJAX request to mark the request as read
        $.ajax({
            url: markReadUrl,
            type: 'POST',
            data: {
                id: requestId,
                _token: $('meta[name="csrf-token"]').attr('content')  // Send the CSRF token
            },
            success: function (data) {
                // Debug: Log response data
                console.log('Response:', data);

                if (data.success) {
                    // Remove the dot if no other requests are open
                    if (data.allRead) {
                        $('.dot-indicator').remove();  // Remove the notification dot
                    }

                    // Optionally hide or update the clicked item
                    var clickedItem = $(this).closest('li');
                    if (clickedItem) {
                        clickedItem.remove();  // Remove the list item
                    }
                } else {
                    console.error('Failed to mark as read.');
                }
            },
            error: function (error) {
                console.error('Error in AJAX request:', error);
            }
        });
    });
});
      </script>



        @stack('body-scripts')
        @yield('page-scriptt')


</body>

</html>
