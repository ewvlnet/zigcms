<!-- ==============================================================
    Zigcms 1.0.0
    Author: Eric Weber
    Website: ZigCMS <https://zigcms.com/>
    Github: <https://github.com/ewvlnet>
    License: Open source - MIT <https://opensource.org/licenses/MIT>

    Theme Layout:.
    https://themewagon.com/themes/free-responsive-bootstrap-5-html5-admin-template-sneat/
    https://demos.themeselection.com/sneat-bootstrap-html-admin-template-free/html/
============================================================== -->
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="/profile/assets/"
    data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <title>{{ $title ?? __('Title Page') }}</title>
    <meta name="description" content="ZigCMS - Free CMS">
    <meta name="author" content="Eric Weber">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/site/assets/img/favicons/favicon.ico"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/profile/assets/vendor/fonts/boxicons.css"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="/profile/assets/vendor/css/core.css" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="/profile/assets/vendor/css/theme-default.css" class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="/profile/assets/css/demo.css"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/profile/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"/>

    <link rel="stylesheet" href="/profile/assets/vendor/libs/apex-charts/apex-charts.css"/>
    <link href="/profile/assets/css/custom.css" rel="stylesheet"/>

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/profile/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/profile/assets/js/config.js"></script>
    {{$css ?? ''}}
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        <div class="layout-page">
            <div class="content-wrapper">
                {{$slot}}
                <div class="content-backdrop fade"></div>
            </div>
        </div>

    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="/profile/assets/vendor/libs/jquery/jquery.js"></script>
<script src="/profile/assets/vendor/libs/popper/popper.js"></script>
<script src="/profile/assets/vendor/js/bootstrap.js"></script>
<script src="/profile/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="/profile/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="/profile/assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="/profile/assets/js/main.js"></script>

<!-- Page JS -->
<script src="/profile/assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
{{$js ?? ''}}
</body>
</html>
