/*!
* Start Bootstrap - Simple Sidebar v6.0.6 (https://startbootstrap.com/template/simple-sidebar)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
*/


//
// Scripts
//

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

const linkColor = document.querySelectorAll('.list-group-item ')

function colorLink(){
if(linkColor){
linkColor.forEach(l=> l.classList.remove('active'))
this.classList.add('active')
}
}
linkColor.forEach(l=> l.addEventListener('click', colorLink));

// resources/js/notification.js
var audio = $('#notification-sound')[0];

function playNotificationSound() {
    audio.play();
}

// Ajax javaScript for insart data page "Frontend/Products/view" to dataBase Frontend/Commende controller
$(document).ready(function()
{
    loadOrders()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function loadOrders()
    {
        $.ajax({
            method: "GET",
            url: "/load-orders-count",
            success: function(response)
            {

                $('.order-count').html('');
                $('.order-count').html(response.count);
            }
        });
    }

    // Deleted users in Page Admin
    $(document).on('click', '.daleted-users', function(e)
    {
        e.preventDefault();

        var id_user = $(this).closest('.users_date').find('.id_user').val();

        console.log(id_user);

        $.ajax({
            method: "POST",
            url: "deleted-user",
            data: {
                'id_user': id_user
            },
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

    // Search user in page Admin
    $('#search_users').on('keyup', function() {
        var query = $(this).val();
        $.ajax({
            url: "users-list",
            type: 'GET',
            data: {
                'query': query
            },
            success: function(data) {
                var users = data;
                var html = '';
                $.each(users, function(index, user) {
                    html += '<tr>';
                    html += '<td>' + user.name + '</td>';
                    html += '<td>' + user.email + '</td>';
                    html += '<td><a href="view-user/' + user.id + '" class="btn btn-outline-success "><i class="bi bi-person-fill-up"></i></a></td>';
                    html += '</tr>';
                });
                $('#users-list').html(html);
            }
        });
    });

    // Search Products in page Admin
    $('#search_products').on('keyup', function() {
        var query = $(this).val();
        $.ajax({
            url: "products-list",
            type: 'GET',
            data: {
                'query': query
            },
            success: function(data) {
                var products = data;
                console.log(products)
                var html = '';
                // color   = json_decode(product.colors);
                // storage   = json_decode(product.storages);
                $.each(products, function(index, product)
                {
                    var storage = JSON.parse(JSON.stringify(product.storages)); // Decoding JSON data
                    var color = JSON.parse(JSON.stringify(product.colors)); // Decoding JSON data
                    console.log(storage);
                    html += '<tr>';
                    html += '<td>' + product.id + '</td>';
                    html += '<td> Cateory </td>';
                    html += '<td> Suppliers </td>';
                    html += '<td>' + product.name_prod + '</td>';
                    html += '<td>' + product.mark_prod + '</td>';
                    html += '<td>' + product.original_price + '</td>';
                    html += '<td>' + product.selling_price + '</td>';
                    html += '<td>' + product.qte_stock + '</td>';
                    html += '<td>' + storage + '</td>';
                    html += '<td>' + color + '</td>';
                    html += '<td><img src="assets/uploads/products/'+product.image +'" width="200px" alt="'+ product.image +'"></td>';
                    html += '<td><a href="edit-products/'+ product.id+ '" type="button" class="btn btn-outline-success mb-1"><i class="bi bi-pencil-square"></i></a>'+
                            '<a href="deleted-products/'+ product.id+ '" type="button" class="btn btn-outline-danger"><i class="bi bi-trash"></i></a></td>';
                    html += '</tr>';
                });
                $('#products-list').html(html);
            }
        });
    });

});
