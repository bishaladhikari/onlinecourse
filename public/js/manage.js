

$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:'goals',
        method:'get',
        success:function (response) {
//                $('.tab-content').html(response);

        }
    });




});
$('.tab-item').on('click',function () {
    console.log('hello');
});