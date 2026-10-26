$(document).ready(function () {

    $(".modal").on("hidden.bs.modal", function () {
        $("#gallery_form")[0].reset()
        $("#preview_gallery_image").hide();
        $(".error").html(''); // Hide the preview image after successful save
        $("#color_value").val('');
    });
    console.log("ready");
    var imagePath = window.APP_URLS.image_path;
    // console.log("Image Path: " + imagePath);
    var table = $('#gallerytable').DataTable({
        processing: true,
        serverSide: true,
        ajax: window.APP_URLS.gallery_get_data,   
        columns: [ 
            { data: 'id', name: 'id' },
            { 
                data: 'gallery_type', 
                name: 'gallery_type',
                render: function(data, type, row) {
                    if (data === 'process') {
                        return 'Our Process';
                    } else if (data === 'teams') {
                        return 'Our Teams';
                    } else {
                        return data; // fallback, in case new values appear
                    }
                }
            },
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


    $("#Savegallery").on('click', function () {
        if (valid_gallery_status() & validateAndPreviewImage() & valid_gallery_type()) {
            var galleryId = $("#gallery_id").val();

            var url = window.APP_URLS.galleryStore;
            var formData = new FormData($("#gallery_form")[0]);
            $.ajax({
                type: "POST", 
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: function (response, textStatus, jqXHR) {
                    $("#message-pop-up").removeClass('alert-success alert-warning')
                    if (response.result) {
                        $('#gallery_modal').modal('hide');
                        $("#gallery_form")[0].reset()
                        $("#gallery_id").val();
                        $("#message-pop-up").attr('style', 'display:block')
                        $("#message-pop-up").addClass('alert-success')
                        $("#success-message").html(response.message);
                        $("#preview_gallery_image").hide(); // Hide the preview image after successful save
                        $("#color_value").val(''); // Clear the color value
                        setTimeout(() => {
                            $("#message-pop-up").attr('style', 'display:none')
                        }, 3000);
                        table.draw();
                    } else {
                        $('#gallery_modal').modal('hide');
                        $("#gallery_form")[0].reset()
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

    $(document).on('click', '.edit_gallery', function () {
        var gallery_id = $(this).data('id');
        var url = window.APP_URLS.gallery_edit_data.replace(':id', gallery_id);
        $.ajax({
            type: "GET",
            url: url,
            success: function (response, textStatus, jqXHR) {
                if (response.result) {
                    $("input[name='gallery_status']").prop('checked', false);
                    $("input[name='gallery_type']").prop('checked', false);
                    $('#gallery_modal').modal('show');
                    $("#gallery_id").val(response.data.id);
                    $("#gallery_name").val(response.data.name);
                    $("#alt_tag").val(response.data.alt_tag);
                    $("input[name='gallery_status'][value='" + response.data.status + "']").prop('checked', true);
                    $("input[name='gallery_type'][value='" + response.data.gallery_type + "']").prop('checked', true);
                    // ✅ Show existing banner image if available

                    if (response.data.image) {
                        $("#preview_gallery_image").show(); // full URL or relative path
                        $("#preview_gallery_image")
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

    $(document).on('click', '.delete_gallery', function () {
        gallery_id = $(this).data('id');
        var url = window.APP_URLS.gallery_delete_data.replace(':id', gallery_id);
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




    function valid_gallery_status() {
        if ($("input[name='gallery_status']:checked").length === 0) {
            $("#span_gallery_status").text("Please select a status.");
            return false;
        } else {
            $("#span_gallery_status").text("");
            return true;
        }
    }

    function valid_gallery_type() {
        if ($("input[name='gallery_type']:checked").length === 0) {
            $("#span_gallery_type").text("Please select a Type.");
            return false;
        } else {
            $("#span_gallery_type").text("");
            return true;
        }
    }

    // Run validation immediately when user clicks radio
    $("input[name='gallery_status']").on("change", function () {
        valid_gallery_status();
    });
});
function validateAndPreviewImage() {
    const input = document.getElementById("gallery_image");
    const file = input.files[0];
    const errorSpan = document.getElementById("span_gallery_image");
    const previewImg = document.getElementById("preview_gallery_image");
    const bannerId = document.getElementById("gallery_id")?.value;

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
document.getElementById("gallery_image").addEventListener("change", function () {
    validateAndPreviewImage();
});
