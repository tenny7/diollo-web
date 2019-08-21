$(document).ready(function () {

   
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
     
     $('.product_cart').click(function () {
         var price = document.getElementById('price').value;
         var qty = document.getElementById('number').innerText;
         var productId = $(this).data('id');
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
console.log(response);
                     toastr["success"](response.success, "Success")
                 }
             }
         });
     });

     $('.product_cart_single').click(function () {
        //  var price = document.getElementById('price').value;
        //  var qty = document.getElementById('number').innerText;
         var price = $(this).data('price');
         var productId = $(this).data('id');
        //  alert(price);
        //  alert(productId);
         $.ajax({
             url: '/addToCartSingle/' + productId,
             type: 'post',
             dataType: 'json',
             data: {
                
                 'price': price,
                //  'qty': qty,
                 'product_id': productId,
             },
             success: function (response) {
                 if (response) {
// console.log(response);
                     toastr["success"](response.success, "Success")
                 }
             }
         });
     });

     $('.productId').click(function () {
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

    // bulk action button for product 
    $(".deleteAction").click(function () {
        var id = [];
        if (confirm("Are you sure you want to delete this item?")) {

            $(".storeIDsd:checked").each(function () {
                id.push($(this).val());
            });

            console.log(id);
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
    $(".admindeleteBrandAction").click(function () {
        var id = [];
        if (confirm("Are you sure you want to delete this item?")) {

            $(".brandIDs:checked").each(function () {
                id.push($(this).val());
            });
            // alert(id);
            if (id.length > 0) {
                $.ajax({
                    url: '/admin/brand/bulkBrandDelete',
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

    $(".deleteCategoryAction").click(function () {
        var id = [];
        if (confirm("Are you sure you want to delete this item?")) {

            $(".categoryIDs:checked").each(function () {
                id.push($(this).val());
            });
            // alert(id);
            if (id.length > 0) {
                $.ajax({
                    url: '/admin/category/bulkCategoryDelete',
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

    $(".admindeleteAgentAction").click(function () {
        var id = [];
        if (confirm("Are you sure you want to delete this item?")) {

            $(".agentIDs:checked").each(function () {
                id.push($(this).val());
            });
            // alert(id);
            if (id.length > 0) {
                $.ajax({
                    url: '/admin/agents/bulkAgentDelete',
                    method: 'get',
                    data: {
                        id: id
                    },
                    success: function (response) {
                        toastr["success"](response.success, "Success")
                        jQuery('#agent-dt').load(location.href + ' #agent-dt');
                        // jQuery('#tableId1').load(location.href + ' #tableId1');
                    }

                });

            } else {
                alert("Please select at least one checkbox");
            }
        }
    });
    // end bulk product delete

    $(".deletePromotionAction").click(function () {
        var id = [];
        if (confirm("Are you sure you want to delete this item?")) {

            $(".promotionIDs:checked").each(function () {
                id.push($(this).val());
            });
            // alert(id);
            if (id.length > 0) {
                $.ajax({
                    url: '/admin/promotion/bulkPromotionDelete',
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

    $(".admindeleteOrderAction").click(function () {
        var id = [];
        if (confirm("Are you sure you want to delete this item?")) {

            $(".orderIDs:checked").each(function () {
                id.push($(this).val());
            });
            // alert(id);
            if (id.length > 0) {
                $.ajax({
                    url: '/admin/orders/bulkOrdersDelete',
                    method: 'get',
                    data: {
                        id: id
                    },
                    success: function (response) {
                        console.log(response);
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

    $(".deleteVendorAction").click(function () {
        var id = [];
        if (confirm("Are you sure you want to delete this item?")) {

            $(".vendorIDs:checked").each(function () {
                id.push($(this).val());
            });
            // alert(id);
            if (id.length > 0) {
                $.ajax({
                    url: '/agent/vendors/bulkVendorDelete',
                    method: 'get',
                    data: {
                        id: id
                    },
                    success: function (response) {
                        console.log(response);
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

    // load review page
    $('.reviewbutton1').click(function () {
        var id = $(this).data('id');
        var rating = $('#input-1').val();
        // console.log(rating);
        window.location.href = '/review/' + id + '/' + rating;
    });



    $('.reserveId').click(function () {
        var productId = $(this).data('id');
        var qty = document.getElementById('number').innerText;

     
        $.ajax({
            url: '/customer/reserve/',
            method: 'get',
            data: {
                id: productId,
                qty: qty
            },
            success: function (response) {
                console.log(response);
                toastr["success"](response.success, "Success")
            }

        });  
    });

   

    



    // rating







});
