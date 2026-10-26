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
        $("#exceeds_expectations_form")[0].reset()
        $("#preview_exceeds_expectations_image").hide();
        $('#description').summernote('code', '');  
        $(".error").html(''); // Hide the preview image after successful save
        
    });
    console.log("ready");
    var imagePath = window.APP_URLS.image_path;
    // console.log("Image Path: " + imagePath);
    var table = $('#exceeds_expectationstable').DataTable({
        processing: true,
        serverSide: true, 
        ajax: window.APP_URLS.exceeds_expectations_get_data,   
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
        
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });


    $("#Saveexceeds_expectations").on('click', function () {
        if (valid_exceeds_expectations_status()  & valid_exceeds_expectations() &  valid_description()) {
            var exceeds_expectationsId = $("#exceeds_expectations_id").val();
            
            var url = window.APP_URLS.exceeds_expectationsStore;
            
            // var url = window.APP_URLS.exceeds_expectationsStore;
            var formData = new FormData($("#exceeds_expectations_form")[0]);
            $.ajax({ 
                type: "POST",
                url: url, 
                data: formData,
                contentType: false,
                processData: false,
                success: function (response, textStatus, jqXHR) {
                    $("#message-pop-up").removeClass('alert-success alert-warning')
                    if (response.result) {
                        $('#exceeds_expectations_modal').modal('hide');
                        $("#exceeds_expectations_form")[0].reset()
                        $("#exceeds_expectations_id").val();
                        $("#message-pop-up").attr('style', 'display:block')
                        $("#message-pop-up").addClass('alert-success')
                        $("#success-message").html(response.message);
                        $("#preview_exceeds_expectations_image").hide(); // Hide the preview image after successful save
                        $("#color_value").val(''); // Clear the color value
                        setTimeout(() => {
                            $("#message-pop-up").attr('style', 'display:none')
                        }, 3000);
                        table.draw();
                    } else {
                        $('#exceeds_expectations_modal').modal('hide');
                        $("#exceeds_expectations_form")[0].reset()
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

    $(document).on('click', '.edit_exceeds_expectations', function () {
        var exceeds_expectations_id = $(this).data('id');
        var url = window.APP_URLS.exceeds_expectations_edit_data.replace(':id', exceeds_expectations_id);
        $.ajax({
            type: "GET",
            url: url,
            success: function (response, textStatus, jqXHR) {
                if (response.result) {
                    $("input[name='exceeds_expectations_status']").prop('checked', false);
                    $('#exceeds_expectations_modal').modal('show');
                    $("#exceeds_expectations_id").val(response.data.id);
                    $("#name").val(response.data.name);
                    $("#alt_tag").val(response.data.alt_tag);
                    $("#designation").val(response.data.designation);
                    $("#description").summernote('code', response.data.description);
                    $("input[name='exceeds_expectations_status'][value='" + response.data.status + "']").prop('checked', true);
                    // ✅ Show existing banner image if available

                    if (response.data.image) {
                        $("#preview_exceeds_expectations_image").show(); // full URL or relative path
                        $("#preview_exceeds_expectations_image")
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
 
    $(document).on('click', '.delete_exceeds_expectations', function () {
        exceeds_expectations_id = $(this).data('id');
        var url = window.APP_URLS.exceeds_expectations_delete_data.replace(':id', exceeds_expectations_id);
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


    function valid_exceeds_expectations(){
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

    function valid_exceeds_expectations_status() {
        if ($("input[name='exceeds_expectations_status']:checked").length === 0) {
            $("#span_exceeds_expectations_status").text("Please select a status.");
            return false;
        } else {
            $("#span_exceeds_expectations_status").text("");
            return true;
        }
    }

    // Run validation immediately when user clicks radio
    $("input[name='exceeds_expectations_status']").on("change", function () {
        valid_exceeds_expectations_status();
    });
});

