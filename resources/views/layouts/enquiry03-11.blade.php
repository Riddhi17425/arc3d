<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Enquiry Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="post" id="enquireForm" action="{{ route('front.inquires.store') }}" > 
          @csrf

          <div class="row">
            <div style="display:none;">
              <input type="text" name="website_url" id="website_url" value="">
            </div>
 
            <div class="col-md-12 mb-3">
              <label class="form-label mb-0">Full Name <span style=" color: red; ">*</span></label>
              <input type="text" id="fullname" name="fullname" maxlength="50"
                oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                class="form-control ps-0" placeholder="Enter your full name">
              <small id="fullnameError" class="text-danger"></small>
            </div> 

            <div class="col-md-12 mb-3">
              <label class="form-label mb-0">Company Name <span style=" color: red; ">*</span></label>
              <input type="text" id="company_name" name="company_name" maxlength="50"
                oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                class="form-control ps-0" placeholder="Enter your company name">
              <small id="company_nameError" class="text-danger"></small>
            </div>
            <!-- Honeypot Field (hidden) -->
            <div style="display:none;">
            <label>Leave this field empty</label>
            <input type="text" name="fax_number" autocomplete="off">
            </div>
            <div class="col-md-12 mb-3">
              <label class="form-label mb-0">Contact Number <span style=" color: red; ">*</span></label>
              <input type="text" id="phone" name="phone" minlength="10" maxlength="15"
                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);"
                class="form-control ps-0" placeholder="Enter your contact number" pattern="\d{10,15}" title="Contact number must be between 10 to 15 digits">
              <small id="phoneError" class="text-danger"></small>
            </div> 
            
            <div class="col-md-12 mb-3">
              <label class="form-label mb-0">Service </label>
              <input type="text" id="service" name="service" maxlength="50"
                oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                class="form-control ps-0" placeholder="Enter your company name" readonly>
              <small id="phoneError" class="text-danger"></small>
            </div>

            <div class="col-md-12 mb-3">
              <label class="form-label mb-0">Email Address <span style=" color: red; ">*</span></label>
              <input type="email" id="email" name="email" maxlength="50" class="form-control ps-0" placeholder="Enter your email ID">
              <small id="emailError" class="text-danger"></small>
            </div>
 
            <div class="col-md-12 mb-3">
              <label class="form-label mb-0">Message </label>
              <input type="text" id="message" name="message" class="form-control ps-0" placeholder="Enter your message">
              <small id="messageError" class="text-danger"></small>
            </div>

            <div class="row align-items-center mb-4">
                <div class="col-auto">
                    <img id="captcha-image" src="{{ route('captcha.image') }}" alt="CAPTCHA Image" style="border: 1px solid #ccc; height: 40px;">
                </div>
                <div class="col-auto">
                        <svg id="reload-button" style="cursor: pointer;" width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.539 9.54947C19.539 4.46972 15.5667 0.755859 10.4869 0.755859C5.40715 0.755859 1.34335 4.81966 1.34335 9.89941C1.34335 14.9792 5.40715 19.043 10.4869 19.043C12.9252 19.043 14.9571 18.027 16.5826 16.6047" stroke="#333" stroke-miterlimit="10" stroke-linecap="round"></path>
                        <path d="M21.5833 5.86837L19.589 9.66244L15.4799 8.32953" stroke="#333" stroke-miterlimit="10" stroke-linecap="round"></path>
                    </svg>
                </div>
                <div class="col-auto mt-3 mt-md-0">
                    <input class="form-control" type="text" id="custom_captcha" placeholder="Enter captcha" autocomplete="off">
                </div>
                <small id="custom_captcha_error" class="text-danger" style="display:none;">Please verify captcha.</small>
            </div>

            <div class="col-md-12 text-center">
              <button type="submit"  class="btn_0">
                Submit
              </button>
            </div> 
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<!--modal-->
<script src=" https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
   var modal = document.getElementById('staticBackdrop');
    modal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal 
        var button = event.relatedTarget;
        var service = button.getAttribute('data-product');
        // Update the modal input field
        var input = modal.querySelector('#service');
        input.value = service;
    });



   document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('enquireForm');
    const submitButton = form.querySelector('button[type="submit"]');

    // Fields
    const fullName = document.getElementById('fullname');
    const companyName = document.getElementById('company_name');
    const phone = document.getElementById('phone');
    const email = document.getElementById('email');
    // const message = document.getElementById('message');
    const customCaptcha = document.getElementById('custom_captcha');

    // Error elements
    const fullNameError = document.getElementById('fullnameError');
    const companyNameError = document.getElementById('company_nameError');
    const phoneError = document.getElementById('phoneError');
    const emailError = document.getElementById('emailError');
    // const messageError = document.getElementById('messageError');
    const customCaptchaError = document.getElementById('custom_captcha_error');

    // Email validation pattern
    function isValidEmail(email) {
        const re = /^[a-zA-Z0-9._%+-]{2,64}@[a-zA-Z0-9.-]+\.[A-Za-z]{2,10}$/;
        return re.test(email);
    }

    // Full name validation
    fullName.addEventListener('input', function() {
        const value = fullName.value.trim();
        const valid = /^[A-Za-z\s]+$/.test(value);
        fullNameError.textContent = value === '' || !valid
            ? 'Please enter a valid full name (letters only).'
            : '';
    });

    // Company name validation
    companyName.addEventListener('input', function() {
        const value = companyName.value.trim();
        const valid = /^[A-Za-z0-9\s]+$/.test(value);
        companyNameError.textContent = value === '' || !valid
            ? 'Please enter a valid company name.'
            : '';
    });

    // Phone validation
    phone.addEventListener('input', function() {
        const value = phone.value.trim();
        const valid = /^\d{10,15}$/.test(value);
        phoneError.textContent = value === '' || !valid
            ? 'Please enter a valid contact number (10–15 digits).'
            : '';
    });

    // Email validation
    email.addEventListener('input', function() {
        const value = email.value.trim();
        emailError.textContent = !isValidEmail(value)
            ? 'Please enter a valid email address.'
            : '';
    });

    // // Message validation
    // message.addEventListener('input', function() {
    //     const value = message.value.trim();
    //     messageError.textContent = value === ''
    //         ? 'Please enter your message.'
    //         : '';
    // });

    // Captcha validation
    customCaptcha.addEventListener('input', function() {
        const value = customCaptcha.value.trim();
        if (value.length === 4) {
            customCaptchaError.style.display = 'none';
        } else if (value === '') {
            customCaptchaError.style.display = 'block';
            customCaptchaError.textContent = "Please enter the captcha.";
        } else {
            customCaptchaError.style.display = 'block';
            customCaptchaError.textContent = "Captcha must be 4 digits.";
        }
    });

    // Form submit
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        let isValid = true;

        // Validate all fields
        if (fullName.value.trim() === '' || !/^[A-Za-z\s]+$/.test(fullName.value.trim())) {
            fullNameError.textContent = 'Please enter a valid full name.';
            isValid = false;
        }

        if (companyName.value.trim() === '' || !/^[A-Za-z0-9\s]+$/.test(companyName.value.trim())) {
            companyNameError.textContent = 'Please enter a valid company name.';
            isValid = false;
        }

        if (phone.value.trim() === '' || !/^\d{10,15}$/.test(phone.value.trim())) {
            phoneError.textContent = 'Please enter a valid contact number.';
            isValid = false;
        }

        if (!isValidEmail(email.value.trim())) {
            emailError.textContent = 'Please enter a valid email address.';
            isValid = false;
        }

        // if (message.value.trim() === '') {
        //     messageError.textContent = 'Please enter your message.';
        //     isValid = false;
        // }

        if (customCaptcha.value.trim() === '') {
            customCaptchaError.style.display = 'block';
            customCaptchaError.textContent = 'Please verify captcha.';
            isValid = false;
        } else {
            customCaptchaError.style.display = 'none';
        }

        if (!isValid) return;

        // Disable submit button while verifying captcha
        submitButton.textContent = 'Verifying captcha...';
        submitButton.disabled = true;

        // AJAX captcha verification
        $.ajax({
            url: '{{ route("captcha.verify") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                custom_captcha: customCaptcha.value.trim()
            },
            success: function(response) { 
                if (response.success) {
                    submitButton.textContent = 'Submitting...';
                    form.submit();
                } else {
                    document.getElementById('captcha-image').src = '{{ route("captcha.image") }}?t=' + Date.now();
                    customCaptchaError.style.display = 'block';
                    customCaptchaError.textContent = response.message;
                    submitButton.textContent = 'Submit';
                    submitButton.disabled = false;
                }
            },
            error: function() {
                // alert('Something went wrong. Please try again.');
                submitButton.textContent = 'Submit';
                submitButton.disabled = false;
            }
        });
    });

    // Captcha reload button
    document.getElementById('reload-button').addEventListener('click', function() {
        document.getElementById('captcha-image').src = '{{ route("captcha.image") }}?t=' + Date.now();
    });
});

</script>