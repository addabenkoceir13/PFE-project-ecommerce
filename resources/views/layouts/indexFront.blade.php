{{-- Start includes  --}}
@include('layouts.includes.Frontend.head')
{{-- Start Body --}}
<body class="bd-page">
    {{-- Navbar --}}
    @include('layouts.includes.Frontend.navbar')

    @yield('content')

    {{-- Footer --}}
    @include('layouts.includes.Frontend.footer')
{{-- Start includes path, link, fine and end tag body & html  --}}
@include('layouts.includes.Frontend.fine')

