
<!DOCTYPE html>
<html lang="vi">
    <head>
        @if(View::hasSection('head'))
            @yield('head')
        @else
            <meta name="description" content="Gọi vốn cộng đồng hỗ trợ khởi nghiệp startup Việt Nam. Dự án huy động vốn từ cộng đồng, quỹ đầu tư." />
            <meta name="keywords" content="gọi vốn cộng đồng, crowdfunding, startup, khởi nghiệp, ý tưởng kinh doanh, gây quỹ cộng đồng, huy động vốn" />
            <meta property="og:image" content="{{ asset('/favicon.ico') }}" />
            <meta property="og:title" content="FundStart - Nền tảng gọi vốn cộng đồng uy tín, chuyên nghiệp cho khởi nghiệp Việt Nam" />
            <meta property="og:url" content="http://www.fundstart.vn/" />
            <meta property="og:description" content="Gọi vốn cộng đồng hỗ trợ khởi nghiệp startup Việt Nam. Dự án huy động vốn từ cộng đồng, quỹ đầu tư." />
            <meta property="og:keywords" content="fundstart, gọi vốn cộng đồng, crowdfunding, gây quỹ cộng đồng" />
            <meta property="og:type" content="website" />
        @endif
    @include("layouts.partials.htmlheader")
    </head>
    <body class="@yield("body_class")">
        <div id="app-loading"></div>
        @include("layouts.partials.mainheader")
        @include("layouts.partials.sidebar")
        <div id="main" role="main">

            <!-- RIBBON -->
            <div id="ribbon">
                @stack("ribbon")
            </div>
            <div id="content">
                @yield("content")
            </div>
        </div>
        @if(!$hidden_footer)
            @include("layouts.partials.footer")
        @endif
        @include("layouts.partials.script")
    </body>

</html>