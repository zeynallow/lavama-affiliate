<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Hypeople">
    <meta name="description" content="Responsive, Highly Customizable Dashboard Template"/>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/app-assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/app-assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/app-assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/app-assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="/app-assets/favicon/safari-pinned-tab.svg" color="#0010f7">
    <meta name="msapplication-TileColor" content="#0010f7">
    <meta name="theme-color" content="#ffffff">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet"/>

    <!-- Plugin -->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugin/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/icons/iconly/index.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/icons/remix-icon/index.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">

    <!-- Base -->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/base/typography.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/base/base.css">

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/theme/colors-dark.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/theme/theme-dark.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/custom-rtl.css">

    <!-- Layouts -->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/layouts/sider.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/layouts/header.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/layouts/page-content.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">

    @stack('css')

    <title>Lavama</title>
</head>

<body>

@yield('main')

<div class="scroll-to-top">
    <button type="button" class="btn btn-primary btn-icon-only rounded-circle hp-primary-shadow">
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="16px" width="16px"
             xmlns="http://www.w3.org/2000/svg">
            <g>
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path d="M13 7.828V20h-2V7.828l-5.364 5.364-1.414-1.414L12 4l7.778 7.778-1.414 1.414L13 7.828z"></path>
            </g>
        </svg>
    </button>
</div>

<!-- Toast -->
<div class="position-fixed top-0 end-0 p-16" style="z-index: 99">
    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="toast-title me-auto">Bootstrap</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body"></div>
    </div>
</div>

<!-- Plugin -->
<script src="/app-assets/js/plugin/jquery.min.js"></script>
<script src="/app-assets/js/plugin/bootstrap.bundle.min.js"></script>
<script src="/app-assets/js/plugin/swiper-bundle.min.js"></script>
<script src="/app-assets/js/plugin/jquery.mask.min.js"></script>
<script src="/app-assets/js/plugin/autocomplete.min.js"></script>
<script src="/app-assets/js/plugin/moment.min.js"></script>

<!-- Layouts -->
<script src="/app-assets/js/layouts/header-search.js"></script>
<script src="/app-assets/js/layouts/sider.js"></script>
<script src="/app-assets/js/components/input-number.js"></script>

<!-- Base -->
<script src="/app-assets/js/base/index.js"></script>

<!-- Custom -->
<script src="/assets/js/main.js"></script>


@if(Session::has('success'))
    <script type="text/javascript">
        showLiveToaster('success', 'Success', '{{ Session::get('success')}}');
    </script>
@endif

@if(Session::has('error'))
    <script type="text/javascript">
        showLiveToaster('error', 'Error', '{{ Session::get('error')}}');
    </script>
@endif

@stack('js')

</body>

</html>
