$(document).ready(function () {
    $('#service_desc').summernote({
        placeholder: 'Enter Description here...',
        height: 300,
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

    $('#service_short_desc').summernote({
        placeholder: 'Enter Short Description here...',
        height: 300,
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

    $('#howitworks_desc').summernote({
        placeholder: 'Enter Description here...',
        height: 300,
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

    $('#howitworks_short_desc').summernote({
        placeholder: 'Enter Short Description here...',
        height: 300,
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
    $('#its_worth_description').summernote({
        placeholder: 'Enter Its Worth Description here...',
        height: 300, 
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

    $('#meta_description').summernote({
        placeholder: 'Enter Meta Description here...',
        height: 300, 
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
    // $('#service_title').on('keyup change', function () {
    //     if (!urlChanged) {
    //         let slug = slugify($(this).val());
    //         $('#service_url').val(slug); 
            
    //     }   
    // });

    $('#service_url').on('input', function () {
        urlChanged = true;
    });
 
    // thats for index datatables 
    var imagePath = window.APP_URLS.image_path;
    var table = $('#service_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: window.APP_URLS.getServicedata,
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
                        return '<img src="'+ imagePath + '/' +  data + '" alt="' + row.image + '" width="60" height="60">';
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
    $(document).on('click', '.delete_service', function () {
        let id = $(this).data('id');

        var url = window.APP_URLS.deleteservice.replace(':id' , id);
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



// Remove image preview when clicking the × button


function validateAndPreviewImage() {
        const input = document.getElementById("service_image");
        const file = input.files[0];
        const errorSpan = document.getElementById("span_service_image");
        const previewImg = document.getElementById("preview_service_image");
        const bannerId = document.getElementById("span_service_image_id")?.value;
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
    document.getElementById("service_image").addEventListener("change", function () {
    validateAndPreviewImage();
});


function backValidateAndPreviewImage() {
        const input = document.getElementById("back_service_image");
        const file = input.files[0];
        const errorSpan = document.getElementById("span_back_service_image");
        const previewImg = document.getElementById("preview_back_service_image");
        // Check if file selected
        if (!file) {
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
    document.getElementById("back_service_image").addEventListener("change", function () {
    backValidateAndPreviewImage();
});


function whyitsworthAndPreviewImage() {
        const input = document.getElementById("its_worth_image");
        const file = input.files[0];
        const errorSpan = document.getElementById("span_its_worth_image");
        const previewImg = document.getElementById("preview_its_worth_image");
        // Check if file selected
        if (!file) {
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
    document.getElementById("its_worth_image").addEventListener("change", function () {
    backValidateAndPreviewImage();
});

 
document.addEventListener('DOMContentLoaded', function() {
    const howitworkCheckboxes = document.querySelectorAll('.howitwork-checkbox');
    const selectedhowitworksText = document.getElementById('selectedhowitworksText');
    
    function updateSelectedhowitworks() {
        const selected = [];
        howitworkCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                selected.push(checkbox.getAttribute('data-name'));
            }
        });
        
        if (selected.length > 0) {
            selectedhowitworksText.textContent = selected.join(', ');
            selectedhowitworksText.classList.remove('text-muted');
            selectedhowitworksText.classList.add('text-primary');
        } else {
            selectedhowitworksText.textContent = 'None';
            selectedhowitworksText.classList.remove('text-primary');
            selectedhowitworksText.classList.add('text-muted');
        }
    }
    
    // Add event listeners
    howitworkCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedhowitworks);
    });
    
    // Initial update
    updateSelectedhowitworks();
    
    // Form validation
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const checkedhowitworks = document.querySelectorAll('.howitwork-checkbox:checked');
            if (checkedhowitworks.length === 0) {
                e.preventDefault();
                alert('Please select at least one howitwork.');
                document.querySelector('.howitwork-checkbox').focus();
                return false;
            } 
        });
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const exceeds_expectationCheckboxes = document.querySelectorAll('.exceeds_expectation-checkbox');
    const selectedexceeds_expectationsText = document.getElementById('selectedexceeds_expectationsText');
    
    function updateSelectedexceeds_expectations() {
        const selected = [];
        exceeds_expectationCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                selected.push(checkbox.getAttribute('data-name'));
            }
        });
        
        if (selected.length > 0) {
            selectedexceeds_expectationsText.textContent = selected.join(', ');
            selectedexceeds_expectationsText.classList.remove('text-muted');
            selectedexceeds_expectationsText.classList.add('text-primary');
        } else {
            selectedexceeds_expectationsText.textContent = 'None';
            selectedexceeds_expectationsText.classList.remove('text-primary');
            selectedexceeds_expectationsText.classList.add('text-muted');
        }
    }
    
    // Add event listeners
    exceeds_expectationCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedexceeds_expectations);
    });
    
    // Initial update
    updateSelectedexceeds_expectations();
    
    // Form validation
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const checkedexceeds_expectations = document.querySelectorAll('.exceeds_expectation-checkbox:checked');
            if (checkedexceeds_expectations.length === 0) {
                e.preventDefault();
                alert('Please select at least one exceeds_expectation.');
                document.querySelector('.exceeds_expectation-checkbox').focus();
                return false;
            } 
        });
    }
});