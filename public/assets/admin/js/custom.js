$(document).ready(function () {

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
                // region.val(response.region);
                region.append('<option value="' + response.region.id + '" data-city="' + response.region.name + '">' + response.region.name + '</option>');

            }
        });
    });



    // //  mark products as featured
    // $.ajax({
    //     url: '/agent/products/featured' + id,
    //     type: 'get',
    //     dataType:'JSON',
    //     success: function(response) {

    //     }
    // });

});
