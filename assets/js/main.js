jQuery(document).ready(function ($) {

    const filter = $('#filter');

    filter.on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: ib_localize.admin_url,
            type: 'POST',
            dataType: 'html',
            data: {
                action: 'ib_filter_companies',
                filter_data: filter.serialize(),
            },
            success: function (response) {
                if (response !== 'false') {
                    $('#response').html(response);
                }
            }
        });
    });


});
