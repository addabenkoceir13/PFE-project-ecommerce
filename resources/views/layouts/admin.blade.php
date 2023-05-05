{{-- Start includes  --}}
@include('layouts.includes.Admin.head')
{{-- Start Body --}}
<body>
    <div class="d-flex" id="wrapper">
        {{--  --}}
        @include('layouts.includes.Admin.sidebar')
        <!-- Start  Page content wrapper-->
        <div id="page-content-wrapper">
        {{--  --}}
        @include('layouts.includes.Admin.navbar')
        <!-- Start Page content-->
        <div class="container-fluid">
            <h4 class="mt-4">@yield('title-page-cat' , 'Page Unknow')</h4>
            <div class="card">
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- End Page content-->
    </div>
    <!-- End  Page content wrapper-->
</div>



{{-- Start includes path, link, fine and end tag body & html  --}}
    @include('layouts.includes.Admin.footer')

