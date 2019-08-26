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

        });