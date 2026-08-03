$(document).ready(function () {
    
    function slugify(text) {
        return text
            .toString()
            .toLowerCase()
            .trim()
            .replace(/&/g, '-and-')        // Replace & with 'and'
            .replace(/[\s\W-]+/g, '-')     // Replace spaces, non-word chars with -
            .replace(/^-+|-+$/g, '');      // Trim - from start & end
    }

    let urlChanged = false;

    // Auto-generate slug + meta title
    $('#featureproject_title').on('keyup change', function () {
        if (!urlChanged) {
            let slug = slugify($(this).val());
            $('#url').val(slug); 
           
        } 
    }); 

    $('#url').on('input', function () {
        urlChanged = true;
    });

 
    // thats for index datatables 
    var imagePath = window.APP_URLS.image_path;
    var table = $('#featureproject_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: window.APP_URLS.getFeatureproject,
        order: [[0, 'desc']],
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            {
                data: 'image',
                name: 'image',
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    if (data) {
                        return '<img src="'+ imagePath + "/" +   data + '" alt="' + row.image + '" width="60" height="60">';
                    } else {
                        return '<span class="text-muted">No Image</span>';
                    }
                }
            }, 
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });

    // delete milestone
    $(document).on('click', '.delete_featureproject', function () {
        let id = $(this).data('id');

        var url = window.APP_URLS.deletefeatureproject.replace(':id' , id);
        if (confirm('Are you sure you want to delete this data?')) {
            $.ajax({
                url: url,  // Make sure your route matches this
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': window.APP_URLS.csrfToken
                },
                success: function (response) {
                   if(response.result){
                        $("#message-pop-up").attr('style' , 'display:block')
                        $("#message-pop-up").addClass('alert-success')
                        $("#success-message").html(response.message);
                        setTimeout(() => {
                            $("#message-pop-up").attr('style' , 'display:none')
                        }, 3000);
                        table.draw();
                    }else{
                        $("#message-pop-up").attr('style' , 'display:block')
                        $("#message-pop-up").addClass('alert-warning')
                        $("#success-message").html(response.message);
                        setTimeout(() => {
                            $("#message-pop-up").attr('style' , 'display:none')
                        }, 3000);
                    }
                },
                error: function (xhr) {
                    alert('Something went wrong!');
                }
            });
        }
    });
});





function validateAndPreviewImage() {
        const input = document.getElementById("featureproject_image");
        const file = input.files[0];
        const errorSpan = document.getElementById("span_featureproject_image");
        const previewImg = document.getElementById("preview_featureproject_image");
        const bannerId = document.getElementById("span_featureproject_image_id")?.value;
        // Check if file selected
        if (bannerId && !file) {
            errorSpan.innerText = "";
            return true; // allow update without new image
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
    document.getElementById("featureproject_image").addEventListener("change", function () {
    validateAndPreviewImage();
});


document.addEventListener('DOMContentLoaded', function() {
    const serivceCheckboxes = document.querySelectorAll('.service-checkbox');
    const selectedserivcesText = document.getElementById('selectedservicesText');
    
    function updateSelectedserivces() {
        const selected = [];
        serivceCheckboxes.forEach(checkbox => {
            if (checkbox.checked) { 
                selected.push(checkbox.getAttribute('data-name'));
            }
        });
        
        if (selected.length > 0) {
            selectedserivcesText.textContent = selected.join(', ');
            selectedserivcesText.classList.remove('text-muted');
            selectedserivcesText.classList.add('text-primary');
        } else {
            selectedserivcesText.textContent = 'None';
            selectedserivcesText.classList.remove('text-primary');
            selectedserivcesText.classList.add('text-muted');
        }
    }
    
    // Add event listeners
    serivceCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedserivces);
    });
    
    // Initial update
    updateSelectedserivces();
    
    // Form validation
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const checkedserivces = document.querySelectorAll('.serivce-checkbox:checked');
            if (checkedserivces.length === 0) {
                e.preventDefault();
                alert('Please select at least one serivce.');
                document.querySelector('.serivce-checkbox').focus();
                return false;
            } 
        });
    }
});