@include('layouts.frontheader')
<style>
        /* Checker overlay grid */
        .checker-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            grid-template-rows: repeat(8, 1fr);
            pointer-events: none;
            z-index: 10;
        }

        .checker-tile {
            /*background: #000;*/
            background: #fff;
            filter: blur(100px);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        /* Checker animation active state */
        .checker-active .checker-tile {
            opacity: 1;
        }

        /* Staggered animation delays for checker pattern */
        .checker-tile:nth-child(1) { transition-delay: 0s; }
        .checker-tile:nth-child(2) { transition-delay: 0.05s; }
        .checker-tile:nth-child(3) { transition-delay: 0.1s; }
        .checker-tile:nth-child(4) { transition-delay: 0.15s; }
        .checker-tile:nth-child(5) { transition-delay: 0.2s; }
        .checker-tile:nth-child(6) { transition-delay: 0.25s; }
        .checker-tile:nth-child(7) { transition-delay: 0.3s; }
        .checker-tile:nth-child(8) { transition-delay: 0.35s; }
        .checker-tile:nth-child(9) { transition-delay: 0.05s; }
        .checker-tile:nth-child(10) { transition-delay: 0.1s; }
        .checker-tile:nth-child(11) { transition-delay: 0.15s; }
        .checker-tile:nth-child(12) { transition-delay: 0.2s; }
        .checker-tile:nth-child(13) { transition-delay: 0.25s; }
        .checker-tile:nth-child(14) { transition-delay: 0.3s; }
        .checker-tile:nth-child(15) { transition-delay: 0.35s; }
        .checker-tile:nth-child(16) { transition-delay: 0.4s; }
        .checker-tile:nth-child(17) { transition-delay: 0.1s; }
        .checker-tile:nth-child(18) { transition-delay: 0.15s; }
        .checker-tile:nth-child(19) { transition-delay: 0.2s; }
        .checker-tile:nth-child(20) { transition-delay: 0.25s; }
        .checker-tile:nth-child(21) { transition-delay: 0.3s; }
        .checker-tile:nth-child(22) { transition-delay: 0.35s; }
        .checker-tile:nth-child(23) { transition-delay: 0.4s; }
        .checker-tile:nth-child(24) { transition-delay: 0.45s; }
        .checker-tile:nth-child(25) { transition-delay: 0.15s; }
        .checker-tile:nth-child(26) { transition-delay: 0.2s; }
        .checker-tile:nth-child(27) { transition-delay: 0.25s; }
        .checker-tile:nth-child(28) { transition-delay: 0.3s; }
        .checker-tile:nth-child(29) { transition-delay: 0.35s; }
        .checker-tile:nth-child(30) { transition-delay: 0.4s; }
        .checker-tile:nth-child(31) { transition-delay: 0.45s; }
        .checker-tile:nth-child(32) { transition-delay: 0.5s; }
        .checker-tile:nth-child(33) { transition-delay: 0.2s; }
        .checker-tile:nth-child(34) { transition-delay: 0.25s; }
        .checker-tile:nth-child(35) { transition-delay: 0.3s; }
        .checker-tile:nth-child(36) { transition-delay: 0.35s; }
        .checker-tile:nth-child(37) { transition-delay: 0.4s; }
        .checker-tile:nth-child(38) { transition-delay: 0.45s; }
        .checker-tile:nth-child(39) { transition-delay: 0.5s; }
        .checker-tile:nth-child(40) { transition-delay: 0.55s; }
        .checker-tile:nth-child(41) { transition-delay: 0.25s; }
        .checker-tile:nth-child(42) { transition-delay: 0.3s; }
        .checker-tile:nth-child(43) { transition-delay: 0.35s; }
        .checker-tile:nth-child(44) { transition-delay: 0.4s; }
        .checker-tile:nth-child(45) { transition-delay: 0.45s; }
        .checker-tile:nth-child(46) { transition-delay: 0.5s; }
        .checker-tile:nth-child(47) { transition-delay: 0.55s; }
        .checker-tile:nth-child(48) { transition-delay: 0.6s; }
        .checker-tile:nth-child(49) { transition-delay: 0.3s; }
        .checker-tile:nth-child(50) { transition-delay: 0.35s; }
        .checker-tile:nth-child(51) { transition-delay: 0.4s; }
        .checker-tile:nth-child(52) { transition-delay: 0.45s; }
        .checker-tile:nth-child(53) { transition-delay: 0.5s; }
        .checker-tile:nth-child(54) { transition-delay: 0.55s; }
        .checker-tile:nth-child(55) { transition-delay: 0.6s; }
        .checker-tile:nth-child(56) { transition-delay: 0.65s; }
        .checker-tile:nth-child(57) { transition-delay: 0.35s; }
        .checker-tile:nth-child(58) { transition-delay: 0.4s; }
        .checker-tile:nth-child(59) { transition-delay: 0.45s; }
        .checker-tile:nth-child(60) { transition-delay: 0.5s; }
        .checker-tile:nth-child(61) { transition-delay: 0.55s; }
        .checker-tile:nth-child(62) { transition-delay: 0.6s; }
        .checker-tile:nth-child(63) { transition-delay: 0.65s; }
        .checker-tile:nth-child(64) { transition-delay: 0.7s; }
    </style>
<section class="banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="title_48"><span style="color:#005762;">Our Process:</span><br> How Ideas Become Reality</h1>
                <div class="banner_para">
                    <p class="mb-0"><strong>Advanced 3D Printing & Model Making</strong></p>
                    <p>Empowering architects, designers, innovators, and industries across the UAE with precision-driven, high-quality 3D printing and prototyping services that transform ideas into impactful realities.
                    </p> 
                </div>
                <a href="{{ url('contact') }}" class="btn_0">Contact Us <svg width="12" height="11" viewBox="0 0 12 11" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 10.5L11 0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M2.11108 0.5H11V8.5" stroke="white" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                </a> 
            </div>
            <div class="col-lg-6">
                <div class="pc_banner_wrapper">
                    <div class="process_baner_1" data-aos="flip-left" data-aos-duration="800" data-aos-delay="0">
                        <img src="{{ asset('public/front/images/process_baner_1.png')}}" alt="Process banner image 1" class="img-fluid">
                    </div>
                    <div class="process_baner_1" data-aos="fade-right" data-aos-duration="200" data-aos-delay="200">
                        <img src="{{ asset('public/front/images/process_baner_arrow.png')}}" alt="Process banner arrow" class="img-fluid">
                    </div>
                    <div class="process_baner_1" data-aos="fade-right" data-aos-duration="800" data-aos-delay="800">
                        <img src="{{ asset('public/front/images/process_baner_2.png')}}" alt="Process banner image 2" class="img-fluid">
                    </div>
                    <div class="process_baner_1" data-aos="fade-right" data-aos-duration="200" data-aos-delay="1000">
                        <img src="{{ asset('public/front/images/process_baner_arrow.png')}}" alt="Process banner arrow" class="img-fluid">
                    </div>
                    <div class="process_baner_1" data-aos="fade-right" data-aos-duration="800" data-aos-delay="1400">
                        <img src="{{ asset('public/front/images/process_baner_3.png')}}" alt="Process banner image 3" class="img-fluid">
                    </div>
                    <div class="process_baner_1" data-aos="fade-right" data-aos-duration="200" data-aos-delay="1500">
                        <img src="{{ asset('public/front/images/process_baner_arrow.png')}}" alt="Process banner arrow" class="img-fluid">
                    </div>
                    <div class="process_baner_1" data-aos="fade-right" data-aos-duration="800" data-aos-delay="2000">
                        <img src="{{ asset('public/front/images/process_baner_4.png')}}" alt="Process banner image 4" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="procedure mt-100">
    <div class="container">
        <div class="procedure_wrapper">
            <div class="proced_box proced_1">
                <div class="proced">
                    <div class="proced_content_1">
                        <span class="proced_pill">Step 1</span>
                        <h2 class="title_48 blue_txt">Consultation & Idea Exchange</h2>
                        <p>Every project begins with understanding your vision. Our expert team collaborates with you to
                            review your files, sketches, or ideas, offering guidance on the best materials, technology,
                            and finishes for your needs.</p>
                        <ul>
                            <li>Personalized consultation tailored to your project</li>
                            <li>File review & feasibility check</li>
                            <li>Material & technology recommendations</li>
                        </ul>
                    </div>
                    <div class="svg_wrapper">
                       @include('svg.svg_1')
                    </div>
                </div>
            </div>
            <div class="proced_box proced_2">
                <div class="proced">
                    <div class="proced_content_2">
                        <span class="proced_pill">Step 2</span>
                        <h2 class="title_48 blue_txt">3D Design & CAD Modeling</h2>
                        <p>Our designers convert your idea into a digital 3D model, using advanced CAD software and
                            reverse engineering if required. We ensure every angle, curve, and detail is accurate before
                            production.</p>
                        <ul>
                            <li>Detailed CAD modeling & 3D visualization</li>
                            <li>Iterations & refinements until approved</li>
                            <li>File optimization for best printing results</li>
                        </ul>
                    </div>
                    <div class="svg_wrapper">
                       @include('svg.svg_2')
                    </div>
                </div>
            </div>
            <div class="proced_box proced_3">
                <div class="proced">
                    <div class="proced_content_1">
                        <span class="proced_pill">Step 3</span>
                        <h2 class="title_48 blue_txt">Precision Printing & Finishing</h2>
                        <p>With cutting-edge 3D printing technologies (FDM, SLA, SLS, CJP), your design takes shape
                            layer by layer. Once printed, our finishing team enhances the model with post-processing,
                            painting, and texturing to ensure it’s presentation-ready.</p>
                        <ul>
                           <li>High-precision 3D printing across multiple materials</li>
                            <li>Professional sanding, curing, and painting</li>
                            <li>Realistic finishes & branding options</li>
                        </ul>
                    </div>
                    <div class="svg_wrapper">
                       @include('svg.svg_3')
                    </div>
                </div>
            </div>
            <div class="proced_box proced_4">
                <div class="proced">
                    <div class="proced_content_2">
                        <span class="proced_pill">Step 4</span>
                        <h2 class="title_48 blue_txt">Quality Check & Delivery</h2>
                        <p>Before your model reaches you, it undergoes strict quality inspection to guarantee durability, accuracy, and flawless presentation. We deliver anywhere across the UAE, with same-day delivery available for urgent projects.</p>
                        <ul>
                            <li>Rigorous quality assurance at every stage</li>
                            <li>Safe packaging & secure delivery</li>
                            <li>Fast turnaround times within UAE</li>
                        </ul>
                    </div>
                    <div class="svg_wrapper">
                       @include('svg.svg_4')
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
<section class="mt-100 d-none d-md-block">
    <div class="proced_slider">
        <div class="proced_slide"><img src="" alt="slide" class="img-fluid"><div class="checker-overlay"></div></div>
        <div class="proced_slide"><img src="" alt="slide" class="img-fluid"><div class="checker-overlay"></div></div>
        <div class="proced_slide"><img src="" alt="slide" class="img-fluid"><div class="checker-overlay"></div></div>
        <div class="proced_slide"><img src="" alt="slide" class="img-fluid"><div class="checker-overlay"></div></div>
        <div class="proced_slide"><img src="" alt="slide" class="img-fluid"><div class="checker-overlay"></div></div>
    </div>
</section>

<section class="mt-100  d-md-none">
    <div class="proced_slider_mobile">
        @foreach($gallery as $item)
            <div><img src="{{ asset('public/admin/gallery/' . $item->image) }}" alt="{{ $item->alt_tag }}" class="img-fluid"></div>
        @endforeach
    </div>
</section>

<!--svg animation-->
<script>
    // intersection observer
document.addEventListener('DOMContentLoaded', () => {
        // Array of proced boxes and their corresponding SVGs
        const procedBoxes = [
            { box: document.querySelector('.proced_box.proced_1'), svgId: 'proced-1-svg' },
            { box: document.querySelector('.proced_box.proced_2'), svgId: 'proced-2-svg' },
            { box: document.querySelector('.proced_box.proced_3'), svgId: 'proced-3-svg' },
            { box: document.querySelector('.proced_box.proced_4'), svgId: 'proced-4-svg' }
        ];
 
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                const box = entry.target;
                const svgId = procedBoxes.find(p => p.box === box).svgId;
                const svg = document.querySelector(`#${svgId} .draw-path`);
 
                if (entry.isIntersecting) {
                    if (svg) {
                        const length = svg.getTotalLength();
                        svg.style.strokeDasharray = length;
                        svg.style.strokeDashoffset = length;
                        svg.classList.add('animate-draw');
                    }
                } else {
                    if (svg) {
                        svg.classList.remove('animate-draw');
                        svg.style.strokeDasharray = '';
                        svg.style.strokeDashoffset = '';
                    }
                }
            });
        }, { threshold: 0.5 }); // Triggers when 50% of the element is visible
 
        procedBoxes.forEach(item => {
            if (item.box) {
                observer.observe(item.box);
            } else {
                console.error(`Element for ${item.svgId} not found`);
            }
        });
    });
</script>
<!--svg animation-->
<script>
    window.APP_URLS = {
        baseUrl: "{{ asset('public/admin/gallery') }}",
        image_array: @json($gallery)
    };
</script>

<!-- Main Script -->
<script>
   document.addEventListener('DOMContentLoaded', function () {
    const baseUrl = window.APP_URLS?.baseUrl || '';
    if (!baseUrl) {
        console.error('baseUrl is not defined in window.APP_URLS');
        return;
    }

    const imageArray = window.APP_URLS.image_array || [];
    if (!imageArray.length) {
        console.error('image_array is not defined or empty in window.APP_URLS');
        return;
    }

    const images = imageArray.map(img => ({
        src: `${baseUrl}/${img.image}`,
        alt: img.alt_tag && img.alt_tag.trim() !== '' ? img.alt_tag : ''
    }));

    const slides = document.querySelectorAll(".proced_slide");
    if (slides.length === 0) {
        console.error('No elements with class .proced_slide found');
        return;
    }
    if (images.length < slides.length) {
        console.warn('Not enough unique images for all slides');
        return;
    }

    // Create checker tiles for each slide
    slides.forEach(slide => {
        const overlay = slide.querySelector('.checker-overlay');
        if (!overlay) {
            console.error('Checker-overlay not found in a slide', slide);
            return;
        }
        while (overlay.firstChild) overlay.removeChild(overlay.firstChild); // Clear existing tiles
        for (let i = 0; i < 64; i++) {
            const tile = document.createElement('div');
            tile.className = 'checker-tile';
            overlay.appendChild(tile);
        }
    });

    function shuffleArray(array) {
        const shuffled = [...array];
        for (let i = shuffled.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
        }
        return shuffled;
    }

    let availableImages = shuffleArray([...images]);
    const usedImages = new Set();

    // Initialize slides with unique images
    slides.forEach((slide, index) => {
        if (index < availableImages.length) {
            const img = slide.querySelector('img');
            if (!img) {
                console.error('Image element not found in slide', slide);
                return;
            }
            const image = availableImages[index];
            img.src = image.src;
            img.alt = image.alt;
            usedImages.add(image.src);
        }
    });

    function getNextUniqueImage() {
        if (availableImages.length === 0) {
            if (usedImages.size >= images.length) {
                availableImages = shuffleArray([...images]);
                usedImages.clear();
                console.warn('All images used, restarting cycle');
            } else {
                availableImages = shuffleArray([...images].filter(img => !usedImages.has(img.src)));
            }
        }
        const nextImage = availableImages.shift();
        usedImages.add(nextImage.src);
        return nextImage;
    }

    function startImageRotation() {
        setInterval(() => {
            const randomIndex = Math.floor(Math.random() * slides.length);
            const slide = slides[randomIndex];
            const slideImg = slide.querySelector('img');
            const overlay = slide.querySelector('.checker-overlay');
            if (!slideImg || !overlay) {
                console.error('Required elements missing in slide', slide);
                return;
            }

            const oldSrc = slideImg.src;
            overlay.classList.add('checker-active');

            setTimeout(() => {
                usedImages.delete(oldSrc);
                const newImage = getNextUniqueImage();
                slideImg.src = newImage.src;
                slideImg.alt = newImage.alt;
                usedImages.add(newImage.src);

                setTimeout(() => {
                    overlay.classList.remove('checker-active');
                }, 50);
            }, 800);
        }, 2500);
    }

    startImageRotation();
});
</script>
@include('layouts.frontfooter') 
