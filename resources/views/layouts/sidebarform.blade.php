@php
  // Popup ke liye countries (unique variable names taaki page ke $countries / $country se na takraye)
  $popupCountries = \App\Models\Country::select('id', 'name', 'phonecode', 'shortname')->get();
@endphp

<style>
  /* Sirf popup ke andar ke select2 ke liye (contact page jaisa look) */
  #sidebar_inquiry .select2-container--default .select2-selection--single {
    border-radius: 0px;
    border: none;
  }
  #sidebar_inquiry .select2.select2-container {
    border-bottom: 1px solid #ddd;
  }
  #sidebar_inquiry .phone_code .select2.select2-container {
    width: fit-content !important;
    border-bottom: 1px solid #ddd;
  }
</style>

<!-- Modal -->
<div class="modal sidebarform fade" id="sidebar_inquiry" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="sidebar_inquiry" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title fs-5"><b>Enquire Now Form</b></p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form id="ContactForm1" method="POST" class="conatct_inquiry" action="{{ route('front.contact_submit') }}">
      @csrf
      <input type="hidden" name="form_time" value="{{ time() }}">
      <!-- Popup ki pehchaan (sheet me "Enquire Now Popup" aayega) -->
      <input type="hidden" name="form_source" value="popup">
      <div class="row ct_form_wraper enquire_now_form">
        
        <div class="col-lg-6">
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

        <div class="col-lg-6">
          <div class="form-floating">
            <input type="text" class="form-control" value="{{old('company_name')}}" name="company_name" id="company_name" placeholder="name@example.com"
           >
            <label for="company_name">Company Name<span class="required-star">*</span></label>
            @error('company_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <!-- Phone code + number -->
        <div class="col-lg-6">
          <div class="phone_code">
            <div class="row align-items-end">
              <input type="hidden" name="country" id="popup_selected_country_name">
              <select id="popup_phone_code" name="phone_code" class="form-select" style="width:50%">
                <option value="" hidden>Select Code</option>
                @foreach($popupCountries as $popupCountry)
                  <option value="{{ $popupCountry->phonecode }}"
                          data-flag="{{ strtolower($popupCountry->shortname) }}"
                          data-name="{{ $popupCountry->name }}"
                          data-phonecode="{{ $popupCountry->phonecode }}">
                    {{ $popupCountry->name }} +{{ $popupCountry->phonecode }}
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
        <div class="col-lg-6">
          <div class="form-floating">
            <select class="form-select" id="services" name="services" required>
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
       
        
        <div class="col-lg-6">
          <div class="form-floating mb-0">
            <textarea class="form-control" name="message" placeholder="Leave a comment here" id="message">{{old('message')}}</textarea>
            <label for="message">Message</label>
            @error('message')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-check">
            <input class="form-check-input" name="privacy_agree" type="checkbox" value="" id="flexCheckDefault">
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
                  <input class="form-control" type="text" id="custom_captcha_comman_form" name="custom_captcha" placeholder="Enter captcha" autocomplete="off">
              </div>
              <small id="custom_captcha_error_comman_form" class="text-danger" style="display:none;">Please verify captcha.</small>
          </div>
        </div>

        <div class="col-lg-12">
          <button type="button" class="btn_0 contactSubmit">Submit Now <svg width="12" height="11" viewBox="0 0 12 11" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M1 10.5L11 0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M2.11108 0.5H11V8.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
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
document.addEventListener("DOMContentLoaded", function () {
    if (!window.jQuery) return;
    const $ = window.jQuery;
    const popupPhoneCode = $('#popup_phone_code');

    // Select2 plugin load na ho to bhi normal select kaam karega
    if ($.fn.select2) {
        popupPhoneCode.select2({
            dropdownParent: $('#sidebar_inquiry'), // modal ke andar dropdown sahi chale
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
    }

    // Selected option ka country name hidden field me daalo
    function setPopupCountryName() {
        const name = popupPhoneCode.find('option:selected').data('name') || '';
        $('#popup_selected_country_name').val(name);
    }

    popupPhoneCode.on('change', setPopupCountryName);

    // Default UAE (contact page jaisa)
    popupPhoneCode.val('971');
    if ($.fn.select2) {
        popupPhoneCode.trigger('change.select2');
    }
    setPopupCountryName();
});
</script>
