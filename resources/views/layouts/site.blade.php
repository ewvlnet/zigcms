<!-- ==============================================================
    Zigcms 1.0.0
    Author: Eric Weber
    Website: ZigCMS <https://zigcms.com/>
    Github: <https://github.com/ewvlnet>
    License: Open source - MIT <https://opensource.org/licenses/MIT>

    Theme Layout:.
    https://themewagon.com/themes/quriarbox-free-bootstrap-5-html5-courier-service-website-template/
    https://themewagon.github.io/courier/v1.0.0/
============================================================== -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-TileImage" content="/site/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="ZigCMS - Free CMS">
    <meta name="author" content="Eric Weber">
    <title>{{ $title ?? __('Title Page') }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="/site/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="/site/assets/img/favicons/manifest.json">

    <link href="/site/assets/css/theme.css" rel="stylesheet"/>
    <link href="/site/assets/css/custom.css" rel="stylesheet"/>
    {{$css ?? ''}}
</head>
<body>
<main class="main col-lg-8 mx-auto p-3 py-md-5" id="top">
    <x-site.navigation/>
    {{$hero??''}}
    <div class="row">
        <div class="col-md-8">
            {{$slot}}
        </div>
        <x-aside />
    </div>
</main>
<x-site.footer/>

<script src="/site/vendors/@popperjs/popper.min.js"></script>
<script src="/site/vendors/bootstrap/bootstrap.min.js"></script>
<script src="/site/vendors/is/is.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="/site/vendors/fontawesome/all.min.js"></script>
<script src="/site/assets/js/theme.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
{{$js ?? ''}}
</body>
</html>
