$(document).ready(function(){

    $('#sections').DataTable();
    $('#categories').DataTable();
    $('#brands').DataTable();
    $(".nav-item").removeClass("active");
    $(".nav-link").removeClass("active");


    //check admin password is correct or not....
    $("#current_password").keyup(function(){
        var current_password = $("#current_password").val();
        // alert(current_password);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'http://localhost/MultiVendor-Ecommerce/public/admin/check-current-password',
            data:{current_password:current_password},
            success:function (response){
                // alert(response);
                if(response=="false")
                {
                    $("#check_password").html("<font color='red'>Current Password is wrong!!!</font>")
                }
                else if(response=="true")
                {
                    $("#check_password").html("<font color='green'>Current password is Ok!!!</font>")
                }
            },
            error:function(){
                alert(error);
            }
        });
    });

    // Update Admin Status....
    $(document).on('click','.updateAdminStatus',function(){
        // alert('hello');
        var status = $(this).children("i").attr("status");
        var admin_id = $(this).attr('admin_id');
        // alert(admin_id);
        // alert(status);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"post",
            url:"http://localhost/MultiVendor-Ecommerce/public/admin/update-admin-status",
            data:{status:status,admin_id:admin_id},
            success:function(response){
                // alert(response);
                if(response['status']==0){
                    $("#admin-"+admin_id).html("<i style=\"font-size: 30px;\" class=\"mdi mdi-bookmark-outline\" status=\"InActive\"></i>")
                }else if(response['status']==1){
                    $("#admin-"+admin_id).html("<i style=\"font-size: 30px;\" class=\"mdi mdi-bookmark-check\" status=\"Active\"></i>")
                }
            },
            error:function(){
                alert("error");
            },
        });
    });

    //Update Section Status.......
    $(document).on('click','.updateSectionStatus',function(){
        // alert('hello');
        var status = $(this).children("i").attr("status");
        var section_id = $(this).attr('section_id');
        // alert(section_id);
        // alert(status);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"post",
            url:"http://localhost/MultiVendor-Ecommerce/public/admin/update-section-status",
            data:{status:status,section_id:section_id},
            success:function(response){
                // alert(response);
                if(response['status']==0){
                    $("#section-"+section_id).html("<i style=\"font-size: 30px;\" class=\"mdi mdi-bookmark-outline\" status=\"InActive\"></i>")
                }else if(response['status']==1){
                    $("#section-"+section_id).html("<i style=\"font-size: 30px;\" class=\"mdi mdi-bookmark-check\" status=\"Active\"></i>")
                }
            },
            error:function(){
                alert("error");
            },
        });
    });

    //update category status....
    $(document).on('click','.updateCategoryStatus',function(){
        // alert('hello');
        var status = $(this).children("i").attr("status");
        var category_id = $(this).attr('category_id');
        // alert(category_id);
        // alert(status);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"post",
            url:"http://localhost/MultiVendor-Ecommerce/public/admin/update-category-status",
            data:{status:status,category_id:category_id},
            success:function(response){
                // alert(response);
                if(response['status']==0){
                    $("#category-"+category_id).html("<i style=\"font-size: 30px;\" class=\"mdi mdi-bookmark-outline\" status=\"InActive\"></i>")
                }else if(response['status']==1){
                    $("#category-"+category_id).html("<i style=\"font-size: 30px;\" class=\"mdi mdi-bookmark-check\" status=\"Active\"></i>")
                }
            },
            error:function(){
                alert("error");
            },
        });
    });
    //update brand status....
    $(document).on('click','.updateBrandStatus',function(){
        // alert('hello');
        var status = $(this).children("i").attr("status");
        var brand_id = $(this).attr('brand_id');
        // alert(brand_id);
        // alert(status);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"post",
            url:"http://localhost/MultiVendor-Ecommerce/public/admin/update-brand-status",
            data:{status:status,brand_id:brand_id},
            success:function(response){
                // alert(response);
                if(response['status']==0){
                    $("#brand-"+brand_id).html("<i style=\"font-size: 30px;\" class=\"mdi mdi-bookmark-outline\" status=\"InActive\"></i>")
                }else if(response['status']==1){
                    $("#brand-"+brand_id).html("<i style=\"font-size: 30px;\" class=\"mdi mdi-bookmark-check\" status=\"Active\"></i>")
                }
            },
            error:function(){
                alert("error");
            },
        });
    });

    //update product status....
    $(document).on('click','.updateProductStatus',function(){
        // alert('hello');
        var status = $(this).children("i").attr("status");
        var product_id = $(this).attr('product_id');
        // alert(brand_id);
        // alert(status);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"post",
            url:"http://localhost/MultiVendor-Ecommerce/public/admin/update-product-status",
            data:{status:status,product_id:product_id},
            success:function(response){
                // alert(response);
                if(response['status']==0){
                    $("#product-"+product_id).html("<i style=\"font-size: 30px;\" class=\"mdi mdi-bookmark-outline\" status=\"InActive\"></i>")
                }else if(response['status']==1){
                    $("#product-"+product_id).html("<i style=\"font-size: 30px;\" class=\"mdi mdi-bookmark-check\" status=\"Active\"></i>")
                }
            },
            error:function(){
                alert("error");
            },
        });
    });

    //update Attribute status.....
    $(document).on('click','.updateAttributeStatus',function(){
        // alert('hello');
        var status = $(this).children("i").attr("status");
        var attribute_id = $(this).attr('attribute_id');
        // alert(attribute_id);
        // alert(status);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"post",
            url:"http://localhost/MultiVendor-Ecommerce/public/admin/update-product-attribute-status",
            data:{status:status,attribute_id:attribute_id},
            success:function(response){
                // alert(response);
                if(response['status']==0){
                    $("#attribute-"+attribute_id).html("<i style=\"font-size: 30px;\" class=\"mdi mdi-bookmark-outline\" status=\"InActive\"></i>")
                }else if(response['status']==1){
                    $("#attribute-"+attribute_id).html("<i style=\"font-size: 30px;\" class=\"mdi mdi-bookmark-check\" status=\"Active\"></i>")
                }
            },
            error:function(){
                alert("error");
            },
        });
    });

    //update Image status...........
    $(document).on('click','.updateImageStatus',function(){
        // alert('hello');
        var status = $(this).children("i").attr("status");
        var image_id = $(this).attr('image_id');
        // alert(image_id);
        // alert(status);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"post",
            url:"http://localhost/MultiVendor-Ecommerce/public/admin/update-product-image-status",
            data:{status:status,image_id:image_id},
            success:function(response){
                // alert(response);
                if(response['status']==0){
                    $("#image-"+image_id).html("<i style=\"font-size: 30px;\" class=\"mdi mdi-bookmark-outline\" status=\"InActive\"></i>")
                }else if(response['status']==1){
                    $("#image-"+image_id).html("<i style=\"font-size: 30px;\" class=\"mdi mdi-bookmark-check\" status=\"Active\"></i>")
                }
            },
            error:function(){
                alert("error");
            },
        });
    });

    // Delete..........
    $(document).on('click','#confirmDelete',function(e){
        e.preventDefault();
        var link=$(this).attr("href");
        Swal.fire({
            title: 'Are you sure to delete?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire(
                    // window.location.href = link,
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });

    // Delete Image..........
    $(document).on('click','.confirmDeleteImage',function(e){
        // e.preventDefault();
        // var link=$(this).attr("href");
        var module = $(this).attr('module');
        var moduleid = $(this).attr('moduleid');
        Swal.fire({
            title: 'Are you sure to delete?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // window.location.href = link;
                Swal.fire(
                    // window.location.href = link,
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                window.location = "http://localhost/MultiVendor-Ecommerce/public/admin/delete-"+module+"/"+moduleid;
            }
        })
    });

    // Delete Video..........
    $(document).on('click','.confirmDelete',function(e){
        // e.preventDefault();
        // var link=$(this).attr("href");
        var module = $(this).attr('module');
        var moduleid = $(this).attr('moduleid');
        Swal.fire({
            title: 'Are you sure to delete?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // window.location.href = link;
                Swal.fire(
                    // window.location.href = link,
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                window.location = "http://localhost/MultiVendor-Ecommerce/public/admin/delete-"+module+"/"+moduleid;
            }
        })
    });

    // Append Categories Level........
    $("#section_id").on('change',function(){
       var section_id = $(this).val();
       // alert(section_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           type:'get',
           url:"http://localhost/MultiVendor-Ecommerce/public/admin/append-categories-level",
           data:{section_id:section_id},
           success:function(response){
                // alert(response);
               $("#appendCategoriesLevel").html(response);
           },
            error:function(){
                alert("error");
            }
        });
    });

    //Product Attribute Add-Remove Script......
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><div style="height: 10px;"></div><input type="text" name="size[]" placeholder="Size" style="width: 120px;"/>&nbsp;<input type="text" name="sku[]" placeholder="SKU" style="width:120px;"/>&nbsp; <input type="text" name="price[]" placeholder="Price" style="width:120px;">&nbsp; <input type="text" name="stock[]" placeholder="Stock" style="width: 120px;">&nbsp; <a href="javascript:void(0);" class="remove_button">Remove</div>'

        // '<a href="javascript:void(0);" class="remove_button">Remove</div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

});




