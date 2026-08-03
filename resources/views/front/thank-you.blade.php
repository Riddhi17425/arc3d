@include('layouts.frontheader')
<section class="service_banner banner">    
        <div class="text-center">
            <h1 class="title_48 blue_txt text-center mb-4">Thank You</h1>
             <p class="text-center mb-4">Thank you for your enquiry. 
            It has been submitted successfully, and our team will get in touch with you soon.
             </p>   
             
             <a href="{{ url('/') }}" class="btn_1">
                        Back to Home
                    </a>
                    
              <img src="{{ asset('public/front/images/thank-you.png')}}" alt="thank-you.png" class="img-fluid">
        </div>  
</section>

@include('layouts.frontfooter')