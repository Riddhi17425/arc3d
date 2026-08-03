@include('layouts.frontheader', [
    'og_image' => url('public/front/images/story_bann.png')
])
@include('layouts.loader')
@include('layouts.cursor')
<section class="banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-md-0">
                <h1 class="title_48"><span style="color:#005762;">Our Story:</span><br> Shaping the Future with 3D
                    Printing Excellence</h1>
                <div class="banner_para">
                    <p class="mb-0"><strong>Advanced 3D Printing & Model Making</strong></p>
                    <p>Empowering architects, designers, innovators, and industries across the UAE with
                        precision-driven,
                        high-quality 3D printing and prototyping services that transform ideas into impactful realities.
                    </p>
                </div>
                <a href="javascript:void(0);" class="btn_0">Contact Us <svg width="12" height="11" viewBox="0 0 12 11" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 10.5L11 0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M2.11108 0.5H11V8.5" stroke="white" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                </a>  
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('public/front/images/story_bann.png')}}" alt="story" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<section class="ethics mt-100">
    <div class="container-fluid">
        <div class="ethics_wrapper">
            <div class="ethic_1">
                <h2 class="title_48 blue_txt">Our Vision</h2>
                <p>To position Arc3D as the UAE’s leading 3D solutions provider, driving innovation, creativity, and
                    sustainable practices in manufacturing, architecture, defense, and consumer industries. We aim to
                    make 3D printing accessible, reliable, and impactful for businesses of every scale.</p>
                <img src="{{ asset('public/front/images/vision.png')}}" alt="vision" class="img-fluid">
            </div>
            <div class="ethic_1">
                <h2 class="title_48 blue_txt">Our Mision</h2>
                <ul class="mb-4">
                    <li>To empower companies, architects, and innovators with world-class 3D solutions.</li>
                    <li>To support the UAE’s vision for Industry, Smart Manufacturing, and Future Technology.</li>
                    <li>To deliver quality, speed, and affordability without compromise.</li>
                    <li>To continually invest in research, new materials, and advanced processes.</li>
                </ul>
                <img src="{{ asset('public/front/images/mission.png')}}" alt="mission" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="title_48 mt-100">About 3D Printing in the UAE</h2>
        <p>At Arc3D, we are proud to be at the forefront of the UAE’s rapidly growing 3D printing and additive
            manufacturing industry. 3D printing has revolutionized the way products, prototypes, and models are created
            — offering unmatched precision, faster turnaround, and cost efficiency compared to traditional
            manufacturing. With Dubai and Abu Dhabi leading the Middle East’s innovation landscape, we bring world-class
            3D solutions that serve industries ranging from architecture and engineering to healthcare, defense,
            automotive, and education.</p>
        <div class="row mt-5">
            <div class="col-lg-3 col-md-6 mb-lg-0 mb-3" data-aos="fade-down" data-aos-delay="0">
                <div class="stats_box h-100">
                    <h2 class="count title_48 mb-0" data-count="50000" data-suffix="+">0</h2>
                    <p class="mb-0">successful 3D prints delivered across UAE industries.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-md-0 mb-3" data-aos="fade-down" data-aos-delay="200">
                <div class="stats_box h-100">
                    <h2 class="count title_48 mb-0" data-count="100" data-suffix="+">0</h2>
                    <p class="mb-0">satisfied business clients including architects, engineers, & government entities.
                    </p>
                </div>
            </div>
             <div class="col-lg-3 col-md-6 mb-lg-0 mb-3" data-aos="fade-down" data-aos-delay="600">
                <div class="stats_box h-100">
                    <h2 class="title_48 mb-0">24–48 hour</h2>
                    <p class="mb-0">turnaround time for rapid prototyping and small-batch production.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-md-0 mb-3" data-aos="fade-down" data-aos-delay="400">
                <div class="stats_box h-100">
                    <h2 class="count title_48 mb-0" data-count="80" data-suffix="%">0</h2>
                    <p class="mb-0">faster project delivery compared to traditional model-making.
                    </p>
                </div>
            </div>
           
            
        </div>
    </div>
</section>
<!--<div class="story_mid" data-aos="fade-up"-->
<!--     data-aos-anchor-placement="center-bottom"  data-aos-duration="2000">-->
<!--    <img src="{{ asset('public/front/images/story-mid.png')}}" alt="story" class="img-fluid">-->
<!--</div>-->
<section class="core mt-100">
    <div class="container">
        <h2 class="title_48 text-center blue_txt">Our Core Values</h2>
        <div>
            <div class="core_slider">
                <div>
                    <div class="core_slide">
                        @include('svg.bulb_svg')
                        <div>
                            <h3 class="slide_title">Innovation First</h3>
                            <p class="mb-0">Always exploring new technologies and creative solutions.</p>
                        </div>
                    </div>
                </div> 
                <div>
                    <div class="core_slide">
                        @include('svg.precision_svg')
                        <div>
                            <h3 class="slide_title">Precision & Quality</h3>
                            <p class="mb-0">Every detail matters in delivering excellence.</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="core_slide">
                        @include('svg.customer_svg')
                        <div>
                            <h3 class="slide_title">Customer Success</h3>
                            <p class="mb-0">Your vision is our mission.</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="core_slide">
                        @include('svg.integrity_svg')
                        <div>
                            <h3 class="slide_title">Integrity & Trust</h3>
                            <p class="mb-0">Building long-term partnerships based on reliability.</p>
                        </div>
                    </div>
                </div> 
                <div> 
                    <div class="core_slide">
                        @include('svg.sustain_svg')
                        <div>
                            <h3 class="slide_title">Sustainability</h3>
                            <p class="mb-0">Reducing waste, promoting eco-friendly materials, and supporting a greener UAE.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.frontfooter') 