// const { functions } = require("lodash");

// Ajax javaScript for insart data page "Frontend/Products/view" to dataBase Frontend/Commende controller
$(document).ready(function() {

    loadcart()
    loadwishlist()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Add Cart
    $('.addToCartBtn').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id_product = $(this).closest('.product_date').find('.id_product').val();
        var qty_product = $(this).closest('.product_date').find('.qty-input').val();

        var data = {
            'id_product': $('.id_product').val(),
            'qty_product': $('.qty-input').val(),
        }
        console.log(data);

        $.ajax({
            method: "POSt",
            url: "/add-to-cart",
            data: data,
            datatype:"json",
            success: function (response){
                if (response.message) {
                    Swal.fire({
                    icon: 'success',
                    title: 'success',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
                else if(response.messageadd)
                {
                    Swal.fire({
                    icon: 'warning',
                    title: 'Already Added ',
                    text: response.messageadd,
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
                else if(response.messageerroe)
                {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops ..',
                    text: response.messageerroe,
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
            }
        })
    });

    // Add Wishlist
    $('.addToWishlist').click(function (e) {
        e.preventDefault();

        var id_product = $(this).closest('.product_date').find('.id_product').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POSt",
            url: "/add-to-wishlist",
            data: {
                'id_product':id_product
            },
            datatype:"json",
            success: function (response){
                if (response.message) {
                    Swal.fire({
                    icon: 'success',
                    title: 'success',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
                else if(response.messageerroe)
                {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops ..',
                    text: response.messageerroe,
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
            }
        })
    });

    // Delleted Item Cart Products
    // $('.delete-cart-item').click(function (e) {
    $(document).on('click','.delete-cart-item',function(e) {
        e.preventDefault();

        var id_product = $(this).closest('.product_date').find('.id_product').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data:{
                'id_product': id_product,
            },
            datatype:"json",
            success: function(response){
                // window.location.reload();
                loadcart()
                $('.cartitme').load(location.href + " .cartitme");
                if (response.message) {
                    Swal.fire({
                    icon: 'success',
                    title: 'success',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
                else if(response.messageerroe)
                {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops ..',
                    text: response.messageerroe,
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
            }
        });
    });

    // Delleted Wishlist
    // $('.remove-wishlist-item').click(function (e) {
    $(document).on('click','.remove-wishlist-item',function(e) {
        e.preventDefault();

        var id_product = $(this).closest('.product_date').find('.id_product').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "delete-wishlist-item",
            data:{
                'id_product': id_product,
            },
            datatype:"json",
            success: function(response){
                // window.location.reload();

                $('.wishlistitems').load(location.href + " .wishlistitems");
                loadwishlist()

                if (response.message) {
                    Swal.fire({
                    icon: 'success',
                    title: 'success',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
                else if(response.messageerroe)
                {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops ..',
                    text: response.messageerroe,
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
            }
        });
    });


    // Quantity Products olus and mins to "Frontend/Products/view"
    $('.btn-plus').click(function (e) {
        e.preventDefault();

        var inc_value = $(this).closest('.product_date').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
            if (value < 10)
            {
                value++;
                $(this).closest('.product_date').find('.qty-input').val(value);
            }
    });

    $('.btn-minus').click(function (e) {
        e.preventDefault();

        var dec_value = $(this).closest('.product_date').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
            if (value > 1)
            {
                value--;
                $(this).closest('.product_date').find('.qty-input').val(value);
            }
    });

    // change guantity and change price
    $('.changeQuantity').click(function (e){
        e.preventDefault();

        var id_product = $(this).closest('.product_date').find('.id_product').val();
        var qty_product = $(this).closest('.product_date').find('.qty-input').val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        data = {
            'id_product': id_product,
            'qty_product': qty_product,
        }
        console.log(data);

        $.ajax({
            method: "POST",
            url: "update_cart",
            data:data,
            success: function(response){
                window.location.reload();
                if(response.messageerroe)
                {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops ..',
                    text: response.messageerroe,
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
            }
        });
    });

    function loadcart()
    {
        $.ajax({
            method: "GET",
            url: "/load-cart-data",
            success: function(response){
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
            }
        });
    }
    function loadwishlist()
    {
        $.ajax({
            method: "GET",
            url: "/load-wishlist-count",
            success: function(response)
            {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
            }
        });
    }

    // Add Reviews
    $('.add-review').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var userreview = $('.user_review').val();
        if (!userreview)
        {
            fname_error = "Comments is required";
            $('#comments_error').html('');
            $('#comments_error').html(fname_error);
        }
        else
        {
            fname_error = '';
            $('#comments_error').html('');
        }

        var data = {
            'id_product': $('.id_product').val(),
            'name_product': $('.name_prod').val(),
            'user_review': $('.user_review').val(),
        }
        console.log(data);

        $.ajax({
            method: "POSt",
            url: "/add-review",
            data: data,
            datatype:"json",
            success: function (response){

                if (response.message) {
                    window.location.reload();
                    Swal.fire({
                    icon: 'success',
                    title: 'success',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 5000
                    });
                }

                else if(response.messageerroe)
                {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops ..',
                    text: response.messageerroe,
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
            }
        })
    });

    // Deleted Orders for user
    $(document).on('click','.deleted-order',function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id_order = $(this).closest('.orde-data').find('.id_order').val();

        $.ajax({
            method: "POST",
            url: "/delete-all-orders",
            data:{
                'id_order': id_order,
            },
            datatype:"json",
            success: function(response){
                window.location.reload();
                if (response.message) {
                    Swal.fire({
                    icon: 'success',
                    title: 'success',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
                else if(response.messageerroe)
                {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops ..',
                    text: response.messageerroe,
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
            }
        });
    });



});
