@php
    $firstHowItWork = null;
    if(isset($howitsworks)){
        $firstHowItWork = $howitsworks->first();
    }
@endphp

@include('layouts.frontheader', [
    'og_image' => $firstHowItWork 
        ? url('public/admin/howitworks/' . $firstHowItWork->image) 
        : ''
])

<section class="service_banner banner">
    <div class="container">
        <h1 class="title_48"><span style="color:#005762;">{{ $service->title }}</span></h1>
        {!! $service->description !!}
        <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn_0 mt-50" data-product="{{ $service->title }}">Enquire Now <svg width="12" height="11" viewBox="0 0 12 11"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 10.5L11 0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M2.11108 0.5H11V8.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg> 
        </a> 
    </div> 
</section>
@if(Request::is('large-scale-model-making'))
<section class="mt-100">
    <div class="container">
        <h2 class="title_48 blue_txt">High Quality 3D Scale Model Making Services in UAE </h2>
       <p>ARC 3D delivers 3D Model Making Services that are built around project goals — approvals, investor presentations, exhibitions, or marketing. As a reliable model-making company and Scale Model Making Company in the UAE, we focus on detail, clarity, and durability, so your model performs well in real settings (boardrooms, exhibition floors, showrooms, and public events).</p>
       <p>If you’re looking for Scale model makers in the UAE who can handle both the craft and the engineering logic behind large builds, ARC 3D is a safe partner. Our team works as professional scale model consultants, guiding you on scale selection, labeling, lighting, materials, and the right level of detail, so the model communicates clearly without overcomplicating the message.</p>
        <div class="expect_wrapper">
            <div class="expect_slider1">
                
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">Architectural Scale Models:</h3>
                            <p>ARC 3D creates high-precision architectural scale model-making solutions for villas, residential communities, commercial towers, and mixed-use developments. If your project requires villa-scale model making in the UAE, we deliver a model that highlights structure, layout, landscape, and finishes with strong realism, ideal for developer launches, investor meetings, and showroom displays. These models support the architecture visualization model needs by making the design feel tangible and easy to understand.</p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">Masterplan & Urban Models:</h3>
                            <p>Our masterplan models are designed for major developments, urban planning, and government presentations. They help stakeholders visualize phases, infrastructure, connectivity, and zoning at a glance. These models are widely used for real estate launches, approvals, and global events, especially when you need infrastructure architectural models that clearly show scale, planning intent, and future growth.</p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">Industrial & Engineering Model Making:</h3>
                           <p>ARC 3D specializes in engineering-scale model making for complex industrial environments. We produce architectural and engineering scale models for factories, process plants, and mechanical systems — including detailed oil & gas plant scale model builds for presentations, planning, safety communication, and exhibitions. If you’re searching for oil & gas plant scale model UAE solutions that look premium and still reflect technical detail correctly, this is one of our strongest areas.</p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">Infrastructure & Transport Models:</h3>
                            <p>We create infrastructure and transport scale models representing roads, bridges, rail networks, utilities, and major transport hubs. We also develop automotive scale models showcasing vehicle concepts, components, production layouts, and mobility systems. These models help visualize large scale connectivity, explain complex systems clearly, support planning and approvals, and communicate technical concepts effectively to both technical and non-technical stakeholders.</p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">Interior & Fit-Out Models:</h3>
                            <p>Interior and fit-out scale models showcase layouts, finishes, furniture placement, lighting, and spatial flow with clarity and precision. Ideal for commercial spaces, hospitality projects, and residential interiors, these models help clients and designers visualize material selections, circulation, and proportions before execution. They support design approvals, reduce revisions, and ensure interior concepts are communicated accurately to all stakeholders.</p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">Custom Models:</h3>
                            <p>For museums, exhibitions, developer showrooms, and corporate displays, ARC 3D delivers fully customized builds tailored to brand identity and presentation goals. From clean, minimal models to high-detail, story-driven displays, we produce models that are built to attract attention and hold it — especially in high-footfall environments.</p>
                        </div>
                    </div>
                    
                
                
            </div>
        </div>
    </div>
</section>
@endif

@if(Request::is('3d-scanning'))
<section class="mt-100">
    <div class="container">
        <h2 class="title_48 blue_txt">Reliable 3D Scanning Services for Industrial & Architectural Projects  </h2>
        <p>ARC 3D operates as a professional 3D scanning company supporting industrial and architectural teams across the UAE. We scan what exists on site —equipment, parts, buildings, or full environments, and convert it into accurate digital outputs you can use in real workflows. Our clients come to us when traditional measurement tools fall short: complex surfaces, tight tolerances, large sites, or assets that are difficult to access. Using modern 3D scanning technology and metrology-grade workflows, we deliver results that help teams move forward with fewer surprises. We work with a range of capture tools, including a 3D laser scanner and 3D dimensional scanner setups, chosen to suit the task. People often ask about the best 3d scanner; the reality is, the “best” depends on object size, surface type, required tolerance, and the final deliverable. Our job is to select the right approach and run it correctly, so you get dependable outcomes. ARC 3D is also frequently considered among experienced 3D scanning companies because we focus on what matters after scanning: usable data, clean outputs, and professional coordination.</p>
        <div class="expect_wrapper">
            <div class="expect_slider1">
                
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">Object Preparation for 3D Scanning:</h3>
                            <p>We begin by preparing your physical object for 3D scanning, ensuring clean surfaces, proper positioning, and stability. This step maximizes scan accuracy and guarantees reliable digital measurements for engineering and manufacturing applications.</p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">Advanced 3D Scanning Capture:</h3>
                            <p>Our experts use advanced 3D scanning technology to capture every surface detail. Multiple-angle scans create a high-resolution 3D mesh or point cloud for precise digital replication and engineering-ready models.</p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">High Precision 3D Scan Data Processing:</h3>
                           <p>Captured scans are processed, aligned, and merged using specialized software. The result is a highly accurate 3D model, ready for reverse engineering, CAD modeling, and quality inspection, ensuring reliable outcomes for industrial projects.</p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">Professional Reverse Engineering:</h3>
                            <p>Through reverse engineering services, the refined 3D mesh is converted into fully editable CAD models. These models allow for design modifications, dimensional verification, and a smooth transition to production or prototyping.</p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">CAD Model Optimization for 3D Printing:</h3>
                            <p>Final CAD models are optimized for 3D printing, enabling rapid prototyping and functional part manufacturing. This step transforms digital data into precise physical components with minimal lead time.</p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">Complete 3D Scanning to 3D Printing Workflow:</h3>
                            <p>Our experts provide a seamless end-to-end workflow, integrating 3D scanning, reverse engineering, and 3D printing for accurate, engineering grade results across engineering, automotive, aerospace, medical, architectural and product development.</p>
                        </div>
                    </div>
                    
                
                
            </div>
        </div>
    </div>
</section>
@endif

<section class="mt-100 service_how">
    <div class="container">
        @if (request()->path() === 'interactive-technology')
        <h2 class="how_head"><span>How 3D Technology Works: From Design to Production </span></h2>
        @endif
        @if (request()->path() === 'prototyping-services')
        <h2 class="how_head"><span>How Prototyping Services Work</span></h2>
        @endif
        @if (request()->path() === '3d-scanning')
        <h2 class="how_head"><span>How 3D Scanning Works From Capture to Model</span></h2>
        @endif
        @if (request()->path() === 'architectural-model-making')
        <h2 class="how_head"><span>How Architectural Model Making Works</span></h2>
        @endif
        @if (request()->path() === 'large-scale-model-making')
        <h2 class="how_head"><span>How Large-Scale Model Making Works</span></h2>
        @endif
        {!! $service->howitworks_short_desc !!}   
        @php
                $countOfHowItWorks = isset($howitsworks) ? $howitsworks->count() : 0; // original collection/array count
                $howItWorksClass = 'how_3'; // default
    
                if ($countOfHowItWorks == 4) {
                    $howItWorksClass = 'how_4';
                } elseif ($countOfHowItWorks == 5) {
                    $howItWorksClass = 'how_5';
                }
        @endphp
  
        <div class="{{ $howItWorksClass }}">
            @if(isset($howitsworks) && is_countable($howitsworks) && count($howitsworks) > 0)
                @foreach ($howitsworks as $howitwork)
                    <div class="how_3_1">
                        <div class="how_wrapper">
                            <img src="{{ asset('public/admin/howitworks/' . $howitwork->image)}}" alt="{{ $howitwork->alt_tag }}" class="img-fluid br-10">
                            <div class="how_ctnt">
                                <h4 class="title_24 yellow_txt">{{ $howitwork->name }}:</h4>
                                {!! preg_replace('/<p(.*?)>/', '<p$1 class="text-white mb-0">', $howitwork->description) !!}
                                
                            </div>
                        </div>
                    </div> 
                @endforeach
            @endif
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
                    <h3 class="title_48 blue_txt">
                        @if(Request::is('large-scale-model-making'))
                            Why It’s Worth Investing in Large-Scale Model Making
                        @elseif(Request::is('3d-scanning'))
                            Why It’s Worth Investing in 3D Scanning Services
                        @else
                            Why It’s Worth Investing
                        @endif
                    </h3>
                    {!! $service->its_worth_description !!}
                    
                     
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('public/admin/its_worth_image/' . $service->its_worth_image)}}" alt="why" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

@if(Request::is('3d-scanning'))
<section class="mt-100">
    <div class="container">
        <div class="container">
            <div class="col-lg-12">
                <h3 class="title_48 mb-3 blue_txt ">
                    Why Reverse Engineering Is a Strategic Advantage  
                </h3>
                <p>Reverse engineering bridges real, physical parts with today’s digital workflows by turning 3D scan data into accurate, production-ready CAD models. It’s used across industries to recreate legacy components, confirm as-built geometry, and improve existing designs—without depending on incomplete or outdated drawings. When you work from scan-based models that reflect the part as it truly exists, it becomes easier to refine performance, check fit, and move smoothly into 3D printing or manufacturing. The result is faster, more reliable part reproduction while protecting dimensional accuracy and overall design intent.</p>
            </div>
            
        </div>
    </div>
</section>
@endif

@if(Request::is('3d-scanning'))
<section class="mt-100">
    <div class="container">
        <div class="container">
            <div class="col-lg-12">
                <h2 class="title_48 mb-3 blue_txt ">
                    Trusted 3D Scanning & Reverse Engineering Company in Dubai, UAE
                </h2>
                <p>ARC 3D, an established 3D scanning and reverse engineering company, can provide reliable digital data for designs, inspection, manufacturing, and 3D printing. Often, attempting to capture fine detail in intricate geometry or vast asset sets, traditional measurement approaches can fall short, which may result in errors, reworks, and unwarranted project delays. </p>
                <p>Our 3D scanning service delivers accurate point cloud scanning, CAD modeling, and reverse engineering deliverables that can be directly integrated into your workflow and production pipeline, which enables you to take better business decisions and make operations more efficient. ARC 3D delivers 3D scanning and reverse engineering solutions within Dubai, Abu Dhabi, and across the UAE, depending on project scope and location accessibility.</p>
            </div>
            
        </div>
    </div>
</section>
@endif

@if (!Request::is('3d-scanning'))
<section class="mt-100">
    <div class="container">
        <h3 class="title_48 blue_txt text-center">
            
            How ARC 3D Exceeds Expectations</h3>
            
        </h3>
        @if($service->title == 'Large-Scale Model Making')
            <p >ARC 3D is one of the UAE’s few companies with expertise in producing mega-scale architectural and industrial models. Our work has been showcased by Emaar, Modon, Dubai Government entities, and defense clients.
            </p>
        @endif
       
        <div class="expect_wrapper">
            <div class="expect_slider">
                @if(isset($exceeds_expectations) && is_countable($exceeds_expectations) && count($exceeds_expectations) > 0)
                @foreach ($exceeds_expectations as $exceeds_expectation)
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">{{ $exceeds_expectation->name }}:</h3>
                            {!! $exceeds_expectation->description !!}
                        </div>
                    </div>
                    
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
@endif

@if(Request::is('3d-scanning'))
<section class="mt-100">
    <div class="container">
        <h3 class="title_48 blue_txt">What You Get with ARC 3D  </h3>
        <p>ARC 3D offers all types of 3D scanning & Reverse engineering services in Dubai, UAE. Capture exact dimensions for prototypes & reverse engineering 3D scanning Experts – Detailed 3D scans for industrial parts, architecture, prototyping, automotive & product development needs.</p>
        <div class="expect_wrapper">
            <div class="expect_slider1">
                
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">High-Resolution Scanning:</h3>
                           <p>Fine details matter when you’re dealing with complex parts or intricate surfaces. We capture detailed scan data that supports engineering decisions, documentation, and precise modeling.</p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">Reverse Engineering:</h3>
                            <p>When CAD is missing, outdated, or unreliable, we rebuild it properly. ARC 3D provides reverse engineering services uae clients rely on to convert physical objects into accurate digital models for redesign, reproduction, or performance improvement. </p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">Quality Control:</h3>
                           <p>When accuracy must be verified, scan-to-CAD comparison is essential. We match scanned models against original CAD to confirm dimensional accuracy and highlight deviations clearly.</p>
                        </div>
                    </div>
                    <div>
                        <div class="expect_slide">
                            <h3 class="title_24">Digital Archiving:</h3>
                            <p>For long-term reference, compliance, or preservation, we create accurate digital records of physical items and environments, so the information remains usable in the future.</p>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</section>
@endif

@if (!Request::is('3d-scanning'))
<section class="mt-100">
    <div class="serv_img_wrapper">
        <div class="serv_img_slider">
            @foreach ($feature_projects as $feature_project)
                <div>
                    <div class="serv_img_slide">
                        <img src="{{ asset('public/admin/featureproject_image/' . $feature_project->image)}}" alt="{{ $feature_project->alt_tag }}">
                        <div class="serv_img_ctnt">
                            <h3 class="title_24 yellow_txt">{{ $feature_project->title }}</h3>
                            {!! preg_replace('/<p(.*?)>/', '<p$1 class="text-white mb-0">', $feature_project->description) !!}
                            
                        </div>
                    </div>
                </div>
                
            @endforeach
            
        </div>
    </div>
</section> 
@endif

@if(Request::is('large-scale-model-making'))
<section>
    <div class="container">
        <h4 class="title_48 mb-3 blue_txt ">FAQs: Large-Scale Model Making  </h4>
            <div class="row">
                <div class="col-lg-12">
                    <div id="accordionExample">
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse0"
                                    aria-expanded="true"
                                    aria-controls="collapse0">
                                    What is large scale model making and how is it used in real projects?
                                </h2>
                                <div id="collapse0" 
                                    class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div>
                                       Large scale model making is the process of building physical models that represent real developments, assets, or products at a defined scale. These models are commonly used for approvals, investor presentations, exhibitions, marketing, stakeholder communication, and technical visualization.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse1"
                                    aria-expanded="false"
                                    aria-controls="collapse1">
                                   What types of projects require professional large scale model making services?
                                </h2>
                                <div id="collapse1" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        Typical projects include masterplans, residential communities, villas, commercial towers, infrastructure, industrial facilities, and product showcases. Government launches, real estate campaigns, and international exhibitions often require professional, presentation-grade models.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse2"
                                    aria-expanded="false"
                                    aria-controls="collapse2">
                                  Why choose professional 3D model making services for architectural and industrial projects?
                                </h2>
                                <div id="collapse2" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        Professional 3D Model Making Services ensure accurate scaling, clean finishing, durable construction, and strong visual storytelling. For industrial projects, it also helps communicate complex engineering logic clearly — especially for decision-makers who need fast understanding.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse3"
                                    aria-expanded="false"
                                    aria-controls="collapse3">
                                    What model making services in Dubai are available for real estate and exhibitions?
                                </h2>
                                <div id="collapse3" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        ARC 3D provides Model Making Services in Dubai for developer showrooms, real estate launches, sales displays, and exhibitions. This includes architectural scale models, masterplan models, custom display models, and infrastructure visualization.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse4"
                                    aria-expanded="false"
                                    aria-controls="collapse4">
                                    How do I choose the right model making company for my project?
                                </h2>
                                <div id="collapse4" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                         Choose a model making company that understands your audience and purpose (sales, approvals, exhibitions) and can advise on scale, materials, finishing, and presentation. Reviewing previous work quality and clarity of deliverables is also essential.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse5"
                                    aria-expanded="false"
                                    aria-controls="collapse5">
                                   What industries benefit most from large scale model making?
                                </h2>
                                <div id="collapse5" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        Real estate, architecture, construction, infrastructure, manufacturing, oil & gas, government planning, and automotive exhibitions benefit strongly — especially when the model needs to explain size, sequencing, or operational structure.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse6"
                                    aria-expanded="false"
                                    aria-controls="collapse6">
                                   How long does it take to complete large scale model making projects?
                                </h2>
                                <div id="collapse6" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                         Timelines depend on size, complexity, and detailing. Simple models may take a shorter turnaround, while masterplans and industrial facilities take longer due to detailing, finishing, and custom elements.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse7"
                                    aria-expanded="false"
                                    aria-controls="collapse7">
                                    What materials are used in professional model making services?
                                </h2>
                                <div id="collapse7" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        Professional models commonly use acrylic, wood, foam, metal parts, resin, and 3D printed components. The final material selection depends on durability needs, finish requirements, and whether the model is static or interactive.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse8"
                                    aria-expanded="false"
                                    aria-controls="collapse8">
                                  Are 3D model making services suitable for government and international exhibitions?
                                </h2>
                                <div id="collapse8" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        Yes. Large-scale and high-detail models are widely used for government launches, global exhibitions, and defense expos because they communicate complex plans quickly and create strong visual impact.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse9"
                                    aria-expanded="false"
                                    aria-controls="collapse9">
                                    Why Choose ARC 3D for 3D Scale Models?
                                </h2>
                                <div id="collapse9" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        ARC 3D combines technical accuracy with premium finishing. As an experienced 3D Scale Model Maker in the UAE, we deliver models that match real project intent, reflect brand standards, and perform in high-visibility environments — from showrooms to international exhibitions.


                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
    </div>
</section>
@endif

 @if(Request::is('3d-scanning'))
 <section class="mt-100">
    <div class="container">
        <h4 class="title_48 mb-3 blue_txt ">FAQs: 3D Scanning and Reverse engineering Services   </h4>
            <div class="row">
                <div class="col-lg-12">
                    <div id="accordionExample">
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse0"
                                    aria-expanded="true"
                                    aria-controls="collapse0">
                                    Why choose ARC 3D for scanning and reverse engineering?
                                </h2>
                                <div id="collapse0" 
                                    class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div>
                                       ARC 3D provides expert 3D scanning, reverse engineering, and 3D printing services across Dubai, Abu Dhabi, UAE, and GCC, delivering precise, actionable digital data.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse1"
                                    aria-expanded="false"
                                    aria-controls="collapse1">
                                   Which industries benefit most from 3D scanning and reverse engineering services?
                                </h2>
                                <div id="collapse1" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                       Engineering, automotive, aerospace, medical, architectural and product development rely on 3D scanning for accurate measurements and modeling.
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse2"
                                    aria-expanded="false"
                                    aria-controls="collapse2">
                                  Why is 3D scanning critical for modern design, manufacturing, and product development?
                                </h2>
                                <div id="collapse2" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                         It captures precise real-world geometry for <strong>reverse engineering, CAD models, and 3D printing</strong>, reducing errors and rework.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse3"
                                    aria-expanded="false"
                                    aria-controls="collapse3">
                                    How do I select a reliable 3D scanning company for my project?
                                </h2>
                                <div id="collapse3" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                       Look for proven workflows, clear deliverables, suitable equipment and industry understanding,  not just scanning capability.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse4"
                                    aria-expanded="false"
                                    aria-controls="collapse4">
                                    Can existing or legacy parts be accurately reverse engineered using 3D scanning?
                                </h2>
                                <div id="collapse4" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        Yes, 3D scan data is converted into editable CAD models for reproduction, modification or optimization of existing parts.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse5"
                                    aria-expanded="false"
                                    aria-controls="collapse5">
                                   How does 3D scanning support 3D printing and prototyping workflows?
                                </h2>
                                <div id="collapse5" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        It provides accurate digital data for reliable prototyping, production-ready components, and precise part replication.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse6"
                                    aria-expanded="false"
                                    aria-controls="collapse6">
                                   Can a 3D scanning company provide reverse engineering services?
                                </h2>
                                <div id="collapse6" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        Yes. ARC 3D provides complete 3D scanning and reverse engineering workflows, from capture to usable CAD-ready outputs.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse7"
                                    aria-expanded="false"
                                    aria-controls="collapse7">
                                    How long does a typical 3D scanning project take?
                                </h2>
                                <div id="collapse7" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                         Timelines depend on scope, access, complexity, and deliverables. ARC 3D confirms schedule expectations upfront and works to tight turnaround requirements when needed.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse8"
                                    aria-expanded="false"
                                    aria-controls="collapse8">
                                  How does 3D scanning speed up product development?
                                </h2>
                                <div id="collapse8" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        3D scanning creates instant digital models from physical objects, enabling faster design iterations, reverse engineering, and preparation for 3D printing and production.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h2 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse9"
                                    aria-expanded="false"
                                    aria-controls="collapse9">
                                    What factors affect the cost of 3D scanning services in Dubai?
                                </h2>
                                <div id="collapse9" 
                                    class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        Cost depends on object/site size, complexity, required accuracy, environment/site access, and the final deliverables (CAD models, reports, BIM, etc.)
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
    </div>
</section>
 @endif

@include('layouts.enquiry')
@include('layouts.frontfooter')