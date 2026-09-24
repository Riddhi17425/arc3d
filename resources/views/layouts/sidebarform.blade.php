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
        
        <!--<div class="col-lg-6 ">-->
        <!--  <div class="form-floating">-->
        <!--    <input type="email" class="form-control" id="contact" name="contact_number" placeholder="1234567890"-->
        <!--    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);" maxlength="12" minlength="10">-->
        <!--    <label for="contact">Contact Number<span class="required-star">*</span></label>-->
        <!--  </div>-->
        <!--</div>-->

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
        
       
            <div class="col-lg-6">
                               
                                    
                                   
                                         <div class="form-floating">
                                        
                                        <input type="text" class="dyn_call form-control col" value="{{old('contact_number')}}" id="contact" name="contact_number"
                                               placeholder="Enter your phone number"
                                               oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,20);">
                                     <label for="contact_number">Enter Your Number <span class="required-star">*</span></label>
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
          <!--<a href="#" class="btn_0" id="contactSubmit">Submit Now <svg width="12" height="11" viewBox="0 0 12 11" fill="none"-->
          <!--    xmlns="http://www.w3.org/2000/svg">-->
          <!--    <path d="M1 10.5L11 0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>-->
          <!--    <path d="M2.11108 0.5H11V8.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>-->
          <!--  </svg>-->
          <!--</a>-->
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

