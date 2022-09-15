<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title")</title>
    @include("layouts.backend.style")

</head>

<body>
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include("layouts.backend.navbar")
        @include("layouts.backend.sidebar")
        <div class="page-wrapper">
            @yield("content")
            <footer class="footer text-center">
                All Rights Reserved by Xtreme Admin. Designed and Developed by {{date('Y')}}.
            </footer>
        </div>
    </div>

    @include("layouts.backend.script")
</body>

</html>