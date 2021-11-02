jQuery(document).ready(function ($) {

    const filter = $('#filter');

    filter.on('submit', function (e) {
        e.preventDefault();

        var $form = $(this),
            page = 1;
        filterCompanies(filter.serialize(), page);

    });

    $('#pagination').on('click', '.link_pagination__js', function (e) {
        e.preventDefault();
        var $link = $(this),
            page = $link.text();

        $('.link_pagination__js.active').removeClass('active');
        $link.addClass('active');

        filterCompanies(filter.serialize(), page);
    });


    function filterCompanies(data, page) {

        $.ajax({
            url: ib_localize.admin_url,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'ib_filter_companies',
                filter_data: data,
                page: page,
            },
            success: function (response) {
                if (response !== 'false') {
                    $('#companies').html(response.companies);
                    $('#pagination').html(response.pagination);
                }
            }
        });
    }

});
