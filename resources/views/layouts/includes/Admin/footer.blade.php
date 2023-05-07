

{{-- Path and link Bootstrap sidebar --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
{{-- <script src="{{ asset('bootstrap513/js/bootstrap.min.js')}}"></script> --}}

{{-- CND FontAwesome Icon  --}}
<script src="https://kit.fontawesome.com/3944423be1.js" crossorigin="anonymous"></script>

{{-- Path file javaScript  --}}
<script src="{{ asset('admin-css/js/scripts.js')}}"></script>

{{-- CND SxeetAlert 2  --}}
<script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

@yield('scripts')
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

</body>
</html>
