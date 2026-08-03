@include('layouts.frontheader')
<!-- @include('layouts.loader') -->
<style>
    .select2-container--default .select2-selection--single{
        border-radius: 0px;
        border:none;
        
    }
    .select2.select2-container{border-bottom: 1px solid #ddd;}
    .phone_code .select2.select2-container{width:fit-content!important;border-bottom: 1px solid #ddd;}
</style>
<section class="banner">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <h1 class="title_48">
          <span class="blue_txt">Contact Us:</span>
          <br>Let’s Bring Your Vision to Life
        </h1>
        <div class="banner_para">
          <p>Whether you’re seeking rapid prototyping, architectural model making, or custom 3D design support — our
            expert team across the UAE is ready to assist. </p>
        </div>
        <!--<a href="javascript:void(0);" class="btn_0">Contact Us <svg width="12" height="11" viewBox="0 0 12 11"-->
        <!--    fill="none" xmlns="http://www.w3.org/2000/svg">-->
        <!--    <path d="M1 10.5L11 0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>-->
        <!--    <path d="M2.11108 0.5H11V8.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>-->
        <!--  </svg>-->
        <!--</a>-->
      </div>
      <div class="col-lg-6">
        <div class="pc_banner_wrapper">
          <img src="{{asset('public/front/images/contact_banner.png')}}" alt="contact" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</section>
<section class="mt-100" id="Inquiry_jump">
  <div class="container">
    <form id="ContactForm" method="POST" class="conatct_inquiry" action="{{ route('front.contact_submit') }}">
      @csrf
      <input type="hidden" name="form_time" value="{{ time() }}">
      <div class="row ct_form_wraper">
        <div class="col-lg-12">
          <h2 class="title_48 mb-0">
            <span class="blue_txt">Get in Touch</span> 
          </h2>
          <p>Fill out the form below, and we’ll get back to you shortly.</p>
        </div> 
        <div class="col-lg-6 ">
          <div class="form-floating">
            <input type="text" class="form-control" id="fullname" name="fullname" value="{{old('fullname')}}" placeholder="Name"
            oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();" maxlength="70">
            <label for="fullname">Full Name<span class="required-star">*</span></label>
            @error('fullname')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <!--Honeypot Field (hidden) -->
            <div style="display:none;">
              <label>Leave this field empty</label>
              <input type="text" name="fax_number" autocomplete="off">
            </div>
        <div class="col-lg-6">
          <div class="form-floating">
            <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email" placeholder="name@example.com">
            <label for="email">Email<span class="required-star">*</span></label>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        
        <!--<div class="col-lg-6 ">-->
        <!--  <div class="form-floating">-->
        <!--    <input type="email" class="form-control" id="contact" name="contact_number" placeholder="1234567890"-->
        <!--    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);" maxlength="12" minlength="10">-->
        <!--    <label for="contact">Contact Number<span class="required-star">*</span></label>-->
        <!--  </div>-->
        <!--</div>-->

        <div class="col-lg-6 ">
          <div class="form-floating">
            <input type="text" class="form-control" value="{{old('company_name')}}" name="company_name" id="company_name" placeholder="name@example.com"
           >
            <label for="company_name">Company Name<span class="required-star">*</span></label>
            @error('company_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
         @php
            use App\Models\Country;
            // Fetch all countries
            $countries = Country::select('id', 'name', 'phonecode','shortname')->get();
        @endphp
        <!------------------------------->
        <!--    <div class="col-lg-6 mb-4 mb-md-5">-->
        <!--                        <label for="country" class="mb-2">Choose a Country<span class="required-star">*</span></label>-->
        <!--                        <select id="country" name="country" class="form-select" style="width:100%">-->
        <!--                            <option value="" hidden>Select Country</option>-->
        <!--                            @foreach($countries as $country)-->
        <!--                                <option value="{{ $country->name }}" data-phonecode="{{ $country->phonecode }}">-->
        <!--                                    {{ $country->name }}-->
        <!--                                </option>-->
        <!--                            @endforeach-->
        <!--                        </select>-->
        <!--                    </div>-->
            <!-- Phone code and number -->
            <div class="col-lg-6">
                                <div class="mb-4 mb-md-5 phone_code">
                                    <label for="home_contact_number"><span class="required-star"></span></label>
                                    <div class="row align-items-end">
                                        <!--<input type="text" class="dyn_code form-control text-center col" id="phone_code" name="phone_code"-->
                                        <!--       style="max-width:100px;" readonly placeholder="+Code">-->
                                        <select id="phone_code" name="phone_code" class="form-select" style="width:50%">
                                            <option value="" hidden>Select Code</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->phonecode }}"
                                                        data-flag="{{ strtolower($country->shortname) }}"
                                                        data-name="{{ $country->name }}"
                                                        data-phonecode="{{ $country->phonecode }}">
                                                    {{ $country->name }} +{{ $country->phonecode }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input type="text" class="dyn_call form-control col" value="{{old('contact_number')}}" id="contact" name="contact_number"
                                               placeholder="Enter your phone number"
                                               oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,20);">
                                    </div>
                                    @error('contact_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
        <!------------------------------->
        <div class="col-lg-12 ">
          <div class="form-floating">
            <select class="form-select" id="services" name="services">
              <option value="" hidden>Select Service</option>
              <option value="3D Printing Services">3D Printing Services</option>
              <option value="Large-Scale Model Making">Large-Scale Model Making</option>
              <option value="Architectural Model Making">Architectural Model Making</option>
              <option value="3D Scanning Services">3D Scanning Services</option>
              <option value="Rapid Prototyping Services">Rapid Prototyping Services</option>
              <option value="Interactive Technology">Interactive Technology (AR, VR, LED & More)</option>
              <option value="Other Services">Other Services</option>
            </select>
            <!--<label for="services">Services<span class="required-star">*</span></label>-->
            @error('services')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
       
        
        <div class="col-lg-12">
          <div class="form-floating mb-0">
            <textarea class="form-control" name="message" placeholder="Leave a comment here" id="message">{{old('message')}}</textarea>
            <label for="message">Message</label>
            @error('message')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault" style="font-size:14px;"> I agree to the Privacy
              Policy and Terms and Condition </label>
          </div>
        </div> 

        <div class="col-lg-12 mt-50">
          <div class="row align-items-center mb-4">
              <div class="col-auto">
                  <img id="captcha-image-comman-form" src="{{ route('captcha.image') }}" alt="CAPTCHA Image" style="border: 1px solid #ccc; height: 40px;">
              </div>
              <div class="col-auto">
                  <svg id="reload-button-comman-form" style="cursor: pointer;" id="reload-button" width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19.539 9.54947C19.539 4.46972 15.5667 0.755859 10.4869 0.755859C5.40715 0.755859 1.34335 4.81966 1.34335 9.89941C1.34335 14.9792 5.40715 19.043 10.4869 19.043C12.9252 19.043 14.9571 18.027 16.5826 16.6047" stroke="#333" stroke-miterlimit="10" stroke-linecap="round"></path>
                      <path d="M21.5833 5.86837L19.589 9.66244L15.4799 8.32953" stroke="#333" stroke-miterlimit="10" stroke-linecap="round"></path>
                  </svg> 
              </div>
              <div class="col-auto mt-3 mt-md-0">
                  <input class="form-control" type="text" id="custom_captcha_comman_form" placeholder="Enter captcha" autocomplete="off">
              </div>
              <small id="custom_captcha_error_comman_form" class="text-danger" style="display:none;">Please verify captcha.</small>
          </div>
        </div>

        <div class="col-lg-12">
          <!--<a href="#" class="btn_0" id="contactSubmit">Submit Now <svg width="12" height="11" viewBox="0 0 12 11" fill="none"-->
          <!--    xmlns="http://www.w3.org/2000/svg">-->
          <!--    <path d="M1 10.5L11 0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>-->
          <!--    <path d="M2.11108 0.5H11V8.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>-->
          <!--  </svg>-->
          <!--</a>-->
          <button type="button" class="btn_0" id="contactSubmit">Submit Now <svg width="12" height="11" viewBox="0 0 12 11" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M1 10.5L11 0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M2.11108 0.5H11V8.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </button>
        </div>
      </div>
    </form> 
  </div> 
</section>
<section class="mt-100">
  <div class="container">
    <div class="ct_box_wrapper">
      <div class="ct_box">
        <img src="{{ asset('public/front/images/ct_loc.svg')}}" alt="location">
        <div>
          <h3 class="title_24">Address:</h3>
          <a href="https://maps.app.goo.gl/DT4Cf2s33jR6BRar8" >Musaffah, Abu Dhabi, United Arab Emirates</a>
        </div>
      </div>
      <div class="ct_box">
        <img src="{{ asset('public/front/images/ct_call.svg')}}" alt="call">
        <div>
          <h3 class="title_24">Call Us:</h3>
          <a href="tel:+971542797571">+971 54 279 7571</a>
        </div>
      </div>
      <div class="ct_box">
        <img src="{{ asset('public/front/images/ct_mail.svg')}}" alt="mail">
        <div>
          <h3 class="title_24">Mail Us:</h3>
          <div class="email_box">
            <a href="mailto:info@arc3d.ae" class="pe-md-2"><b>General:</b> info@arc3d.ae</a>
            <a href="mailto:sales@arc3d.ae" class="px-md-2"><b>Sales:</b> sales@arc3d.ae</a>
            <a href="mailto:hr@arc3d.ae" class="px-md-2"><b>HR:</b> hr@arc3d.ae</a>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="map">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4349.637791640043!2d54.51203687594065!3d24.348129165565854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5e3f5b8e550657%3A0x43dd205ad3d4b2b7!2sArc%203D%20Printing%20Solutions%20LLC!5e1!3m2!1sen!2sin!4v1759223268225!5m2!1sen!2sin"
      width="100%" height="100%" style="border:0;line-height:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</section>


@include('layouts.frontfooter')

<script>
document.addEventListener("DOMContentLoaded", function () {
    const phoneCodeSelect = $('#phone_code');

    phoneCodeSelect.select2({
        templateResult: function (option) {
            if (!option.id) return option.text;
            const flag = $(option.element).data('flag');
            const name = $(option.element).data('name');
            const code = $(option.element).data('phonecode');
            const flagUrl = flag ? "https://flagcdn.com/24x18/" + flag.toLowerCase() + ".png" : "";
            return $('<span><img src="' + flagUrl + '" style="width:20px; margin-right:8px;">' + name + ' +' + code + '</span>');
        },
        templateSelection: function (option) {
            if (!option.id) return option.text;
            const flag = $(option.element).data('flag');
            const code = $(option.element).data('phonecode');
            const flagUrl = flag ? "https://flagcdn.com/24x18/" + flag.toLowerCase() + ".png" : "";
            return $('<span><img src="' + flagUrl + '" style="width:20px; margin-right:8px;">+' + code + '</span>');
        },
        width: '100%',
        dropdownAutoWidth: true,
    });

    // Always default to UAE — no geolocation, no override
    phoneCodeSelect.val('971').trigger('change.select2');
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('ContactForm');
    const submitButton = document.getElementById('contactSubmit');

    // Fields
    const fullname = document.getElementById('fullname');
    const companyName = document.getElementById('company_name');
    const email = document.getElementById('email');
    const contact = document.getElementById('contact');
    const checkbox = document.getElementById('flexCheckDefault');
    const captchaInput = document.getElementById('custom_captcha_comman_form');
    const honeypot = document.querySelector('input[name="fax_number"]');
    // const honeypot = document.querySelector('input[name="fax_number"]');
    // const country = document.getElementById('country');
    // Captcha controls
    const captchaError = document.getElementById('custom_captcha_error_comman_form');
    const captchaImage = document.getElementById('captcha-image-comman-form');
    const reloadButton = document.getElementById('reload-button-comman-form');

    reloadButton.addEventListener('click', function () {
        captchaImage.src = '{{ route("captcha.image") }}?' + Date.now();
    });

    // Create error elements dynamically
    function createErrorElement(input) {
        let error = document.createElement('small');
        error.className = "text-danger mt-1";
        error.style.display = "none";
        input.parentNode.appendChild(error);
        return error;
    }

    const fullnameError = createErrorElement(fullname);
    const companyNameError = createErrorElement(companyName);
    const emailError = createErrorElement(email);
    const contactError = createErrorElement(contact);
    const checkboxError = createErrorElement(checkbox);
    // const countryError = createErrorElement(country); 
    // Validation helpers
    const isValidName = (name) => /^[A-Za-z\s]+$/.test(name.trim());
    const isValidEmail = (email) => /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,}$/.test(email);
    const isValidContact = (number) => /^\d{0,15}$/.test(number.trim());
    const isRequired = (v) => v.trim() !== '';
    // const isValidCountry = (value) => value.trim() !== '';

    // Anti-spam email pattern check
    function checkSpamEmail(email) {
        const spamPatterns = [
            /^[a-zA-Z]{8,}[0-9]{6,}@/,
            /^[0-9]+@/,
            /(temp-mail|10minutemail|mailinator|guerrillamail|yopmail|throwawaymail|form-check.online|seismologiomail|ru|mailport.lat)/i,
            /^(test|demo|example|noreply|fake|admin|info|random|dummy)/i,
            /^(.)(\1){5,}@/
        ];
        for (let pattern of spamPatterns) {
            if (pattern.test(email)) return false;
        }
        return true;
    }

    // Captcha validation
    function validateCaptcha() {
        if (captchaInput.value.trim() === '') {
            captchaError.style.display = 'block';
            captchaError.textContent = "Please enter the captcha.";
            return false;
        } else if (captchaInput.value.trim().length !== 4) {
            captchaError.style.display = 'block';
            captchaError.textContent = "Captcha must be 4 digits.";
            return false;
        } else {
            captchaError.style.display = 'none';
            return true;
        }
    }

    let validationStarted = false;

    function validateField(input, errorEl, validator, emptyMsg, invalidMsg) {
        const value = input.value.trim();
        if (value === '') {
            errorEl.textContent = emptyMsg;
            errorEl.style.display = 'block';
            return false;
        } else if (!validator(value)) {
            errorEl.textContent = invalidMsg;
            errorEl.style.display = 'block';
            return false;
        } else {
            errorEl.style.display = 'none';
            return true;
        }
    }

    function attachLiveValidation() {
        fullname.addEventListener('input', () => validationStarted && validateField(fullname, fullnameError, isValidName, "Full name is required", "Enter a valid full name"));
        companyName.addEventListener('input', () => validationStarted && validateField(companyName, companyNameError, isRequired, "Company name is required", "Enter a valid company name"));
        email.addEventListener('input', () => validationStarted && validateField(email, emailError, isValidEmail, "Email is required", "Enter a valid email"));
        contact.addEventListener('input', () => validationStarted && validateField(contact, contactError, isValidContact, "Contact number is required", "Enter a valid contact number"));
        captchaInput.addEventListener('input', () => validationStarted && validateCaptcha());
        checkbox.addEventListener('change', () => validationStarted && (checkboxError.style.display = checkbox.checked ? 'none' : 'block'));
        // country.addEventListener('change', () => validationStarted && validateField(country, countryError, isValidCountry, "Please select a country", "Please select a valid country")); // ✅

      }

    attachLiveValidation();

    submitButton.addEventListener('click', function (e) {
        e.preventDefault();
        validationStarted = true;
        let isValid = true;

        // Basic validation
        if (!validateField(fullname, fullnameError, isValidName, "Full name is required", "Enter a valid full name")) isValid = false;
        if (!validateField(companyName, companyNameError, isRequired, "Company name is required", "Enter a valid company name")) isValid = false;

        // Email validation + spam check
        const emailVal = email.value.trim();
        if (!validateField(email, emailError, isValidEmail, "Email is required", "Enter a valid email")) {
            isValid = false;
        } else if (!checkSpamEmail(emailVal)) {
            emailError.textContent = "This email is not allowed.";
            emailError.style.display = 'block';
            isValid = false;
        } else {
            emailError.style.display = 'none';
        }

        if (!validateField(contact, contactError, isValidContact, "Contact number is required", "Enter a valid contact number")) isValid = false;

        if (!checkbox.checked) {
            checkboxError.textContent = "You must agree to the Privacy Policy and Terms.";
            checkboxError.style.display = 'block';
            isValid = false;
        } else checkboxError.style.display = 'none';

        if (!validateCaptcha()) isValid = false;

        // Honeypot check (extra client-side safety)
        if (honeypot.value.trim() !== '') {
            console.warn('Honeypot triggered — possible spam bot.');
            return; // silently stop
        }

        // // Inside submit click handler
        // if (!validateField(country, countryError, isValidCountry, "Please select a country", "Please select a valid country")) {
        //     isValid = false;
        // }
        if (!isValid) return;

        // Lock button
        submitButton.textContent = 'Verifying captcha...';
        submitButton.disabled = true;

        // Verify captcha via AJAX
        $.ajax({
            url: '{{ route("captcha.verify") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                custom_captcha: captchaInput.value.trim()
            },
            success: function (response) {
                if (response.success) {
                    submitButton.textContent = 'Submitting...';
                   submitButton.disabled = true;
                    form.submit();
                } else {
                    captchaImage.src = '{{ route("captcha.image") }}?' + Date.now();
                    captchaError.style.display = 'block';
                    captchaError.textContent = response.message;
                    submitButton.textContent = 'Submit Now';
                    
                    submitButton.disabled = false;
                }
            },
            error: function () {
                console.log('Something went wrong. Please try again.');
                submitButton.textContent = 'Submit Now';
               submitButton.disabled = false;
            }
        });
    });
});
</script>
