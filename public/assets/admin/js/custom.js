$(document).ready(function () {

    // alert('loaded');
    // toast notification initialization
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    jQuery(document).on('change', '.country', function () {
        var country_code = $('#country').val();
        jQuery.ajax({
            url: '/show_regions/' + country_code,
            type: 'get',
            dataType: 'JSON',
            success: function (response) {

                console.log(response);
                var regions = $('#regions');
                regions.empty();
                $.each(response, function (key, element) {
                    regions.append('<option value="' + element.id + '" data-region="' + element.id + '">' + element.name + '</option>');
                });
            }
        });
    });


    jQuery(document).on('change', '.regions', function () {
        var region_id = $('#regions').val();
        jQuery.ajax({
            url: '/show_city/' + region_id,
            type: 'get',
            dataType: 'JSON',
            success: function (response) {
                var cities = $('#city');
                cities.empty();
                $.each(response, function (key, element) {
                    cities.append('<option value="' + element.name + '" data-city="' + element.name + '">' + element.name + '</option>');
                });
            }
        });
    });


    $('.noti').click(function () {
        $notificationCount = $(this).data('notification');
        // alert($notificationCount);
        if ($notificationCount != 0) {
            $.get('/markAsRead', function (res) {
                $('.notti').load(location.href + ' #notti');
            });

        }
    });

    jQuery(document).on('change', '.stores', function () {

        var store_id = $('#store').val();

        jQuery.ajax({
            url: '/storeDetails/' + store_id,
            type: 'get',
            dataType: 'JSON',
            success: function (response) {
                var phone = $('#phone');
                var email = $('#email');
                var region = $('#region');
                console.log(response);
                email.val(response.store.email);
                phone.val(response.store.phones);
                region.append('<option value="' + response.region.id + '" data-city="' + response.region.name + '">' + response.region.name + '</option>');

            }
        });
    });


    //  add to cart

    $('.product_cart').click(function () {
        var price = document.getElementById('price').value;
        var qty = document.getElementById('qty').value;
        var productId = document.getElementById('productId').value;
        $.ajax({
            url: '/addToCart/' + productId,
            type: 'post',
            dataType: 'json',
            data: {
                'price': price,
                'qty': qty,
                'product_id': productId,
            },
            success: function (response) {
                if (response) {

                    toastr["success"](response.success, "Success")
                }
            }
        });
    });
    $('.product_cart_single').click(function () {
        // var price = document.getElementById('price').value;
        var price = $(this).data('price');
        var productId = $(this).data('id');
        // var qty = document.getElementById('qty').value;
        // var productId = document.getElementById('productId').value;
        $.ajax({
            url: '/addToCart/' + productId,
            type: 'post',
            dataType: 'json',
            data: {
                'price': price,
                'qty': 1,
                'product_id': productId,
            },
            success: function (response) {
                if (response) {

                    toastr["success"](response.success, "Success")
                }
            }
        });
    });
    // save item
    $('.productId').click(function () {
        // var productId = document.getElementById('productId').value;
        var productId = $(this).data('id');
        $.ajax({
            url: '/save-item/' + productId,
            type: 'post',
            dataType: 'json',
            data: {
                'id': productId,
            },
            success: function (response) {
                if (response) {

                    toastr["success"](response.success, "Success")
                }
            }
        });
    });
    $('.update-qty').click(function () {
        var productId = $(this).data('id');
        var qty = $(this).data('qty');
        $.ajax({
            url: '/update-cart-qty/' + productId,
            type: 'post',
            dataType: 'json',
            data: {
                'qty': qty,
                'id': productId,
            },
            success: function (response) {
                if (response) {

                    if (toastr["success"](response.success, "Success")) {
                        document.location.reload(true)
                    }

                    // $('document').load(location.href + ' #tableId');
                }
            }
        });
    });

    // function timedRefresh(timeoutPeriod) {
    //     setTimeout("location.reload(true);",timeoutPeriod);
    // }
    // timedRefresh(5000);
    // }

    // bulk action button for product 
    $(".deleteAction").click(function () {
        var id = [];
        if (confirm("Are you sure you want to delete this item?")) {

            $(".storeIDs:checked").each(function () {
                id.push($(this).val());
            });

            if (id.length > 0) {
                $.ajax({
                    url: '/admin/stores/bulkDelete',
                    method: 'get',
                    data: {
                        id: id
                    },
                    success: function (response) {
                        toastr["success"](response.success, "Success")
                        jQuery('#tableId').load(location.href + ' #tableId');
                    }

                });

            } else {
                alert("Please select at least one checkbox");
            }
        }
    });
    $(".deleteProduct").click(function () {
        var id = [];
        if (confirm("Are you sure you want to delete this item?")) {

            $(".product_sel:checked").each(function () {
                id.push($(this).val());
            });

            if (id.length > 0) {
                $.ajax({
                    url: '/bulkProductDelete',
                    method: 'get',
                    data: {
                        id: id
                    },
                    success: function (response) {
                        toastr["success"](response.success, "Success")
                        jQuery('#tableId').load(location.href + ' #tableId');
                        jQuery('#tableId1').load(location.href + ' #tableId1');
                    }

                });

            } else {
                alert("Please select at least one checkbox");
            }
        }
    });

    $(".admindeleteProductAction").click(function () {
        var id = [];
        if (confirm("Are you sure you want to delete this item?")) {

            $(".productIDs:checked").each(function () {
                id.push($(this).val());
            });
            // alert(id);
            if (id.length > 0) {
                $.ajax({
                    url: '/admin/products/bulkProductDelete',
                    method: 'get',
                    data: {
                        id: id
                    },
                    success: function (response) {
                        toastr["success"](response.success, "Success")
                        jQuery('#tableId').load(location.href + ' #tableId');
                        // jQuery('#tableId1').load(location.href + ' #tableId1');
                    }

                });

            } else {
                alert("Please select at least one checkbox");
            }
        }
    });
    // end bulk product delete

    // load review page
    $('.reviewbutton1').click(function () {
        var id = $(this).data('id');
        console.log(id);
        window.location.href = '/review/' + id;
    });





});
