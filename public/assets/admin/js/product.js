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

             $('.add_product_to_cart').click(function () {
                 var price = document.getElementById('price').value;
                 var qty = document.getElementById('number').innerText;
                 var productId = $(this).data('id');
                 $.ajax({
                     url: '/addToCart/' + productId,
                     method: 'post',
                     dataType: 'json',
                     data: {

                         'price': price,
                         'qty': qty,
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

             $('#testimonialButton').click(function () {

                 name = document.getElementById('username').value;
                 content = document.getElementById('content').value;

                 //  var productId = $(this).data('id');
                 $.ajax({
                     url: '/saveTestimonial/',
                     type: 'post',
                     dataType: 'json',
                     data: {
                         'name': name,
                         'content': content,
                     },
                     success: function (response) {
                         if (response) {
                             document.getElementById('username').value = "";
                             document.getElementById('content').value = "";
                             toastr["success"](response.success, "Success");
                         }
                     }
                 });
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

        });