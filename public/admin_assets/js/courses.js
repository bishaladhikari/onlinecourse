$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});


let body=$('body');
let addCategoryInput= $('body').find(".addCategoryInput");
// $('.category-ul').sortable("refresh");

makeCategorySortable();
// fin sortable


// $('body').find('#sortable').sortable('refresh');
function showAddCategoryInput() {
    $('.category-input').attr('style','visible:visible').fadeIn();
    $('.addCategoryBtn').attr('style','display:none').fadeOut();
    $(".addCategoryInput").focus();


}
$('body').on('click','.addServiceBtn',function (e) {
    $(this).attr('style','display:none').fadeOut();
    $(this).next('.service-input').attr('style','visible:visible').fadeIn();
    $(this).next('.service-input').find('.addNewServiceInput').focus();

});
// function showInput() {
//     $('.service-input').attr('style','visible:visible').fadeIn();
//     $('.addServiceBtn').attr('style','display:none').fadeOut();
//
// }
$('body').on('click','.submitCategoryBtn',function () {
    submit_category();

});

addCategoryInput.on('keyup', function (e) {
    if (e.keyCode == 13) {
        submit_category();
    }

});
function submit_category() {
    // console.log(addCategoryInput.val());
    let category_name=addCategoryInput.val();
   addCategoryInput.val("");
    $.ajax({
        type: "POST",
        url: "category",
        data: {category_name: category_name},
        success: function (response) {
            console.log('added');
            // $('body').find('.category-ul').append(response);
            // makeCategorySortable();


        },
        error: function (status) {
            // alert(status);
        }
    });

}

 // let addNewServiceInput=$('.service-input').find('.addNewServiceInput');
 // let addNewServiceBtn=$('.service-input').find('.addNewServiceBtn');
$('body').on('keyup','.addNewServiceInput', function (e) {
    if (e.keyCode == 13) {


        submit_new_service(e.currentTarget.value,e.currentTarget.id);
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
$('body').on('click','.addNewServiceBtn', function (e) {
    // id=;
    let val = $(this).closest("div.service-input").find("input[name='addNewServiceInput']").val();
    submit_new_service(val,e.currentTarget.id);



//
});
function submit_new_service(service_name,category_id) {



    $.ajax({
        type: "POST",
        url: "addService",
        data: {cat_id: category_id,service_name:service_name,iconClassName:iconClassName},
        success: function (response) {

                $(".services_"+category_id).replaceWith(response).fadeIn();
                $('.addNewServiceInput').val("")

            // $('#name').val(resCategory.category.name);

        },
        error: function (status) {
            // alert(status);
        }
    });


}

function removeCategory(e,cat_id){
    e.preventDefault();

    swal({
            title: "Are you sure?",
            text: "This Category will be deleted!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(){


            $.ajax({
                type: "POST",
                url: "deleteCategory",
                data: {cat_id:cat_id},
                success: function (response) {
                    $('body').find('#'+cat_id).remove();

                    // $('.category-list').replaceWith(response);
                    makeCategorySortable();

                    swal("Deleted!", "Category has been deleted.", "success");


                },
                error: function (status) {
                    // alert(status);
                }
            });
        });

}

function removeService(e,service_id,cat_id){
    e.stopPropagation();


    swal({
            title: "Are you sure?",
            text: "This service will be deleted!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(){


            $.ajax({
                type: "POST",
                url: "deleteService",
                data: {service_id:service_id,cat_id:cat_id},
                success: function (response) {
                    $(".services_"+cat_id).replaceWith(response).fadeIn();
                    swal("Deleted!", "Service has been deleted.", "success");


                },
                error: function (status) {
                    // alert(status);
                }
            });
        });

}

function editService(e,service_id,service_name,category_id,active,image_src) {
    let baseUrl='http://localhost/Madhusudhan/services/public/';

    $('#parent_category').val(category_id);
    $('#service_name').val(service_name);
    $('.service-title').html('Edit Service : '+service_name);
    if(image_src!=null){
        $('#serviceImage').attr('src',baseUrl+image_src);
        $('#service_image').val(image_src);

    }
    $('#service_id').val(service_id);
    if (active==true) {
        $("#activeSwitch").prop("checked", true);
    }
    else
        $("#activeSwitch").prop('checked', false);

}
function editCategory(e,category_id,category_name,active) {

    console.log(category_name);

    $('#category_n').val(category_name);
    $('.modal_title').html('Edit Category : '+category_name);
    $('#hidden_cat_id').val(category_id);
    if (active=='1') {
        $("#categoryActiveSwitch").prop("checked", true);
    }
    else
        $("#categoryActiveSwitch").prop('checked', false);

}
$("#serviceImage").click(function (e) {
    $("#pic").click();
});
function readURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('#serviceImage')
                .attr('src', e.target.result)

        };

        reader.readAsDataURL(input.files[0]);
    }
}
$('#search').on('keyup',function (e) {
    let term=$(this).val();


    $.ajax({
        type: "POST",
        url: "searchService",
        data: {term:term},
        success: function (response) {

            $(".category-list").replaceWith(response).fadeIn();
            makeCategorySortable();

        },
        error: function (status) {
            // alert(status);
        }
    });
});

function makeCategorySortable(){
    $('.category-ul').sortable({

        axis: 'y',
        // opacity: 0.7,
        // handle: '.panel-heading',
        tolerance: 'pointer',
        cursor: 'move',
        containment: 'parent',
        connectWith: ".category_ul",
        update: function(event, ui) {
            let list_sortable = $(this).sortable("toArray").toString();
            // change order in the database using Ajax
            $.ajax({
                url: 'set_order',
                type: 'POST',
                data: {list_order:list_sortable},
                success: function(data) {
                    //finished
                }
            });
        }
    });
}

