{{-- Whatsapp conect --}}
<div class="whatsapp-chat">
    <a href="https://wa.me/+213549380267?text=I'm%20interested%20in%20your%20car%20for%20sale" target="_blank">
        <i class="bi bi-whatsapp"></i>
    </a>
</div>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/644ef2b04247f20fefeea3ee/1gva6811i';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->


{{-- Path and link Bootstrap sidebar --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('bootstrap513/js/bootstrap.min.js')}}">
{{-- CND FontAwesome Icon  --}}
<script src="https://kit.fontawesome.com/3944423be1.js" crossorigin="anonymous"></script>

{{-- Path js owl carousel --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="{{ asset('owl/js/jquery-3.6.4.min.js')}}"></script>
<script src="{{ asset('owl/js/owl.carousel.min.js')}}"></script>

<script src="{{ asset('front-css/js/custom.js')}}"></script>
<script src="{{ asset('front-css/js/checkout.js')}}"></script>

{{-- CND SxeetAlert 2  --}}
<script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>

{{-- jQ --}}
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

{{-- JavaScript And jQuery For Search Products--}}
<script>

    var availableTags = [];

    $.ajax({
        method: "GET",
        url: "/product-list",
        success: function (response) {
            // console.log(response);
            startAutoComplete(response);
        }
    });

    function startAutoComplete(availableTags)
    {
        $( "#search_product" ).autocomplete({
            source: availableTags
        });
    }
</script>
{{-- JavaScript for sweet alert --}}
@if (session('status'))
    <script>
            Swal.fire({
            icon: 'success',
            title: 'success',
            text: "{{ session('status') }}",
            showConfirmButton: false,
            timer: 5000
        })
    </script>
@endif

@if (session('statuserror'))
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ session('statuserror') }}",
        showConfirmButton: false,
        timer: 5500
        })
    </script>
@endif
@if (session('statusalart'))
    <script>
        Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: "{{ session('statusalart') }}",
        showConfirmButton: false,
        timer: 5500
        })
    </script>
@endif
@yield('scripts')
</body>
</html>
