$(document).ready(function () {

    $('#description').summernote({
        placeholder: 'Enter Description here...',
        height: 100,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ] 
    });  
 
    $(".modal").on("hidden.bs.modal", function () {
        $("#howitworks_form")[0].reset()
        $("#preview_howitworks_image").hide();
        $('#description').summernote('code', '');  
        $(".error").html(''); // Hide the preview image after successful save
        
    });
    console.log("ready");
    var imagePath = window.APP_URLS.image_path;
    // console.log("Image Path: " + imagePath);
    var table = $('#howitworkstable').DataTable({
        processing: true,
        serverSide: true, 
        ajax: window.APP_URLS.howitworks_get_data,   
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
           
            {
                data: 'image',
                name: 'image', 
                orderable: false, 
                searchable: false,
                render: function (data, type, row) {
                    if (data) {
                        return '<img src="' + imagePath +'/' +  data + '" alt="' + row.image + '" width="60" height="60">';
                    } else { 
                        return '<span class="text-muted">No Image</span>';
                    }
                }
            },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });


    $("#Savehowitworks").on('click', function () {
        if (valid_howitworks_status() & validateAndPreviewImage() & valid_howitworks()) {
            var howitworksId = $("#howitworks_id").val();
            
            var url = window.APP_URLS.howitworksStore;
            
            // var url = window.APP_URLS.howitworksStore;
            var formData = new FormData($("#howitworks_form")[0]);
            $.ajax({ 
                type: "POST",
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: function (response, textStatus, jqXHR) {
                    $("#message-pop-up").removeClass('alert-success alert-warning')
                    if (response.result) {
                        $('#howitworks_modal').modal('hide');
                        $("#howitworks_form")[0].reset()
                        $("#howitworks_id").val();
                        $("#message-pop-up").attr('style', 'display:block')
                        $("#message-pop-up").addClass('alert-success')
                        $("#success-message").html(response.message);
                        $("#preview_howitworks_image").hide(); // Hide the preview image after successful save
                        $("#color_value").val(''); // Clear the color value
                        setTimeout(() => {
                            $("#message-pop-up").attr('style', 'display:none')
                        }, 3000);
                        table.draw();
                    } else {
                        $('#howitworks_modal').modal('hide');
                        $("#howitworks_form")[0].reset()
                        $("#message-pop-up").attr('style', 'display:block')
                        $("#message-pop-up").addClass('alert-warning')
                        $("#success-message").html(response.message);
                        setTimeout(() => {
                            $("#message-pop-up").attr('style', 'display:none')
                        }, 3000);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.table(jqXHR)
                }
            });
        } else {
            return false
        } 

    })

    $(document).on('click', '.edit_howitworks', function () {
        var howitworks_id = $(this).data('id');
        var url = window.APP_URLS.howitworks_edit_data.replace(':id', howitworks_id);
        $.ajax({
            type: "GET",
            url: url,
            success: function (response, textStatus, jqXHR) {
                if (response.result) {
                    $("input[name='howitworks_status']").prop('checked', false);
                    $('#howitworks_modal').modal('show');
                    $("#howitworks_id").val(response.data.id);
                    $("#name").val(response.data.name);
                    $("#alt_tag").val(response.data.alt_tag);
                    $("#designation").val(response.data.designation);
                    $("#description").summernote('code', response.data.description);
                    $("input[name='howitworks_status'][value='" + response.data.status + "']").prop('checked', true);
                    // ✅ Show existing banner image if available

                    if (response.data.image) {
                        $("#preview_howitworks_image").show(); // full URL or relative path
                        $("#preview_howitworks_image")
                            .attr('src', window.APP_URLS.image_path + '/' + response.data.image);

                    }
                } else { 
                    $("#message-pop-up").attr('style', 'display:block')
                    $("#message-pop-up").addClass('alert-warning')
                    $("#success-message").html(response.message);
                    setTimeout(() => {
                        $("#message-pop-up").attr('style', 'display:none')
                    }, 3000);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.table(jqXHR)
            }
        });
    })
 
    $(document).on('click', '.delete_howitworks', function () {
        howitworks_id = $(this).data('id');
        var url = window.APP_URLS.howitworks_delete_data.replace(':id', howitworks_id);
        var confrim_delete = confirm("Are You Sure want To Delete?");
        if (confrim_delete) {
            $.ajax({
                type: "Delete",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': window.APP_URLS.csrfToken
                },
                success: function (response, textStatus, jqXHR) {
                    if (response.result) {
                        $("#message-pop-up").attr('style', 'display:block')
                        $("#message-pop-up").addClass('alert-success')
                        $("#success-message").html(response.message);
                        setTimeout(() => {
                            $("#message-pop-up").attr('style', 'display:none')
                        }, 3000);
                        table.draw();
                    } else {
                        $("#message-pop-up").attr('style', 'display:block')
                        $("#message-pop-up").addClass('alert-warning')
                        $("#success-message").html(response.message);
                        setTimeout(() => {
                            $("#message-pop-up").attr('style', 'display:none')
                        }, 3000);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.table(jqXHR)
                }
            });
        }

    })


    function valid_howitworks(){
        if($("#name").val() == ''){
            $("#span_name").text("Enter Name This Filed is Required.")
            return false
        }else{
            $("#span_name").text("")
            return true;
        }
    }
    
    function valid_description(){
        if($("#description").val() == ''){
            $("#span_desc").text("Enter Description This Filed is Required.")
            return false
        }else{
            $("#span_desc").text("")
            return true;
        }
    }

    function valid_howitworks_status() {
        if ($("input[name='howitworks_status']:checked").length === 0) {
            $("#span_howitworks_status").text("Please select a status.");
            return false;
        } else {
            $("#span_howitworks_status").text("");
            return true;
        }
    }

    // Run validation immediately when user clicks radio
    $("input[name='howitworks_status']").on("change", function () {
        valid_howitworks_status();
    });
});
function validateAndPreviewImage() {
    const input = document.getElementById("howitworks_image");
    const file = input.files[0];
    const errorSpan = document.getElementById("span_howitworks_image");
    const previewImg = document.getElementById("preview_howitworks_image");
    const bannerId = document.getElementById("howitworks_id")?.value;

    // Allow update without new image
    if (bannerId && !file) {
        errorSpan.innerText = "";
        return true;
    }

    if (!file) {
        errorSpan.innerText = "Image is required.";
        previewImg.style.display = "none";
        return false;
    }

    if (!file.type.startsWith("image/")) {
        errorSpan.innerText = "Only image files are allowed.";
        input.value = ""; // reset input
        previewImg.style.display = "none";
        return false;
    }

    // Show image preview
    const reader = new FileReader();
    reader.onload = function (e) {
        previewImg.src = e.target.result;
        previewImg.style.display = "block";
        errorSpan.innerText = "";
    }
    reader.readAsDataURL(file);

    return true;
}

// 🔹 Auto-validate when user selects a file
document.getElementById("howitworks_image").addEventListener("change", function () {
    validateAndPreviewImage();
});
