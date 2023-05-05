$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.razorpay_btn').click(function (e) {
        e.preventDefault();


            var fname    = $('.fname'   ).val();
            var lname    = $('.lname'   ).val();
            var email    = $('.email'   ).val();
            var phone    = $('.phone'   ).val();
            var address1 = $('.address1').val();
            var address2 = $('.address2').val();
            var city     = $('.city'    ).val();
            var state    = $('.state'   ).val();
            var country  = $('.country' ).val();
            var pincode  = $('.pincode' ).val();

            if (!fname)
            {
                fname_error = "First Name is required";
                $('#fname_error').html('');
                $('#fname_error').html(fname_error);
            }
            else
            {
                fname_error = '';
                $('#fname_error').html('');
            }

            if (!lname)
            {
                lname_error = "Last Name is required";
                $('#lname_error').html('');
                $('#lname_error').html(lname_error);
            }
            else
            {
                lname_error = '';
                $('#lname_error').html('');
            }

            if (!email)
            {
                email_error = "Email is required";
                $('#email_error').html('');
                $('#email_error').html(email_error);
            }
            else
            {
                email_error = '';
                $('#email_error').html('');
            }

            if (!phone)
            {
                phone_error = "Phone is required";
                $('#phone_error').html('');
                $('#phone_error').html(phone_error);
            }
            else
            {
                phone_error = '';
                $('#phone_error').html('');
            }

            if (!address1)
            {
                address1_error = "Address is required";
                $('#address1_error').html('');
                $('#address1_error').html(address1_error);
            }
            else
            {
                address1_error = '';
                $('#address1_error').html('');
            }

            if (!address2)
            {
                address2_error = "Address is required";
                $('#address2_error').html('');
                $('#address2_error').html(address2_error);
            }
            else
            {
                address2_error = '';
                $('#address2_error').html('');
            }

            if (!city)
            {
                city_error = "City is required";
                $('#city_error').html('');
                $('#city_error').html(city_error);
            }
            else
            {
                city_error = '';
                $('#city_error').html('');
            }

            if (!state)
            {
                state_error = "state is required";
                $('#state_error').html('');
                $('#state_error').html(state_error);
            }
            else
            {
                state_error = '';
                $('#state_error').html('');
            }

            if (!country)
            {
                country_error = "Country is required";
                $('#country_error').html('');
                $('#country_error').html(country_error);
            }
            else
            {
                country_error = '';
                $('#country_error').html('');
            }

            if (!pincode)
            {
                pincode_error = "Zip is required";
                $('#pincode_error').html('');
                $('#pincode_error').html(pincode_error);
            }
            else
            {
                pincode_error = '';
                $('#pincode_error').html('');
            }

            if (fname_error != '' || lname_error != '' || email_error != '' || phone_error != '' || address1_error != '' || address2_error != '' || city_error != '' ||
                country_error!= '' || state_error != '' || pincode_error != '')
            {
                return false;
            }
            else
            {
                var data = {
                    'fname'   : fname,
                    'lname'   : lname,
                    'lname'   : lname,
                    'email'   : email,
                    'phone'   : phone,
                    'address1': address1,
                    'address2': address2,
                    'city'    : city,
                    'state'   : state,
                    'country' : country,
                    'pincode' : pincode,
                    'total_price': $('.total_price').val(),
                }
                $.ajax({
                    method:"POST",
                    url:"/proceed-to-pay",
                    data:data,
                    success: function(response){
                        alert(response.total_price)
                    }
                });
            }



    });

});
