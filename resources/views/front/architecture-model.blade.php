@include('layouts.frontheader', [
    'og_image' => asset('public/admin/its_worth_image/' . $service->its_worth_image)
])

<style>
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
    
    .comp_bus_child:hover
    {
      height: 560px;
    }
    
   @media only screen and (max-width: 1537px)
    {
        .comp_bus_child:hover {
        height: 530px;
        }
    }

    
</style>

<section class="service_banner banner">
    <div class="container">
        <h1 class="title_48"><span style="color:#005762;">{{ $service->title }}</span></h1>
        {!! $service->description !!}
        <a  href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn_0 mt-50" data-product="{{ $service->title }}">Enquire Now <svg class
        ="ms-2"width="12" height="11" viewBox="0 0 12 11"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 10.5L11 0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M2.11108 0.5H11V8.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg> 
        </a> 
    </div> 
</section>

<!--*-->
<section class="core mt-100 ">
    <div class="container">        
        <div class="tech_head">
           <h2 class="title_48 text-start" style="color:#005762;">Architectural Model Making Services in Dubai & Across UAE </h2>
            <p class="text-start">ARC 3D is a leading architectural model-making company in Dubai, UAE, offering premium 3D architectural models, custom scale models, and physical prototypes for architects, developers, consultants, and government authorities. We help transform complex drawings, CAD files, and 3D designs into precise, presentation-ready physical models that communicate ideas clearly and confidently.</p>
            <p class="text-start">From conceptual massing models to detailed interior layouts and masterplan developments, every model is carefully built using advanced 3D printing, CNC cutting, laser technology, and hand-finishing techniques. Our focus is not just on appearance—but on accuracy, proportion, and build quality, so your project can be understood, approved, and marketed effectively.</p>
            <p class="text-start">Whether it’s a residential tower, commercial complex, or mixed-use development, ARC 3D creates architectural scale models and 3D visual displays that reflect your design intent with realism and precision. </p>
        </div>
        <div class="core_wrapper">
            <div class="comp_bus_child">
                    <div class="comp_bus_front">
                        <div class="comp_bus_fronts">
                            <span>
                                <img class="img-fluid" src="{{ asset('public/front/images/Architectural-Scale-Models.png')}}" alt="Architectural Scale Model" loading="lazy">
                            </span>
                            <h3 class="comp_bus_num">Architectural Scale Models</h3>
                        </div>
                    </div>
                    <div class="comp_bus_back">
                        <span><img class="img-fluid" src="{{ asset('public/front/images/Architectural-Scale-Models.png')}}" alt="Architectural Scale Model" loading="lazy"></span>
                        <div class="comp_bus_back_bt">
                            <h3 class="comp_bus_num">Architectural Scale Models</h3>
                           <p class="comp_bus_ext">High-accuracy scale models intended for use in real estate sales, approvals, or investor meetings. These models illustrate the form of the buildings and the context.</p>
                        </div>
                    </div>
            </div> 
            <div class="comp_bus_child">
                    <div class="comp_bus_front">
                        <div class="comp_bus_fronts">
                            <span>
                                <img class="img-fluid" src="{{ asset('public/front/images/3D-Scale-Models.png')}}" alt="3D Scale Models" loading="lazy">
                            </span>
                            <h3 class="comp_bus_num">3D Scale Models</h3>
                        </div>
                    </div>
                    <div class="comp_bus_back">
                        <span><img class="img-fluid" src="{{ asset('public/front/images/3D-Scale-Models.png')}}" alt="3D Scale Models" loading="lazy"></span>
                        <div class="comp_bus_back_bt">
                            <h3 class="comp_bus_num">3D Scale Models</h3>
                            <p class="comp_bus_ext">Realistic 3D architectural models created through current advances in 3D printing and technology for effective graphical representation during exhibitions, marketing, and reviews.</p>
                        </div>
                    </div>
            </div> 
            <div class="comp_bus_child">
                    <div class="comp_bus_front">
                        <div class="comp_bus_fronts">
                            <span>
                                <img class="img-fluid" src="{{ asset('public/front/images/Masterplan-Models.png')}}" alt="Masterplan Models" loading="lazy">
                            </span>
                            <h3 class="comp_bus_num">Masterplan Models</h3>
                        </div>
                    </div>
                    <div class="comp_bus_back">
                        <span><img class="img-fluid" src="{{ asset('public/front/images/Masterplan-Models.png')}}" alt="Masterplan Models" loading="lazy"></span>
                        <div class="comp_bus_back_bt">
                            <h3 class="comp_bus_num">Masterplan Models</h3>
                            <p class="comp_bus_ext">Detailed scale models that depict zoning, roads, landscaping, and infrastructure. Large-format scale models are suitable for urban planners, governments, or real estate developers. </p>
                        </div>
                    </div>
            </div> 
            <div class="comp_bus_child">
                    <div class="comp_bus_front">
                        <div class="comp_bus_fronts">
                            <span>
                                <img class="img-fluid" src="{{ asset('public/front/images/Detailed-Interior-Models.png')}}" alt="Detailed Interior Models" loading="lazy">
                            </span>
                            <h3 class="comp_bus_num">Detailed Interior Models</h3>
                        </div>
                    </div>
                    <div class="comp_bus_back">
                        <span><img class="img-fluid" src="{{ asset('public/front/images/Detailed-Interior-Models.png')}}" alt="Detailed Interior Models" loading="lazy"></span>
                        <div class="comp_bus_back_bt">
                            <h3 class="comp_bus_num">Detailed Interior Models</h3>
                            <p class="comp_bus_ext">High detail interior three-dimensional models showing room layouts, finishes, lighting, and furniture arrangements for the hospitality industry, retail, and residential markets.</p>
                        </div>
                    </div>
            </div> 
            <div class="comp_bus_child">
                    <div class="comp_bus_front">
                        <div class="comp_bus_fronts">
                            <span>
                                <img class="img-fluid" src="{{ asset('public/front/images/Industrial-Technical-Models.png')}}" alt="Industrial Technical Models" loading="lazy">
                            </span>
                            <h3 class="comp_bus_num">Industrial & Technical Models</h3>
                        </div>
                    </div>
                    <div class="comp_bus_back">
                        <span><img class="img-fluid" src="{{ asset('public/front/images/Industrial-Technical-Models.png')}}" alt="Industrial Technical Models" loading="lazy"></span>
                        <div class="comp_bus_back_bt">
                            <h3 class="comp_bus_num">Industrial & Technical Models</h3>
                            <p class="comp_bus_ext">Precisely built models for factory layouts, machine layouts, Oil & Gas plants, and other engineering projects aimed at presentations, training, and approval.</p>
                        </div>
                    </div>
            </div> 
            
        </div>
        <div class="mob_core_wrapper">
            <div class="mob_core_slider">
                    <div>
                        <div class="comp_bus_child">
                            <div class="comp_bus_back">
                                <span><img class="img-fluid" src="{{ asset('public/front/images/Architectural-Scale-Models.png')}}" alt="Architectural Scale Models" loading="lazy"></span>
                                <div class="comp_bus_back_bt">
                                    <h4 class="comp_bus_num">Architectural Scale Models</h4>
                                    <p class="comp_bus_ext">High-accuracy scale models intended for use in real estate sales, approvals, or investor meetings. These models illustrate the form of the buildings and the context.</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                     <div>
                        <div class="comp_bus_child">
                            <div class="comp_bus_back">
                                <span><img class="img-fluid" src="{{ asset('public/front/images/3D-Scale-Models.png')}}" alt="3D-Scale Models" loading="lazy"></span>
                                <div class="comp_bus_back_bt">
                                    <h4 class="comp_bus_num">3D Scale Models</h4>
                                    <p class="comp_bus_ext">Realistic 3D architectural models created through current advances in 3D printing and technology for effective graphical representation during exhibitions, marketing, and reviews.</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                     <div>
                        <div class="comp_bus_child">
                            <div class="comp_bus_back">
                                <span><img class="img-fluid" src="{{ asset('public/front/images/Masterplan-Models.png')}}" alt="Masterplan Models" loading="lazy"></span>
                                <div class="comp_bus_back_bt">
                                    <h4 class="comp_bus_num">Masterplan Models</h4>
                                    <p class="comp_bus_ext">Detailed scale models that depict zoning, roads, landscaping, and infrastructure. Large-format scale models are suitable for urban planners, governments, or real estate developers. </p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                     <div>
                        <div class="comp_bus_child">
                            <div class="comp_bus_back">
                                <span><img class="img-fluid" src="{{ asset('public/front/images/Detailed-Interior-Models.png')}}" alt="Detailed Interior Models" loading="lazy"></span>
                                <div class="comp_bus_back_bt">
                                    <h4 class="comp_bus_num">Detailed Interior Models</h4>
                                    <p class="comp_bus_ext">High detail interior three-dimensional models showing room layouts, finishes, lighting, and furniture arrangements for the hospitality industry, retail, and residential markets.</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                     <div>
                        <div class="comp_bus_child">
                            <div class="comp_bus_back">
                                <span><img class="img-fluid" src="{{ asset('public/front/images/Industrial-Technical-Models.png')}}" alt="Industrial Technical Models" loading="lazy"></span>
                                <div class="comp_bus_back_bt">
                                    <h4 class="comp_bus_num">Industrial & Technical Models</h4>
                                    <p class="comp_bus_ext">Precisely built models for factory layouts, machine layouts, Oil & Gas plants, and other engineering projects aimed at presentations, training, and approval.</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    
            </div>
        </div>
    </div>
</section> 
<!--* -->

<section class="mt-100 service_how">
    <div class="container">
        @if (request()->path() === 'architectural-model-making')
        <h2 class="how_head"><span>How Architectural Model Making Works</span></h2>
        @endif
        {!! $service->howitworks_short_desc !!}   
        @php
            $countOfHowItWorks = $howitsworks->count(); // original collection/array count
            $howItWorksClass = 'how_3'; // default

            if ($countOfHowItWorks == 4) {
                $howItWorksClass = 'how_4';
            } elseif ($countOfHowItWorks == 5) {
                $howItWorksClass = 'how_5';
            }
        @endphp
  
        <div class="{{ $howItWorksClass }}">
            @foreach ($howitsworks as $howitwork)
                <div class="how_3_1">
                    <div class="how_wrapper">
                        <img src="{{ asset('public/admin/howitworks/' . $howitwork->image)}}" alt="{{ $howitwork->alt_tag }}" class="img-fluid br-10">
                        <div class="how_ctnt">
                            <h3 class="title_24 yellow_txt">{{ $howitwork->name }}</h3>
                            {!! preg_replace('/<p(.*?)>/', '<p$1 class="text-white mb-0">', $howitwork->description) !!}
                            
                        </div>
                    </div>
                </div> 
            @endforeach
        </div>
       @php
            $desc = trim(strip_tags($service->howitworks_desc));
        @endphp
        
        @if(!empty($desc))
            {!! preg_replace('/<p(.*?)>/', '<p$1 class="para_36 mb-0">', $service->howitworks_desc) !!}
        @endif

   </div>
</section>

<section class="mt-100">
    <div class="container-fluid service_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="title_48 blue_txt">Benefits of Architectural Model Making for Modern Projects</h2>
                    {!! $service->its_worth_description !!}
                   
                     
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('public/admin/its_worth_image/' . $service->its_worth_image)}}" alt="why" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="inds mt-100">
    <div class="container">
        
            <h2 class="title_48 blue_txt">Applications of Architectural Model Making Across Industries  </h2>
       

        <div class="inds_slider_wrapper">
            <div class="inds_slider">
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
                                <img src="{{ asset('public/admin/industries_image/Architecture.svg')}}" alt="" class="img-fluid" loading="lazy">
                            </div>
                            <h3 class="slide_title">Real Estate & Property Sales</h3>

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
                                <p>Architectural scale models help buyers understand layout, scale, and design, boosting confidence and speeding up sales.</p>
                            </div>

                        </div>
                    </div>
                    
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
                                <img src="{{ asset('public/admin/industries_image/Defense.svg')}}" alt="Defense" class="img-fluid" loading="lazy">
                            </div>
                            <h3 class="slide_title">Urban Planning & Government Projects</h3>

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
                                <p>Masterplan models make complex developments easy to review for zoning, infrastructure, and approvals.</p>
                            </div>

                        </div>
                    </div>
                    
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
                                <img src="{{ asset('public/admin/industries_image/Healthcare.svg')}}" alt="Healthcare" class="img-fluid" loading="lazy">
                            </div>
                            <h3 class="slide_title">Hospitality, Leisure & Tourism</h3>

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
                                <p>Hotels, resorts, and theme parks use physical models to show landscaping, buildings, and guest flow for investors and exhibitions.</p>
                            </div>

                        </div>
                    </div>
                    
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
                                <img src="{{ asset('public/admin/industries_image/Industrial-Equipment-Manufacturing.svg')}}" alt="Industrial-Equipment-Manufacturing" class="img-fluid" loading="lazy">
                            </div>
                            <h3 class="slide_title">Engineering & Industrial Projects</h3>

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
                                <p>Industrial models display factory layouts, machinery, and workflows for training, safety planning, and presentations.</p>
                            </div>

                        </div>
                    </div>
                    
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
                                <img src="{{ asset('public/admin/industries_image/Museums-and-Heritage.svg')}}" alt="Museums-and-Heritage" class="img-fluid" loading="lazy">
                            </div>
                            <h3 class="slide_title">Education, Museums & Exhibitions</h3>

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
                                <p>Universities, museums, and public exhibitions use <strong>3D architectural models</strong> to explain ideas and tell visual stories.</p>
                            </div>

                        </div>
                    </div>
                    
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
                                <img src="{{ asset('public/admin/industries_image/Virtual-Merchandising.svg')}}" alt="Virtual Merchandising" class="img-fluid" loading="lazy">
                            </div>
                            <h3 class="slide_title">Client Presentations & Approvals</h3>

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
                                <p>From concept to final build, physical models help decision-makers clearly understand the project.</p>
                            </div>

                        </div>
                    </div>
            </div> 
        </div>
        
    </div>
</section>

<section class="mt-100">
    <div class="container">
        <div class="container">
            <div class="col-lg-12">
                <h2 class="title_48 mb-3 blue_txt ">
                    ARC 3D: Professional Architectural Model Makers in Dubai, UAE 
                </h2>
                <p>ARC 3D is an experienced architectural model-making company in the UAE. We specialize in creating architectural models from drawings, Revit files, and designs into physical models that are easy to understand, scale accurate, and stunning in details.</p>

                <p>By merging the skills of 3D printing, CNC machining, laser cutting, and professional finishing, we have created architectural models to work with sales, approvals, exhibitions, and presentations to shareholders in the UAE, particularly in Dubai.</p>
            </div>
            
        </div>
    </div>
</section>


<section class="mt-100">
    <div class="container">
        <h2 class="title_48 blue_txt">Our Architectural Model Making Process</h2>
        
        <div class="expect_wrapper">
            <div class="expect_slider">
               
                    <div>
                        <div class="expect_slide">
                            <p class="process-count">1</p>
                            <h3 class="title_24">Consultation & Concept</h3>
                            <p>We review your drawings, 3D files, scale requirements, and presentation goals.</p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide">
                             <p class="process-count">2</p>
                            <h3 class="title_24">Digital Blueprinting</h3>
                            <p>Our team prepares a <strong>3D architectural model</strong> for client review before production begins.</p>
                        </div>
                    </div>
                     <div>
                        <div class="expect_slide">
                             <p class="process-count">3</p>
                            <h3 class="title_24">Model Fabrication</h3>
                            <p>We use <strong>3D printing, CNC cutting, and hand-crafting</strong> to build the model with accurate details.</p>
                        </div>
                    </div>
                     <div>
                        <div class="expect_slide">
                             <p class="process-count">4</p>
                            <h3 class="title_24">Finishing & Delivery</h3>
                            <p>Each model is professionally painted, inspected, packed, and delivered across Dubai and the UAE.</p>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</section>

<section class="mt-100">
    <div class="container">
        <h2 class="title_48 blue_txt ">Why ARC 3D is a Trusted Architectural Model Making Company in the UAE </h2>
        @if($service->title == 'Architectural Model Making')
            <p>ARC 3D is trusted by architects, developers, and design consultants because we focus on <strong>accuracy, quality, and consistency</strong>.
            </p>
        @endif
        <div class="expect_wrapper">
            <div class="expect_slider">
                @foreach ($exceeds_expectations as $exceeds_expectation)
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">{{ $exceeds_expectation->name }}</h3>
                            {!! $exceeds_expectation->description !!}
                        </div>
                    </div>
                    
                @endforeach
                
            </div>
        </div>
    </div>
</section>

<section class="contact mt-50">

    <div class="container">

        <div class="contact_head mt-5">

            <div class="col-lg-10">

                <h2 class="title_62">Ready to build your architectural model?<br>Let's turn your concept into reality.</h2>

            </div>

            <div class="contact_btn">

                <div class="ct_arrow w-auto">

                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#staticBackdrop"  class="btn_0">Enquire Now <svg width="12" height="11" viewBox="0 0 12 11" fill="none"

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
    </div>
</section>

<section class="mt-100">
    <div class="container">
        <h2 class="title_48 mb-3 blue_txt ">FAQs: Architectural Model Making </h2>
            <div class="row">
                <div class="col-lg-12">
                    <div id="accordionExample">
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse0"
                                    aria-expanded="true"
                                    aria-controls="collapse0">
                                    How long does it usually take to complete an architectural model?
                                </h3>
                                <div id="collapse0" 
                                    class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div>
                                       The timeline depends on the complexity and scale of the model. Simple conceptual models may take a few days, while large masterplan or detailed interior models can take several weeks. At ARC 3D, we prioritize quality and precision while working efficiently to meet your deadlines.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse1"
                                    aria-expanded="false"
                                    aria-controls="collapse1">
                                   Can ARC 3D create custom architectural models based on client designs?
                                </h3>
                                <div id="collapse1" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        Absolutely. We work closely with clients to understand their design goals and translate their digital plans or sketches into accurate physical models. Our team offers collaborative support to ensure the final model aligns perfectly with your vision.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse2"
                                    aria-expanded="false"
                                    aria-controls="collapse2">
                                  What types of architectural models does ARC 3D specialize in?
                                </h3>
                                <div id="collapse2" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        We specialize in a wide range, including scale architectural models, masterplans, conceptual models, detailed interior models, and industrial models. Our expertise covers everything from early-stage design validation to presentation-ready models for marketing and approvals.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse3"
                                    aria-expanded="false"
                                    aria-controls="collapse3">
                                    Do you offer different scale options for models?
                                </h3>
                                <div id="collapse3" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                         Yes. Depending on project requirements, we offer various scale options to best represent the design details and context. We guide clients in choosing an appropriate scale that balances detail visibility with practical model size.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse4"
                                    aria-expanded="false"
                                    aria-controls="collapse4">
                                    Is 3D printing used in your architectural model making?
                                </h3>
                                <div id="collapse4" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                         Definitely. ARC 3D integrates cutting-edge 3D printing technology with traditional craftsmanship. This hybrid approach allows us to produce highly detailed, precise models with faster turnaround times and enhanced durability.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse5"
                                    aria-expanded="false"
                                    aria-controls="collapse5">
                                   Can architectural models be updated or modified after they are made?
                                </h3>
                                <div id="collapse5" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        In many cases, yes. We can make modifications or add new elements to existing models to reflect design changes or client feedback. It’s part of our commitment to providing flexible and client-centered service.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse6"
                                    aria-expanded="false"
                                    aria-controls="collapse6">
                                    Do you handle large-scale architectural model projects across the UAE?
                                </h3>
                                <div id="collapse6" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                         Yes, we have extensive experience delivering large-scale, complex models across Dubai, Abu Dhabi, and the wider UAE. Our logistics and packaging ensure safe delivery and installation wherever needed.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse7"
                                    aria-expanded="false"
                                    aria-controls="collapse7">
                                    What is the typical cost range for architectural model making?
                                </h3>
                                <div id="collapse7" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        Costs vary based on model size, detail level, materials, and complexity. After reviewing your project specifics, we provide transparent quotations tailored to your budget and needs, ensuring value without compromising quality.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse8"
                                    aria-expanded="false"
                                    aria-controls="collapse8">
                                   Why choose ARC 3D for architectural model making in the UAE?
                                </h3>
                                <div id="collapse8" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                         ARC 3D stands out for its combination of expert craftsmanship, advanced 3D printing technology, and deep understanding of architectural needs. We focus on delivering accurate, visually compelling models on time and within budget, backed by responsive client support.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse9"
                                    aria-expanded="false"
                                    aria-controls="collapse9">
                                    How can I request a quote or start a project with ARC 3D?
                                </h3>
                                <div id="collapse9" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                         Simply reach out via our website’s contact form or call our team. Share your project details and any design files you have. Our experts will guide you through the process, from initial consultation to final delivery.
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
    </div>
</section>

@include('layouts.enquiry')
@include('layouts.frontfooter')
