$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#search').on('keyup', function (e) {
    let term = $(this).val();


    $.ajax({
        type: "POST",
        url: "searchBusiness",
        data: {term: term},
        success: function (response) {

            $(".business-lists").replaceWith(response).fadeIn();


        },
        error: function (status) {
            // alert(status);
        }
    });
});
$('body').on('click','.status-btn', function (e) {

    let business_id = $(this).closest("div.status-col").find("input[name='hidden-business-id']").val();

    console.log(business_id);
    if ($(this).find('.status-text').text() == 'pending') {
        let status=$(this).find('.status-text').text();

        $.ajax({
            type: "POST",
            url: "status",
            data: {status: 'approved',business_id:business_id},
            success: function (response,) {




            },
            error: function () {
                // alert(status);
            }
        });
        $(this).replaceWith(' <a class="status-btn btn btn-rounded btn-success m-l-20"><span class="status-text">approved</span></a>')
       // $(this).removeClass('theme-btn').addClass('btn-success');




    }
    else {
        $.ajax({
            type: "POST",
            url: "status",
            data: {status: 'pending',business_id:business_id},
            success: function (response) {

                //



            },
            error: function () {
                // alert(status);
            }
        });
        $(this).replaceWith(' <a class="status-btn btn btn-rounded theme-btn m-l-20"><span class="status-text">pending</span></a>')


    }
});