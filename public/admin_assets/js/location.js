$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});
let body=$('body');
let addCityInput= $('body').find(".addCityInput");
// $('.category-ul').sortable("refresh");




// $('body').find('#sortable').sortable('refresh');
function showAddCityInput() {
    $('.city-input').attr('style','visible:visible').fadeIn();
    $('.addCityBtn').attr('style','display:none').fadeOut();
    $(".addCityInput").focus();


}
$('body').on('click','.addLocalityBtn',function (e) {
    $(this).attr('style','display:none').fadeOut();
    $(this).next('.locality-input').attr('style','visible:visible').fadeIn();
    $(this).next('.locality-input').find('.addNewLocalityInput').focus();

});
// function showInput() {
//     $('.service-input').attr('style','visible:visible').fadeIn();
//     $('.addServiceBtn').attr('style','display:none').fadeOut();
//
// }
$('body').on('click','.submitCityBtn',function () {
    submit_city();

});

addCityInput.on('keyup', function (e) {
    if (e.keyCode == 13) {
        submit_city();
    }

});
function submit_city() {
    // console.log(addCategoryInput.val());
    let city=addCityInput.val();
   addCityInput.val("");
    $.ajax({
        type: "POST",
        url: "addCity",
        data: {city: city},
        success: function (response) {
            $('.city-ul').append(response);
        },
        error: function (status) {
            // alert(status);
        }
    });

}

 // let addNewServiceInput=$('.service-input').find('.addNewServiceInput');
 // let addNewServiceBtn=$('.service-input').find('.addNewServiceBtn');
$('body').on('keyup','.addNewLocalityInput', function (e) {
    if (e.keyCode == 13) {


        submit_new_locality(e.currentTarget.value,e.currentTarget.id);
    }

});

// addNewServiceInput.on('keyup', function (e) {
//     if (e.keyCode == 13) {
//
//
//         submit_new_service(e.currentTarget.value,e.currentTarget.id);
//     }
//
// });
// addNewServiceBtn.on('click', function (e) {
//     submit_new_service(e.currentTarget.id);
//
//
// });
$('body').on('click','.addNewLocalityBtn', function (e) {
    // id=;
    let val = $(this).closest("div.locality-input").find("input[name='addNewLocalityInput']").val();
    submit_new_locality(val,e.currentTarget.id);



//
});
function submit_new_locality(locality_name,city_id) {

    $.ajax({
        type: "POST",
        url: "addLocality",
        data: {city_id: city_id,locality_name:locality_name},
        success: function (response) {

                $(".locality_"+city_id).replaceWith(response).fadeIn();
                $('.addNewLocalityInput').val("")

            // $('#name').val(resCategory.category.name);

        },
        error: function (status) {
            // alert(status);
        }
    });


}

function removeCity(e,city_id){
    e.stopPropagation();

    swal({
            title: "Are you sure?",
            text: "This City will be deleted!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(){


            $.ajax({
                type: "POST",
                url: "deleteCity",
                data: {city_id:city_id},
                success: function (response) {
                    $('body').find('#'+city_id).remove();

                    swal("Deleted!", "City has been deleted.", "success");


                },
                error: function (status) {
                    // alert(status);
                }
            });
        });

}
function removeLocality(e,locality_id,city_id){
    e.preventDefault();

    swal({
            title: "Are you sure?",
            text: "This Locality will be deleted!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(){


            $.ajax({
                type: "POST",
                url: "deleteLocality",
                data: {locality_id:locality_id,city_id:city_id},
                success: function (response) {
                    $(".locality_"+city_id).replaceWith(response).fadeIn();

                    swal("Deleted!", "Locality has been deleted.", "success");


                },
                error: function (status) {
                    // alert(status);
                }
            });
        });

}