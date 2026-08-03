$(document).ready(function () {

    $(".modal").on("hidden.bs.modal", function () {
        $("#trusted_partner_form")[0].reset()
        $("#preview_trusted_partner_image").hide();
        $(".error").html(''); // Hide the preview image after successful save
        $("#color_value").val('');
    });
    console.log("ready");
    var imagePath = window.APP_URLS.image_path;
    // console.log("Image Path: " + imagePath);
    var table = $('#trusted_partnertable').DataTable({
        processing: true,
        serverSide: true,
        ajax: window.APP_URLS.trusted_partner_get_data,   
        columns: [
            { data: 'id', name: 'id' },
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


    $("#Savetrusted_partner").on('click', function () {
        if (valid_trusted_partner_status() & validateAndPreviewImage()) {
            var trusted_partnerId = $("#trusted_partner_id").val();

            if (trusted_partnerId) {
                var url = window.APP_URLS.trusted_partnerUpdate.replace(':id', trusted_partnerId);
            } else {
                var url = window.APP_URLS.trusted_partnerStore;
            }
            // var url = window.APP_URLS.trusted_partnerStore;
            var formData = new FormData($("#trusted_partner_form")[0]);
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: function (response, textStatus, jqXHR) {
                    $("#message-pop-up").removeClass('alert-success alert-warning')
                    if (response.result) {
                        $('#trusted_partner_modal').modal('hide');
                        $("#trusted_partner_form")[0].reset()
                        $("#trusted_partner_id").val();
                        $("#message-pop-up").attr('style', 'display:block')
                        $("#message-pop-up").addClass('alert-success')
                        $("#success-message").html(response.message);
                        $("#preview_trusted_partner_image").hide(); // Hide the preview image after successful save
                        $("#color_value").val(''); // Clear the color value
                        setTimeout(() => {
                            $("#message-pop-up").attr('style', 'display:none')
                        }, 3000);
                        table.draw();
                    } else {
                        $('#trusted_partner_modal').modal('hide');
                        $("#trusted_partner_form")[0].reset()
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

    $(document).on('click', '.edit_trusted_partner', function () {
        var trusted_partner_id = $(this).data('id');
        var url = window.APP_URLS.trusted_partner_edit_data.replace(':id', trusted_partner_id);
        $.ajax({
            type: "GET",
            url: url,
            success: function (response, textStatus, jqXHR) {
                if (response.result) { 
                    $("input[name='trusted_partner_status']").prop('checked', false);
                    $('#trusted_partner_modal').modal('show');
                    $("#trusted_partner_id").val(response.data.id);
                    $("#alt_tag").val(response.data.alt_tag);
                    $("input[name='trusted_partner_status'][value='" + response.data.status + "']").prop('checked', true);
                    // ✅ Show existing banner image if available

                    if (response.data.image) {
                        $("#preview_trusted_partner_image").show(); // full URL or relative path
                        $("#preview_trusted_partner_image")
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

    $(document).on('click', '.delete_trusted_partner', function () {
        trusted_partner_id = $(this).data('id');
        var url = window.APP_URLS.trusted_partner_delete_data.replace(':id', trusted_partner_id);
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


    // function valid_trusted_partner(){
    //     if($("#trusted_partner_name").val() == ''){
    //         $("#span_trusted_partner").text("Enter Name This Filed is Required.")
    //         return false
    //     }else{
    //         $("#span_trusted_partner").text("")
    //         return true;
    //     }
    // }

    function valid_trusted_partner_status() {
        if ($("input[name='trusted_partner_status']:checked").length === 0) {
            $("#span_trusted_partner_status").text("Please select a status.");
            return false;
        } else {
            $("#span_trusted_partner_status").text("");
            return true;
        }
    }

    // Run validation immediately when user clicks radio
    $("input[name='trusted_partner_status']").on("change", function () {
        valid_trusted_partner_status();
    });
});
function validateAndPreviewImage() {
    const input = document.getElementById("trusted_partner_image");
    const file = input.files[0];
    const errorSpan = document.getElementById("span_trusted_partner_image");
    const previewImg = document.getElementById("preview_trusted_partner_image");
    const bannerId = document.getElementById("trusted_partner_id")?.value;

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
document.getElementById("trusted_partner_image").addEventListener("change", function () {
    validateAndPreviewImage();
});
