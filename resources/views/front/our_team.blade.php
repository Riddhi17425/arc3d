@include('layouts.frontheader', [
    'og_image' => url('public/front/images/team_img.png')
])
<style>
.proced_slide img {
    transition: opacity 0.8s ease-in-out;
}
.fade-out {
    opacity: 0;
}
</style>
<section class="banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-md-0">
                <h1 class="title_48"><span class="blue_txt">Meet the Minds </span><br> Behind the Innovation</h1>
                <div class="banner_para">
                    <p>At Arc3D, our strength lies in our people. From visionary designers and skilled engineers to
                        expert project managers, our team is united by one passion—turning ideas into precise, tangible
                        realities through cutting-edge 3D printing technology.
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
                <img src="{{ asset('public/front/images/team_bann.png')}}" alt="team" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<section class="mt-100">
<img src="{{asset('public/front/images/team_img.png')}}" alt="team" class="img-fluid"  data-aos="zoom-in-up"  data-aos-duration="1000" data-aos-easing="linear"`>
</section>
<section>
    <div class="container">
        <h2 class="title_48 text-center">We don’t just print products — We print possibilities</h2>
        <div class="team_wrapper">

            @foreach ($teams as $team) 
                <div class="team_box">
                    <div>
                        <img src="{{asset('public/admin/teams/' . $team->image)}}" alt="{{ $team->alt_tag }}" class="img-fluid">
                    </div>
                    <div>
                        <h3 class="title_24">{{ $team->name }}</h3>
                        <h6 class="desig">{{ $team->designation }}</h6>
                    </div>
                    <div>
                        <p class="mb-0">{!! $team->description !!}</p>
                    </div>
                </div> 
            @endforeach
             
        </div>
    </div>
</section>
<section class="mt-100 d-none d-md-block">
    <div class="proced_slider">
        <div class="proced_slide"><img src="" alt="slide" class="img-fluid"></div>
        <div class="proced_slide"><img src="" alt="slide" class="img-fluid"></div>
        <div class="proced_slide"><img src="" alt="slide" class="img-fluid"></div>
        <div class="proced_slide"><img src="" alt="slide" class="img-fluid"></div>
        <div class="proced_slide"><img src="" alt="slide" class="img-fluid"></div>
    </div>

    <div class="proced_slider">
        <div class="proced_slide"><img src="" alt="slide" class="img-fluid"></div>
        <div class="proced_slide"><img src="" alt="slide" class="img-fluid"></div>
        <div class="proced_slide"><img src="" alt="slide" class="img-fluid"></div>
        <div class="proced_slide"><img src="" alt="slide" class="img-fluid"></div>
        <div class="proced_slide"><img src="" alt="slide" class="img-fluid"></div>
    </div>
</section>

<section class="mt-100  d-md-none">
    <div class="proced_slider_mobile">
        @foreach($gallery as $item)
            <div><img src="{{ asset('public/admin/gallery/' . $item->image) }}" alt="{{ $item->alt_tag }}" class="img-fluid"></div>
        @endforeach
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Laravel gallery data
    window.APP_URLS = {
        baseUrl: "{{ asset('public/admin/gallery') }}",
        image_array: @json($gallery)
    };

    const baseUrl = window.APP_URLS.baseUrl;
    const images = window.APP_URLS.image_array.map(img => ({
        src: `${baseUrl}/${img.image}`,
        alt: img.alt_tag?.trim() || "Image"
    }));

    const slides = document.querySelectorAll(".proced_slide img");

    if (images.length < slides.length) {
        console.warn('Not enough unique images for all slides');
        return;
    }

    // Helper to shuffle array
    function shuffleArray(arr) {
        const a = [...arr];
        for (let i = a.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [a[i], a[j]] = [a[j], a[i]];
        }
        return a;
    }

    // Initialize slides with unique images
    const visibleImages = new Set();
    let availableImages = shuffleArray([...images]); // Copy to avoid modifying original
    slides.forEach((img, index) => {
        if (index < availableImages.length) {
            const image = availableImages[index];
            img.src = image.src;
            img.alt = image.alt;
            visibleImages.add(image.src);
        }
    });

    // Get a unique image not currently visible
    function getUniqueImage() {
        const available = images.filter(img => !visibleImages.has(img.src));
        if (available.length === 0 && visibleImages.size > 0) {
            console.warn('All images used, cycling back');
            visibleImages.clear();
            availableImages = shuffleArray([...images]);
            return availableImages[0];
        }
        return available.length > 0 ? available[Math.floor(Math.random() * available.length)] : availableImages[0];
    }

    // Rotate one random image at a time
    function rotateRandomImage() {
        const randomIndex = Math.floor(Math.random() * slides.length);
        const img = slides[randomIndex];
        const oldSrc = img.src;

        img.classList.add("fade-out");

        setTimeout(() => {
            visibleImages.delete(oldSrc);

            const newImage = getUniqueImage();
            img.src = newImage.src;
            img.alt = newImage.alt;

            visibleImages.add(newImage.src);
            img.classList.remove("fade-out");
        }, 800); // fade duration
    }

    // Run rotation continuously
    setInterval(rotateRandomImage, 2000); // change every 2s
});
</script>

@include('layouts.frontfooter')  