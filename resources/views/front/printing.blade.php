@include('layouts.frontheader', [
    'og_image' => url('public/admin/technologies_image/SLA_2.webp')
])
@php
    use App\Models\Industries;
@endphp
<style>
     .gsap_text span {
      display: inline-block;
      /*transform: translateY(20px);*/
      opacity: 0.1;
    }
    /*.gsap_text{font-size:36px;line-height:42px;}*/
    
    .according_head {
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 20px;
    position: relative;
    padding-right: 30px;
    /*background: rgba(128, 128, 128, 0.308);*/
    background: rgb(0 87 98 / 8%);
    /* light gray */
    padding: 12px 10px;
    border-radius: 5px;
    margin-bottom: 20px;
        padding-right: 30px;
}

    /* Slick cloned slides: h3/h4 -> p (JS converts them), keep same look */
    .slick-cloned p.head_2,
    .slick-cloned p.title_24,
    .slick-cloned p.slide_title {
        margin-top: 0;
        margin-bottom: 0.5rem;
        font-weight: 500;
        line-height: 1.2;
    }
    
/* ===== 3D Printing Page: Core Services slider (equal height cards) ===== */

/* Slider track ko flex banao taaki saare slides ki height barabar ho */
.core-services-slider .slick-track {
    display: flex !important;
}

/* Slick ke slide wrapper ki height auto rakho */
.core-services-slider .slick-slide {
    height: auto;
}

/* Slide ke andar wala div poori height le */
.core-services-slider .slick-slide > div {
    height: 100%;
}

/* Card ki fixed height aur padding (process-slides jaisi) */
.expect_slide.core-service-slide {
    height: 300px;
    padding: 39px 25px;
}

/* Card ka heading style */
.core-service-slide .title_24 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
}

/* Card ka paragraph text */
.core-service-slide p {
    font-size: 16px;
}
</style>
<section class="service_banner banner">
    <div class="container">
        <h1 class="title_48 blue_txt ">Best 3D Printing Company in UAE</h1>
        <p>{!! $service->description !!}</p>
        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn_0 mt-50" data-product="{{ $service->title }}">Request a Quote <svg class="ms-2" width="12" height="11" viewBox="0 0 12 11"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 10.5L11 0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M2.11108 0.5H11V8.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
    </div>
</section>
<!-- <section class="mt-100">
    <div class="container gsap_wrapper">
        <p class="para_36 gsap_text">Every technology has unique strengths. By combining them with our design expertise and finishing capabilities, we provide precise, reliable, and cost-effective models that help businesses innovate faster, reduce risks,and achieve milestones with confidence.</p>
        
    </div>
</section> -->
<section class="tech mt-50">
    <div class="container">
        <div class="tech_head">
            <h2 class="title_48 blue_txt text-start">Advanced 3D Printing Technologies We Used </h2>
            <p class="text-start">At ARC 3D, we are able to utilize a variety of successful 3D printing technologies that can be adapted for different projects that we undertake. Each of these has a specific function that helps us to achieve the exact end result that we need.</p>
            <p class="text-start"><strong>We work with:</strong></p>
        </div>
        <div class="tech_wrapper">
            <div class="tech_slider">
                    <div class="tech_slide">
                        <a href="#printing_sla-stereolithography">
                            <div class="tech_icon">
                                <img src="{{ asset('public/admin/technologies_image/SLA_2.webp') }}" alt="SLA" class="img-fluid" loading="lazy">
                            </div>
                            <div class="tech_des">
                                <div class="tech_left">
                                    <h3 class="head_2">SLA – Stereolithography</h3>
                                    <p>SLA is one of the most precise and well-established 3D printing technologies. It uses a UV laser to solidify liquid resin layer by layer, producing highly detailed parts with smooth, clean surfaces and excellent accuracy.</p>
                                </div>
                                <div class="tech_right">
                                    <img src="{{ asset('public/front/images/tech_arr.svg')}}" alt="" class="arrow_2" loading="lazy">
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="tech_slide">
                        <a href="#printing_fdm-fused-deposition-modeling">
                            <div class="tech_icon">
                                <img src="{{ asset('public/admin/technologies_image/FDM_1.webp') }}" alt="FDM" class="img-fluid" loading="lazy">
                            </div>
                            <div class="tech_des">
                                <div class="tech_left">
                                    <h3 class="head_2">FDM – Fused Deposition Modeling</h3>
                                    <p>FDM is one of the most commonly used 3D printing methods. It builds parts by melting and depositing thermoplastic filament layer by layer, creating strong, durable components that are ideal for both prototypes and functional applications.</p>
                                </div>
                                <div class="tech_right">
                                    <img src="{{ asset('public/front/images/tech_arr.svg')}}" alt="" class="arrow_2" loading="lazy">
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="tech_slide">
                        <a href="#printing_sls-selective-laser-sintering">
                            <div class="tech_icon">
                                <img src="{{ asset('public/admin/technologies_image/SLS_2.webp')}}" alt="SLS" class="img-fluid" loading="lazy">
                            </div>
                            <div class="tech_des">
                                <div class="tech_left">
                                    <h3 class="head_2">SLS – Selective Laser Sintering</h3>
                                    <p>SLS uses a powerful laser to fuse powdered material, typically nylon, into solid parts. Since it doesn’t require support structures, it allows highly complex shapes and even moving components to be printed in one piece.</p>
                                </div>
                                <div class="tech_right">
                                    <img src="{{ asset('public/front/images/tech_arr.svg')}}" alt="" class="arrow_2" loading="lazy">
                                </div>
                            </div>
                        </a>
                    </div>
            </div>
        </div>
    </div>
</section>

<section class="mt-100">
    <div class="container">
            <div class="col-lg-12">
                <h2 class="title_48 blue_txt ">
                   On-Demand 3D Printing Services in Dubai, UAE 
                </h2>
                <p>ARC 3D delivers on-demand 3D printing solutions in the UAE, including Abu Dhabi, Dubai, and the surrounding regions. Our team, with experience in the industry for a number of years, appreciates the speed required in a professional environment, where precision, time, and presentation are all relevant.</p>

                <p>We collaborate with our clients to ensure that we understand the project before production is done. Whether it is a prototype or a complex model that is required, our system is structured and controlled to ensure that quality results are achieved in 3D printing.</p>
            </div>
            
        </div>
</section>


<section class="mt-100">
    <div class="container">
        <h2 class="title_48 blue_txt">Our Core 3D Printing Services </h2>
        
        <div class="expect_wrapper">
            <div class="expect_slider core-services-slider">
               
                    <div>
                        <div class="expect_slide core-service-slide">
                            <h3 class="title_24">Rapid Prototyping:</h3>
                            <p>Bring product ideas to life quickly with accurate prototypes that allow testing, review, and refinement before final production.</p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide core-service-slide">
                            <h3 class="title_24">Low-Volume Parts Production:</h3>
                            <p>Produce small batches of parts without the need for molds, keeping costs manageable while maintaining flexibility in design.</p>
                        </div>
                    </div>
                     <div>
                        <div class="expect_slide core-service-slide">
                            <h3 class="title_24">Scale Models:</h3>
                            <p> Create detailed architectural and conceptual models with clean finishes and clear proportions for presentations and approvals.</p>
                        </div>
                    </div>
                     <div>
                        <div class="expect_slide core-service-slide">
                            <h3 class="title_24">Branding, Promotional Items & Props:</h3>
                            <p>Custom 3D printed elements designed for exhibitions, events, and brand displays that stand out visually.</p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide core-service-slide">
                            <h3 class="title_24">Trophies & Corporate Gifts:</h3>
                            <p>Unique, customized trophies and gifts produced with care, suitable for corporate recognition and special occasions.</p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide core-service-slide">
                            <h3 class="title_24">Arts & Sculptures:</h3>
                            <p>Support creative projects with custom forms and shapes that traditional fabrication methods often limit.</p>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</section>

<section class="mt-100">
    <div class="container">
            <div class="col-lg-12">
                <h2 class="title_48 blue_txt">
                    Custom 3D Printing Solutions 
                </h2>
                <p>At ARC 3D, all projects go through a systematic process for completion. After getting hold of a 3D model or project, our team checks its appropriateness for the printing phase. The file is then processed by using high-end software to ensure that the output contains the right amount of strength, details, and finish.</p>
                
                <p>Printing is done through proper use of technology based on the project target. After the production process, the parts are subjected to cleaning, finishing, where applicable, followed by the conduct of thorough quality checks to evaluate accuracy. The produced output is therefore ready for use, presentation, or further processing.</p>
            </div>
            
        </div>
</section>

<section class="mt-100">
   
        <div class="container">
            <div class="col-lg-12">
                <h2 class="title_48 blue_txt">
                    Why Choose Arc 3D? 
                </h2>
                <p>At ARC 3D, we provide a comprehensive and trustworthy 3D printing service with various technologies and materials for the UAE market. It is not only our business to print, but to guide clients toward the most suitable solution for their project.</p>
                <p>Our team is actively collaborating with clients from the onset to completion, and this is accomplished while keeping everything transparent, communicating openly, and having realistic project timelines. Quality control is also carried out at each stage to ensure a final output that is not compromised on, and this is why a high number of clients have continued to work with ARC 3D for their projects.</p>
                
            </div>
            
        </div>
   
</section>

<section class="mt-100">
    <div class="container">
        <h2 class="title_48 blue_txt">Our 3D Printing Process, From Concept to Reality </h2>
        
        <div class="expect_wrapper">
            <div class="expect_slider">
               
                    <div>
                        <div class="expect_slide process-slides">
                            <p class="process-count">1</p>
                            <h3 class="title_24">Share Your Project</h3>
                            <p> Tell us about your requirements, including size, material preference, quantity, and intended use.</p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide process-slides">
                             <p class="process-count">2</p>
                            <h3 class="title_24">Upload Your Design</h3>
                            <p> Share your 3D file or project brief. If needed, our team can assist with design preparation.</p>
                        </div>
                    </div>
                     <div>
                        <div class="expect_slide process-slides">
                             <p class="process-count">3</p>
                            <h3 class="title_24">Receive Your Quote</h3>
                            <p> We review your project and provide a clear quotation with pricing and timelines.</p>
                        </div>
                    </div>
                     <div>
                        <div class="expect_slide process-slides">
                             <p class="process-count">4</p>
                            <h3 class="title_24">Printing & Delivery</h3>
                            <p> Once approved, production begins, followed by inspection and delivery of the final output.</p>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</section>


@foreach ($printings as $printing)
    <section class="mt-100" id="printing_{{ $printing->url }}">
        <div class="container-fluid service_wrapper">
            <div class="container">
                <h2 class="title_48 blue_txt">{{ $printing->title }}</h2>
                {!! $printing->description !!}

                <div class="row mt-50 align-items-center">
                    @if($loop->iteration % 2 == 1) 
                        {{-- Image Left --}}
                       
                        <div class="col-lg-6 order-1 order-lg-1">
                            <div class="row">
                                <div class="col-lg-4">
                                    <span class="yellow_pill">Materials Used</span>
                                    {!! $printing->printing_material_desc !!}
                                </div>
                                <div class="col-lg-8 bl">
                                    <span class="yellow_pill">What This Technology Offers</span>
                                    {!! $printing->printing_technology_desc !!}
                                </div> 
                                <div class="col-lg-12 mt-md-5">
                                    <span class="yellow_pill">Benefits to Businesses</span>
                                    {!! $printing->printing_btob_desc !!}
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-6 order-2 order-lg-2 mb-3 mb-md-0">
                            <img src="{{ asset('public/admin/printing_image/' . $printing->image) }}" alt="3-d" class="img-fluid br-10">
                        </div>
                    @else
                        {{-- Image Right --}}
                       
                        <div class="col-lg-6 order-2 order-lg-2">
                            <div class="row">
                                <div class="col-lg-4">
                                    <span class="yellow_pill">Materials Used</span>
                                    {!! $printing->printing_material_desc !!}
                                </div>
                                <div class="col-lg-8 bl">
                                    <span class="yellow_pill">What This Technology Offers</span>
                                    {!! $printing->printing_technology_desc !!}
                                </div> 
                                <div class="col-lg-12 mt-md-5">
                                    <span class="yellow_pill">Benefits to Businesses</span>
                                    {!! $printing->printing_btob_desc !!}
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-6 order-1 order-lg-1 mb-3 mb-md-0">
                            <img src="{{ asset('public/admin/printing_image/' .  $printing->image) }}" alt="3-d" class="img-fluid br-10">
                        </div>
                    @endif

                    <div class="col-lg-12 order-3 mt-50">
                        <span class="yellow_pill">Applications</span>
                        @php
                            $AppIds = json_decode($printing->industires);
                            $industries = Industries::where('status', 'Active')->whereIn('id' ,$AppIds)->get();
                        @endphp 
                        <div class="serv_app_wrapper">
                            <div class="serv_app_slider_multi">
                                @foreach ($industries as $industry) 
                                    <div>
                                        <div class="inds_slide">
                                            <div class="inds_top">
                                                <div class="plus_icon">
                                                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5.028 10.64V6.464H0.9V4.736H5.028V0.56H6.852V4.736H10.98V6.464H6.852V10.64H5.028Z"
                                                            fill="#111" />
                                                    </svg>
                                                </div>
                                                <img src="{{ asset('public/admin/industries_image/' . $industry->image)}}" alt="" class="img-fluid br-10">
                                            </div>
                                            <h3 class="slide_title">{{ $industry->title }}</h3>
                                            <div class="inds_backslide">
                                                <div class="inds_top">
                                                    <div class="plus_icon">
                                                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5.028 10.64V6.464H0.9V4.736H5.028V0.56H6.852V4.736H10.98V6.464H6.852V10.64H5.028Z"
                                                                fill="#111" />
                                                        </svg>
                                                    </div> 
                                                </div>
                                                {!! $industry->description !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endforeach

 
<section class="mt-100">
    <div class="container">
        <div class="serv_cta row br-10">
            <div class="col-lg-3">
                <h2 class="title_48 yellow_txt mb-0">Why Businesses Trust ARC 3D</h2>
            </div>
            <div class="col-lg-9 serv_cta_ctnt">
                <div class="">
                    <ul>
                        <li>Technology Choice: We select the right process (SLA, FDM, SLS) for your specific needs.</li>
                        <li>End-to-End Solutions: From design, material selection, and printing to finishing and
                            delivery.
                        </li>
                        <li>Multi-Industry Expertise: Serving architecture, defense, oil & gas, aerospace, medical,
                            jewelry,
                            consumer goods.</li>
                        <li>Proven Business Impact: Reduce development time, lower costs, improve presentations, and
                            accelerate approvals.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact mt-50">

    <div class="container">

        <div class="contact_head mt-5">

            <div class="col-lg-10">

                <h2 class="title_62">Have a 3D printing project in mind?<br>Let's transform your idea into a high-quality physical model.</h2>

            </div>

           

                <div class="ct_arrow w-auto mt-3 mt-lg-0">

                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-product="{{ $service->title }}" class="btn_0">Get a Quote <svg width="12" height="11" viewBox="0 0 12 11" fill="none"

                            xmlns="http://www.w3.org/2000/svg">

                            <path d="M1 10.5L11 0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round">

                            </path>

                            <path d="M2.11108 0.5H11V8.5" stroke="white" stroke-linecap="round" stroke-linejoin="round">

                            </path>

                        </svg>
                    </a>
                </div>
            
        </div>
    </div>
</section>

<section class="mt-100">
    <div class="container">
        <h2 class="title_48 blue_txt ">FAQs: 3D Printing Services  </h2>
            <div class="row">
                <div class="col-lg-12">
                    <div id="accordionExample">
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse0"
                                    aria-expanded="true"
                                    aria-controls="collapse0">
                                    What is additive manufacturing and how does 3D printing work?
                                </h3>
                                <div id="collapse0" 
                                    class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div>
                                       Additive manufacturing, also known as 3D printing, is a process where an object is created layer by layer from a digital design. Instead of cutting or shaping material, the printer builds the model gradually, allowing complex forms, fine details, and accurate dimensions. At ARC 3D, this method helps us turn digital concepts into precise physical models efficiently.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse1"
                                    aria-expanded="false"
                                    aria-controls="collapse1">
                                   Which industries in the UAE use 3D printing services?
                                </h3>
                                <div id="collapse1" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        3D printing is widely used across architecture, real estate, product design, engineering, education, retail, and manufacturing. ARC 3D supports all these industries by producing architectural scale models, display models, prototypes, and functional components that help visualize, test, and present ideas more clearly.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse2"
                                    aria-expanded="false"
                                    aria-controls="collapse2">
                                  What affects the cost of 3D printing services in the UAE?
                                </h3>
                                <div id="collapse2" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        The cost depends on factors such as the size of the model, level of detail, type of material used, finishing requirements, and the number of pieces needed. At ARC 3D, we always aim to provide the most practical and cost-effective solution based on your project goals.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse3"
                                    aria-expanded="false"
                                    aria-controls="collapse3">
                                    Can functional parts be 3D printed?
                                </h3>
                                <div id="collapse3" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                         Yes. Many functional parts can be 3D printed depending on the purpose and material. Arc3D produces parts for testing, fitting, demonstrations, and light-use applications, helping clients evaluate designs before moving to full production.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse4"
                                    aria-expanded="false"
                                    aria-controls="collapse4">
                                    Do you offer rapid prototyping?
                                </h3>
                                <div id="collapse4" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        Yes. Rapid prototyping is one of ARC 3D’s key services. It allows designers, architects, and businesses to quickly turn ideas into physical models for review, testing, and client presentations, saving time and reducing design risks.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse5"
                                    aria-expanded="false"
                                    aria-controls="collapse5">
                                   How long does a 3D printing project take?
                                </h3>
                                <div id="collapse5" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                       The time depends on the size, complexity, and finishing required. Simple models can be completed quickly, while larger or more detailed projects take longer. ARC 3D focuses on delivering each project efficiently without compromising accuracy or quality.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse6"
                                    aria-expanded="false"
                                    aria-controls="collapse6">
                                    Why choose Arc 3D for 3D printing in Dubai?
                                </h3>
                                <div id="collapse6" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                         ARC 3D combines skilled design understanding, professional printing systems, and consistent quality control. We don’t just print, we make sure every model serves its purpose, whether it’s for presentation, testing, or real-world use.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse7"
                                    aria-expanded="false"
                                    aria-controls="collapse7">
                                    What makes ARC 3D a reliable choice for 3D printing in Dubai, UAE?
                                </h3>
                                <div id="collapse7" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                       ARC 3D combines advanced 3D printing technology with skilled design and production teams to deliver accurate, high-quality results. With a streamlined in-house process and strong focus on detail, we ensure every project is completed on time and to professional standards.
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                </div>
            </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script>
    //   gsap
 gsap.registerPlugin(ScrollTrigger);

// Split text but keep HTML tags intact
function splitTextKeepHTML(element) {
  element.childNodes.forEach(node => {
    if (node.nodeType === Node.TEXT_NODE) {
      let words = node.textContent.split(/(\s+)/); // split including spaces
      words.forEach(word => {
        let span = document.createElement("span");
        span.style.display = "inline-block";
        span.style.whiteSpace = "pre"; // preserve spacing
        span.textContent = word;
        element.insertBefore(span, node);
      });
      element.removeChild(node);
    } else if (node.nodeType === Node.ELEMENT_NODE) {
      splitTextKeepHTML(node); // recursive for <b>, <i>, etc
    }
  });
}

// Apply splitting
document.querySelectorAll(".gsap_text").forEach(el => {
  splitTextKeepHTML(el);
});

// Master timeline (scroll-synced)
let tl = gsap.timeline({
  scrollTrigger: {
    trigger: ".gsap_wrapper",
    start: "top 80%",
    end: "bottom 20%",
    scrub: true, // scroll synced
    markers: false
  }
});

// Animate each line sequentially
document.querySelectorAll(".gsap_text").forEach((el, i) => {
  // Set initial state for spans
  gsap.set(el.querySelectorAll("span"), { opacity: 0.1 });

  // Add animation to timeline
  tl.to(
    el.querySelectorAll("span"),
    {
      opacity: 1,
      stagger: 0.04, // stagger within the line
      duration: 1, // duration for the line
      ease: "power3.out"
    },
    i * 1.2 // increased delay to ensure previous line completes
  );
});
</script>

{{-- Fix: Slick cloned slides ke duplicate H3/H4 ko <p> banao (original H3/H4 as it is rahenge) --}}
<script>
(function () {
    function fixClonedHeadings() {
        document.querySelectorAll('.slick-cloned h3, .slick-cloned h4').forEach(function (el) {
            var p = document.createElement('p');
            p.className = el.className;
            p.innerHTML = el.innerHTML;
            el.parentNode.replaceChild(p, el);
        });
    }

    // Slick init hone ke baad chalao (jQuery pe depend nahi karta)
    window.addEventListener('load', function () {
        fixClonedHeadings();
        setTimeout(fixClonedHeadings, 500);
        setTimeout(fixClonedHeadings, 1500);
    });

    // Resize par slick re-init hota hai, to dobara chalao
    var resizeTimer;
    window.addEventListener('resize', function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(fixClonedHeadings, 600);
    });
})();
</script>
@include('layouts.enquiry')
@include('layouts.frontfooter')
