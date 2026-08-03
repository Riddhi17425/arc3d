@include('layouts.frontheader')

<style>

/*-------------------------------------------*/
.featured-project-item {cursor:auto!important;}
.featured-project-item:hover .featured-project-overlay{opacity:0!important;}
.project .nav-pills {
  display: flex;
  overflow-x: auto;
  overflow-y: hidden;
  white-space: nowrap;
  gap: 10px; /* replaces margin-right for modern layout */
  padding-bottom: 10px;
  scrollbar-color: #d47e2a #e5e5e5; /* for Firefox */
  scrollbar-width: thin;
  -webkit-overflow-scrolling: touch; /* smooth scroll on iOS */
}

/* Chrome, Edge, Safari custom scrollbar */
.project .nav-pills::-webkit-scrollbar {
  height: 6px;
}

.project .nav-pills::-webkit-scrollbar-track {
  background: #e5e5e5;
  border-radius: 20px;
}

.project .nav-pills::-webkit-scrollbar-thumb {
  background: #d47e2a;
 border-radius: 20px;
}

/* Optional: tab item styling */
.project .nav-pills .nav-item {
  flex: 0 0 auto;
}

/* Optional: make scrollbar always visible */
.project .nav-pills {
  scrollbar-gutter: stable; /* helps keep scrollbar space fixed */
}


/*-------------------------------------------*/
/* ✅ Card Base Style */
    .featured-project-item {
      animation: slide-in linear both;
      animation-timeline: view();
      animation-range: cover 0% contain 15%;
      --amp: 1;
    }
    /* ✅ Scroll Animation Keyframes */
    @keyframes slide-in {
      from {
        scale: 0.85;
        rotate: calc(var(--side, 1) * (5deg * var(--amp, 1)));
        opacity: 0;
      }
      to {
        scale: 1;
        rotate: 0deg;
        opacity: 1;
      }
    }
   
    
    /* Set different transform origins for wave-like animation */
    .featured-project-item:nth-of-type(2n + 1) { transform-origin: 25vw 100%; --side: -1; }
    .featured-project-item:nth-of-type(2n) { transform-origin: -25vw 100%; --side: 1; }

    @media (width >= 720px) {
      .featured-project-item:nth-of-type(4n + 1) { transform-origin: 50vw 100%; --side: -1; --amp: 2; }
      .featured-project-item:nth-of-type(4n + 2) { transform-origin: 25vw 100%; --side: -1; }
      .featured-project-item:nth-of-type(4n + 3) { transform-origin: -25vw 100%; --side: 1; }
      .featured-project-item:nth-of-type(4n) { transform-origin: -50vw 100%; --side: 1; --amp: 2; }
    }

    @media (width >= 1200px) {
      .featured-project-item:nth-of-type(6n + 1) { transform-origin: 75vw 100%; --side: -1; --amp: 3; }
      .featured-project-item:nth-of-type(6n + 2) { transform-origin: 50vw 100%; --side: -1; --amp: 2; }
      .featured-project-item:nth-of-type(6n + 3) { transform-origin: 25vw 100%; --side: -1; }
      .featured-project-item:nth-of-type(6n + 4) { transform-origin: -25vw 100%; --side: 1; }
      .featured-project-item:nth-of-type(6n + 5) { transform-origin: -50vw 100%; --side: 1; --amp: 2; }
      .featured-project-item:nth-of-type(6n) { transform-origin: -75vw 100%; --side: 1; --amp: 3; }
    }

    @media (width >= 1920px) {
      .featured-project-item:nth-of-type(8n + 1) { transform-origin: 100vw 100%; --side: -1; --amp: 4; }
      .featured-project-item:nth-of-type(8n + 2) { transform-origin: 75vw 100%; --side: -1; --amp: 3; }
      .featured-project-item:nth-of-type(8n + 3) { transform-origin: 50vw 100%; --side: -1; --amp: 2; }
      .featured-project-item:nth-of-type(8n + 4) { transform-origin: 25vw 100%; --side: -1; }
      .featured-project-item:nth-of-type(8n + 5) { transform-origin: -25vw 100%; --side: 1; }
      .featured-project-item:nth-of-type(8n + 6) { transform-origin: -50vw 100%; --side: 1; --amp: 2; }
      .featured-project-item:nth-of-type(8n + 7) { transform-origin: -75vw 100%; --side: 1; --amp: 3; }
      .featured-project-item:nth-of-type(8n) { transform-origin: -100vw 100%; --side: 1; --amp: 4; }
    }
</style>
<section class="service_banner banner" id="banner-section">
    <div class="container">
        <h1 class="title_48" id="banner-title">
            <span style="color:#005762;">Projects:</span><br>
            <span id="banner-main-text">Showcasing Innovation in 3D Printing Across the UAE</span>
        </h1>
        <p id="banner-description">
            From architectural models in Dubai to industrial prototypes in Abu Dhabi, our projects reflect precision, creativity, and a commitment to excellence. Explore how Arc3D turns ideas into tangible success stories.
        </p>
    </div>
</section>
<section class="mt-100 project">
    <div class="container">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all"
              type="button" role="tab" aria-controls="pills-all" aria-selected="true">
              All Projects
            </button>
          </li>
          
          @php
            $hideServices = [
                '3D Printing',
                'Prototyping Services',
                'Large-Scale Model Making',
                'Architectural Model Making'
            ];
        @endphp
        
          @foreach ($our_services as $our_service)
          @if(!in_array($our_service->title, $hideServices))
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-{{ $our_service->url }}-tab" data-bs-toggle="pill"
              data-bs-target="#pills-{{ $our_service->url }}" type="button" role="tab"
              aria-controls="pills-{{ $our_service->url }}" aria-selected="false">
              {{ $our_service->title }}
            </button>
          </li>
          @endif
          @endforeach
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                <section class="feature-box mt-50">
                    <div class="container">                        
                        <div class="featured-projects-grid">
                            <!--@foreach ($projects as $project)-->
                            <!--    <div class="featured-project-item custom-hand-cursor-target">-->
                            <!--        <img src="{{ asset('public/admin/featureproject_image/' . $project->image)}}" alt="{{ $project->alt_tag }}" class="br-5">-->
                            <!--        <div class="featured-project-overlay br-5">-->
                            <!--            <h3>{{ $project->title }}</h3>-->
                            <!--            <p>{!! $project->description !!}</p>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--@endforeach-->
                           @php
                                $uniqueProjects = collect($projects)
                                    ->unique('image')
                                    ->values(); 
                            @endphp
                            
                            @foreach ($uniqueProjects as $project)
                                <div class="featured-project-item custom-hand-cursor-target">
                                    <img 
                                        src="{{ asset('public/admin/featureproject_image/' . $project->image) }}" 
                                        alt="{{ $project->alt_tag }}" 
                                        class="br-5"
                                    >
                            
                                    <div class="featured-project-overlay br-5">
                                        <h3>{{ $project->title }}</h3>
                                        <p>{!! $project->description !!}</p>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
 
                </section>
            </div>
            <!-- Service Wise Projects -->
            @foreach ($our_services as $our_service)
                {{-- {{ $our_service->title }} --}}
                <div class="tab-pane fade" id="pills-{{ $our_service->url }}" role="tabpanel" aria-labelledby="pills-{{ $our_service->url }}-tab">
                    <section class="feature-box mt-50">
                        <div class="container">                        
                            <div class="featured-projects-grid"> 
                                @php
                                    $filteredProjects = $projects->filter(function($project) use ($our_service) {
                                        if (!empty($project->services)) {
                                            $urls = json_decode($project->services, true);

                                            // Ensure it's an array
                                            if (is_array($urls)) {
                                                // case-insensitive match to avoid mismatch
                                                return in_array(strtolower($our_service->url), array_map('strtolower', $urls));
                                            }
                                        }
                                        return false;
                                    }); 
                                    
                                @endphp
                                {{-- {{ $filteredProjects }} --}}
                                
                                @forelse($filteredProjects as $project)
                                    <div class="featured-project-item custom-hand-cursor-target">
                                        <img src="{{ asset('public/admin/featureproject_image/' . $project->image)}}" alt="{{ $project->alt_tag }}" class="br-5">
                                        <div class="featured-project-overlay br-5">
                                            <h3>{{ $project->title }}</h3>
                                            <p>{!! $project->description !!}</p>
                                        </div>
                                    </div>
                                @empty
                                    <p>No projects found for {{ $our_service->title }}</p>
                                @endforelse
                            </div>
                        </div>
                    </section>
                </div>
            @endforeach
            
        </div>

    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tabList = document.querySelector('.project .nav-pills');

    tabList.addEventListener('click', function (e) {
        if (e.target.classList.contains('nav-link')) {
            const tab = e.target;

            // Total scrollable width minus container width
            const scrollWidth = tabList.scrollWidth;
            const containerWidth = tabList.clientWidth;

            // Tab's position relative to tabList
            const tabLeft = tab.offsetLeft;
            const tabWidth = tab.offsetWidth;

            // Calculate scroll so that tab is centered
            const scrollPos = tabLeft - (containerWidth / 2) + (tabWidth / 2);

            // Smooth scroll
            tabList.scrollTo({
                left: scrollPos,
                behavior: 'smooth'
            });
        }
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const bannerMainText = document.getElementById('banner-main-text');
    const bannerDescription = document.getElementById('banner-description');

    // Default text (All Projects)
    const defaultMainText = "Showcasing Innovation in 3D Printing Across the UAE";
    const defaultDescription = "From architectural models in Dubai to industrial prototypes in Abu Dhabi, our projects reflect precision, creativity, and a commitment to excellence. Explore how Arc3D turns ideas into tangible success stories.";

    // Har tab ke liye custom text (ID exact match karo)
    const tabContentMap = {
        'pills-all-tab': {
            title: defaultMainText,
            desc: defaultDescription
        },
        'pills-scale-models-tab': {
            title: "Scale Models",
            desc: "Precision-crafted scale models that transform complex ideas into accurate physical representations, enabling stakeholders to clearly visualize concepts, evaluate proportions, and support confident decision-making for planning, presentations, approvals, and strategic discussions across diverse industries."
        },
        'pills-architectural-scale-models-tab': {  // Yeh ID check kar lo inspect se
            title: "Architectural Scale Models",
            desc: "Highly detailed architectural scale models designed to showcase form, scale, materials, and spatial relationships, helping architects, developers, and planners effectively communicate design intent, project vision, and development potential to clients, investors, and regulatory authorities."
        },
        'pills-trophies-and-giveaways-tab': {
            title: "Trophies and Giveaways",
            desc: "Custom-designed trophies and giveaways produced using advanced 3D printing, delivering distinctive forms, fine detailing, and premium finishes that elevate brand identity for corporate awards, events, exhibitions, product launches, and promotional campaigns."
        },
        'pills-props-and-sculptures-tab': {
            title: "Props and Sculptures",
            desc: "Bespoke props and sculptures created through advanced 3D printing techniques, offering creative freedom, intricate detailing, and structural accuracy for exhibitions, retail environments, themed installations, events, and experiential brand activations."
        },
        'pills-prototype-and-low-volume-parts-tab': {
            title: "Prototype and Low-Volume Parts",
            desc: "Functional prototypes and low-volume production parts manufactured for testing, validation, and limited runs, enabling faster product development, design refinement, cost control, and reliable performance before scaling to full production."
        },
        'pills-3d-scanning-tab': {
            title: "3D Scanning & Reverse Engineering",
            desc: "High-accuracy 3D scanning and reverse engineering services that digitally capture real-world objects, enabling precise replication, redesign, analysis, and optimization of components for manufacturing, restoration, and product improvement."
        },
        'pills-interactive-technology-tab': {
            title: "Interactive Technology",
            desc: "Innovative interactive technology solutions that merge physical models with digital experiences, creating immersive, engaging environments that enhance storytelling, audience interaction, and communication for exhibitions, showrooms, education, and brand experiences."
        }
    };

    // Tab click pe banner change karo
    document.querySelectorAll('.nav-pills .nav-link').forEach(tab => {
        tab.addEventListener('click', function () {
            const tabId = this.getAttribute('id');

            // Agar tab id map mein hai toh uska text use karo, warna default
            const content = tabContentMap[tabId] || {
                title: defaultMainText,
                desc: defaultDescription
            };

            bannerMainText.textContent = content.title;
            bannerDescription.textContent = content.desc;
        });
    });
});
</script>


@include('layouts.frontfooter')