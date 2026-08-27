<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{!! $title ?? 'Arc3d' !!}</title>

    <meta name="description" content="{{ html_entity_decode($description ?? '') }}">

    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />

    <meta name="google-site-verification" content="iMTvRRZmwY8Us86CRyr3B0EcWrjNDHpUIY8hjaDCXWM" />



    <link rel="canonical" href="{{ url()->current() }}" />

    <link rel="icon" type="image/x-icon" href="{{ asset('public/front/images/favicon.png') }}">

    <!-- fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Oswald:wght@200..700&display=swap"
        rel="stylesheet">

    <!--font awesome link-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- bootstap links -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- slick slider -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- aos aniamtion -->

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- fontawesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Select2 CSS (CDN) -->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



    <link rel="stylesheet" href="{{ asset('public/front/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('public/front/css/responsive.css') }}">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/css/intlTelInput.css">



    <meta name="google-site-verification" content="iMTvRRZmwY8Us86CRyr3B0EcWrjNDHpUIY8hjaDCXWM" />

    <!-- OG Tags Start -->

    @php

        $ogType = request()->is('blogs') || request()->is('blog-detail/*') ? 'article' : 'website';

    @endphp

    <meta property="og:title" content="{{ $title ?? 'Arc3d' }}">

    <meta property="og:description" content="{{ $description ?? '' }}">

    <meta property="og:type" content="{{ $ogType }}">

    <meta property="og:url" content="{{ url()->current() }}">



    <meta property="og:image" content="{{ $og_image ?? asset('public/front/images/favicon.png') }}">

    <meta property="og:image:width" content="1200">

    <meta property="og:image:height" content="627">



    <meta property="og:updated_time" content="{{ now()->toIso8601String() }}">



    <!-- OG Tags End -->



    <!--Twitter X Card Tags-->

    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title" content="{{ $title ?? 'Arc3d' }}">

    <meta name="twitter:description" content="{{ html_entity_decode($description ?? '') }}">

    <meta name="twitter:image" content="{{ $og_image ?? asset('public/front/images/favicon.png') }}">





    @verbatim

        <script type="application/ld+json">

{

  "@context": "https://schema.org/",

  "@type": "WebSite",

  "name": "Arc3d",

  "url": "https://arc3d.ae/",

  "potentialAction": {

    "@type": "SearchAction",

    "target": "{search_term_string}",

    "query-input": "required name=search_term_string"

  }

}

</script>

    @endverbatim

    @verbatim

        <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "@id": "https://arc3d.ae/#localbusiness",
  "name": "Arc 3D Printing Solutions LLC",
  "image": "https://arc3d.ae/public/front/images/favicon.png",
  "url": "https://arc3d.ae/",
  "telephone": "+971542797571",
  "email": "info@arc3d.ae",
  "priceRange": "$$",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Musaffah",
    "addressLocality": "Abu Dhabi",
    "addressRegion": "Abu Dhabi",
    "addressCountry": "AE"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 24.3481243,
    "longitude": 54.5146118
  },
  "areaServed": [
    {
      "@type": "City",
      "name": "Abu Dhabi"
    },
    {
      "@type": "City",
      "name": "Dubai"
    },
    {
      "@type": "AdministrativeArea",
      "name": "United Arab Emirates"
    }
  ],
  "openingHoursSpecification": [
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday"],
      "opens": "09:00",
      "closes": "18:00"
    }
  ],
  "sameAs": [
    "https://www.linkedin.com/company/arc-3d-ae/",
    "https://www.facebook.com/profile.php?id=100087950862002",
    "https://www.instagram.com/arc3d.ae/",
    "https://www.youtube.com/@Arc3dprinting/"
  ]
}
</script>

    @endverbatim

    <!-- OLD Google tag (gtag.js) -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PDKZ2PK3RN"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());



        gtag('config', 'G-PDKZ2PK3RN');
    </script>

    <!-- Meta Pixel Code -->

    <script>
        ! function(f, b, e, v, n, t, s)

        {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?

                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };

            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';

            n.queue = [];
            t = b.createElement(e);
            t.async = !0;

            t.src = v;
            s = b.getElementsByTagName(e)[0];

            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',

            'https://connect.facebook.net/en_US/fbevents.js');

        fbq('init', '2156112598552467');

        fbq('track', 'PageView');
    </script>

    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=2156112598552467&ev=PageView&noscript=1" /></noscript>

    <!-- End Meta Pixel Code -->



    <!-- NEW Google tag (gtag.js) -->

    <!--<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11221771829"></script>-->

    <!--<script>
        -- >

        <
        !--window.dataLayer = window.dataLayer || [];
        -- >

        <
        !-- function gtag() {
            dataLayer.push(arguments);
        }-- >

        <
        !--gtag('js', new Date());
        -- >



        <
        !--gtag('config', 'AW-11221771829');
        -- >

        <
        !--
    </script>-->

    <!-- Google Tag Manager -->



    <!-- Event snippet for Call - Google Ads conversion page -->

    <!--<script>
        -- >

        <
        !--gtag('event', 'conversion', {
            'send_to': 'AW-11221771829/XiCJCLrQn6wYELXM-uYp'
        });
        -- >

        <
        !--
    </script>-->

    <!-- Event snippet for Lead Form - EX conversion page -->

    <!--<script>
        -- >

        <
        !--gtag('event', 'conversion', {
            'send_to': 'AW-11221771829/_fFSCMqFo6wYELXM-uYp'
        });
        -- >

        <
        !--
    </script>-->

    <!-- Event snippet for WhatsApp - Google Ads conversion page -->

    <!--<script>
        -- >

        <
        !--gtag('event', 'conversion', {
            'send_to': 'AW-11221771829/jzvYCP-sp6wYELXM-uYp'
        });
        -- >

        <
        !--
    </script>-->

    <!-- Event snippet for Submit Lead Form | New LP conversion page -->

    <!--<script>
        -- >

        <
        !--gtag('event', 'conversion', {
            'send_to': 'AW-11221771829/Z_R5CLGrkYMZELXM-uYp'
        });
        -- >

        <
        !--
    </script>-->

    <!-- Event snippet for Rectified - Submit Lead Form conversion page -->

    <!--<script>
        -- >

        <
        !--gtag('event', 'conversion', {
            'send_to': 'AW-11221771829/Hh_4CMLZpcYZELXM-uYp'
        });
        -- >

        <
        !--
    </script>-->



    <!-- Event snippet for Google Ads Conversion (1) conversion page -->

    <!--<script>
        -- >

        <
        !--gtag('event', 'conversion', {
            'send_to': 'AW-11221771829/GkPDCN2S_MQbELXM-uYp'
        });
        -- >

        <
        !--
    </script>-->





    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':

                    new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],

                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =

                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);

        })(window, document, 'script', 'dataLayer', 'GTM-KWP372X');
    </script>

    <!-- End Google Tag Manager -->



</head>



<body>

    <!-- Google Tag Manager (noscript) -->

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KWP372X" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <!-- End Google Tag Manager (noscript) -->



    <header id="header" class="fixed-top">

        <nav class="navbar">

            <div class="container-fluid">

                <div class="d-flex align-items-center gap-3 head_social_wrapper">

                    <!-- Social icons -->

                    <div class="head_social">

                        <a href="https://www.linkedin.com/company/arc-3d-ae/" target="_blank" class="icon linkedin">

                            <svg width="32" height="33" viewBox="0 0 32 33" fill="none"
                                xmlns="http://www.w3.org/2000/svg">

                                <g clip-path="url(#clip0_1_2532)">

                                    <path
                                        d="M29.6313 0.5H2.3625C1.05625 0.5 0 1.53125 0 2.80625V30.1875C0 31.4625 1.05625 32.5 2.3625 32.5H29.6313C30.9375 32.5 32 31.4625 32 30.1938V2.80625C32 1.53125 30.9375 0.5 29.6313 0.5ZM9.49375 27.7687H4.74375V12.4937H9.49375V27.7687ZM7.11875 10.4125C5.59375 10.4125 4.3625 9.18125 4.3625 7.6625C4.3625 6.14375 5.59375 4.9125 7.11875 4.9125C8.6375 4.9125 9.86875 6.14375 9.86875 7.6625C9.86875 9.175 8.6375 10.4125 7.11875 10.4125ZM27.2687 27.7687H22.525V20.3438C22.525 18.575 22.4937 16.2937 20.0562 16.2937C17.5875 16.2937 17.2125 18.225 17.2125 20.2188V27.7687H12.475V12.4937H17.025V14.5813H17.0875C17.7188 13.3813 19.2688 12.1125 21.575 12.1125C26.3813 12.1125 27.2687 15.275 27.2687 19.3875V27.7687Z"
                                        fill="#005762"></path>

                                </g>

                                <defs>

                                    <clipPath id="clip0_1_2532">

                                        <rect width="32" height="32" fill="white"
                                            transform="translate(0 0.5)"></rect>

                                    </clipPath>

                                </defs>

                            </svg>

                            <!--<span class="tooltip">LinkedIn</span>-->

                        </a>

                        <a href="https://www.facebook.com/profile.php?id=100087950862002" target="_blank"
                            class="icon facebook">

                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33"
                                viewBox="0 0 32 33" fill="none">

                                <path
                                    d="M32 16.5C32 7.66344 24.8366 0.5 16 0.5C7.16344 0.5 0 7.66344 0 16.5C0 24.4859 5.85094 31.1053 13.5 32.3056V21.125H9.4375V16.5H13.5V12.975C13.5 8.965 15.8888 6.75 19.5434 6.75C21.2934 6.75 23.125 7.0625 23.125 7.0625V11H21.1075C19.12 11 18.5 12.2334 18.5 13.5V16.5H22.9375L22.2281 21.125H18.5V32.3056C26.1491 31.1053 32 24.4859 32 16.5Z"
                                    fill="#005762"></path>

                            </svg>

                            <!--<span class="tooltip">Facebook</span>-->

                        </a>



                        <a href="https://www.instagram.com/arc3d.ae/" target="_blank" class="icon instagram">

                            <svg width="32" height="33" viewBox="0 0 32 33" fill="none"
                                xmlns="http://www.w3.org/2000/svg">

                                <g clip-path="url(#clip0_1_2535)">

                                    <path
                                        d="M16 3.38125C20.275 3.38125 20.7813 3.4 22.4625 3.475C24.025 3.54375 24.8688 3.80625 25.4313 4.025C26.175 4.3125 26.7125 4.6625 27.2688 5.21875C27.8313 5.78125 28.175 6.3125 28.4625 7.05625C28.6813 7.61875 28.9438 8.46875 29.0125 10.025C29.0875 11.7125 29.1063 12.2188 29.1063 16.4875C29.1063 20.7625 29.0875 21.2688 29.0125 22.95C28.9438 24.5125 28.6813 25.3563 28.4625 25.9188C28.175 26.6625 27.825 27.2 27.2688 27.7563C26.7063 28.3188 26.175 28.6625 25.4313 28.95C24.8688 29.1688 24.0188 29.4313 22.4625 29.5C20.775 29.575 20.2688 29.5938 16 29.5938C11.725 29.5938 11.2188 29.575 9.5375 29.5C7.975 29.4313 7.13125 29.1688 6.56875 28.95C5.825 28.6625 5.2875 28.3125 4.73125 27.7563C4.16875 27.1938 3.825 26.6625 3.5375 25.9188C3.31875 25.3563 3.05625 24.5063 2.9875 22.95C2.9125 21.2625 2.89375 20.7563 2.89375 16.4875C2.89375 12.2125 2.9125 11.7063 2.9875 10.025C3.05625 8.4625 3.31875 7.61875 3.5375 7.05625C3.825 6.3125 4.175 5.775 4.73125 5.21875C5.29375 4.65625 5.825 4.3125 6.56875 4.025C7.13125 3.80625 7.98125 3.54375 9.5375 3.475C11.2188 3.4 11.725 3.38125 16 3.38125ZM16 0.5C11.6563 0.5 11.1125 0.51875 9.40625 0.59375C7.70625 0.66875 6.5375 0.94375 5.525 1.3375C4.46875 1.75 3.575 2.29375 2.6875 3.1875C1.79375 4.075 1.25 4.96875 0.8375 6.01875C0.44375 7.0375 0.16875 8.2 0.09375 9.9C0.01875 11.6125 0 12.1562 0 16.5C0 20.8438 0.01875 21.3875 0.09375 23.0938C0.16875 24.7938 0.44375 25.9625 0.8375 26.975C1.25 28.0313 1.79375 28.925 2.6875 29.8125C3.575 30.7 4.46875 31.25 5.51875 31.6562C6.5375 32.05 7.7 32.325 9.4 32.4C11.1063 32.475 11.65 32.4937 15.9938 32.4937C20.3375 32.4937 20.8813 32.475 22.5875 32.4C24.2875 32.325 25.4563 32.05 26.4688 31.6562C27.5188 31.25 28.4125 30.7 29.3 29.8125C30.1875 28.925 30.7375 28.0313 31.1438 26.9813C31.5375 25.9625 31.8125 24.8 31.8875 23.1C31.9625 21.3938 31.9813 20.85 31.9813 16.5063C31.9813 12.1625 31.9625 11.6188 31.8875 9.9125C31.8125 8.2125 31.5375 7.04375 31.1438 6.03125C30.75 4.96875 30.2063 4.075 29.3125 3.1875C28.425 2.3 27.5313 1.75 26.4813 1.34375C25.4625 0.95 24.3 0.675 22.6 0.6C20.8875 0.51875 20.3438 0.5 16 0.5Z"
                                        fill="#005762"></path>

                                    <path
                                        d="M16 8.28125C11.4625 8.28125 7.78125 11.9625 7.78125 16.5C7.78125 21.0375 11.4625 24.7188 16 24.7188C20.5375 24.7188 24.2188 21.0375 24.2188 16.5C24.2188 11.9625 20.5375 8.28125 16 8.28125ZM16 21.8313C13.0563 21.8313 10.6688 19.4438 10.6688 16.5C10.6688 13.5563 13.0563 11.1688 16 11.1688C18.9438 11.1688 21.3313 13.5563 21.3313 16.5C21.3313 19.4438 18.9438 21.8313 16 21.8313Z"
                                        fill="#005762"></path>

                                    <path
                                        d="M26.4625 7.95619C26.4625 9.01869 25.6 9.87494 24.5438 9.87494C23.4813 9.87494 22.625 9.01244 22.625 7.95619C22.625 6.89368 23.4875 6.03743 24.5438 6.03743C25.6 6.03743 26.4625 6.89994 26.4625 7.95619Z"
                                        fill="#005762"></path>

                                </g>

                                <defs>

                                    <clipPath id="clip0_1_2535">

                                        <rect width="32" height="32" fill="white"
                                            transform="translate(0 0.5)"></rect>

                                    </clipPath>

                                </defs>

                            </svg>

                            <!--<span class="tooltip">Instagram</span>-->

                        </a>

                        <a href="https://www.youtube.com/@Arc3dprinting/" target="_blank" class="icon youtube">

                            <svg width="32" height="33" viewBox="0 0 32 33" fill="none"
                                xmlns="http://www.w3.org/2000/svg">

                                <mask id="mask0_209_169" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0"
                                    y="0" width="32" height="33">

                                    <path d="M32 0.5H0V32.5H32V0.5Z" fill="white" />

                                </mask>

                                <g mask="url(#mask0_209_169)">

                                    <path
                                        d="M31.1813 8.8875C30.8188 7.3625 29.6375 6.18125 28.1125 5.81875C25.3375 5.1875 16 5.1875 16 5.1875C16 5.1875 6.6625 5.1875 3.8875 5.81875C2.3625 6.18125 1.18125 7.3625 0.81875 8.8875C0.1875 11.6625 0.1875 16.5 0.1875 16.5C0.1875 16.5 0.1875 21.3375 0.81875 24.1125C1.18125 25.6375 2.3625 26.8188 3.8875 27.1813C6.6625 27.8125 16 27.8125 16 27.8125C16 27.8125 25.3375 27.8125 28.1125 27.1813C29.6375 26.8188 30.8188 25.6375 31.1813 24.1125C31.8125 21.3375 31.8125 16.5 31.8125 16.5C31.8125 16.5 31.8125 11.6625 31.1813 8.8875Z"
                                        fill="#005762" />

                                    <path d="M12.6875 11.7812L20.7188 16.5L12.6875 21.2188V11.7812Z" fill="white" />

                                </g>

                            </svg>

                        </a>

                        <span class=" border-start border-dark">

                            <span class="invisible">i</span>

                        </span>

                        <span>

                            <img src="{{ asset('public/front/images/logo-miite.svg') }}" alt="make it Emirates"
                                class="img-fluid" style=" height: 35px; flex-shrink:0;">

                        </span>



                    </div>

                </div>

                <a class="navbar-brand" href="{{ route('front.home') }}">

                    <img src="{{ asset('public/front/images/head_logo.svg') }}" alt="Arc-3D"
                        class="img-fluid desk_logo">

                    <img src="{{ asset('public/front/images/mob_logo.svg') }}" alt="Arc-3D"
                        class="img-fluid toggle_logo">

                    <img src="{{ asset('public/front/images/mob_logo.svg') }}" alt="Arc-3D"
                        class="img-fluid mob_logo">

                </a>

                <div class="d-flex gap-2 align-items-center">

                    <!--<a href="#enquiryform" class="btn_0">Enquire Now <svg width="12" height="11"-->

                    <!--        viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">-->

                    <!--        <path d="M1 10.5L11 0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round" />-->

                    <!--        <path d="M2.11108 0.5H11V8.5" stroke="white" stroke-linecap="round"-->

                    <!--            stroke-linejoin="round" />-->

                    <!--    </svg>-->

                    <!--</a>-->





                    <!-- --------mega menu start ----------- -->



                    <div class="menu_main">

                        <span class="navbar-toggler menu_btn" aria-label="Toggle navigation">

                            <div class="svg-wrapper-1">

                                <div class="svg-wrapper">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                        viewBox="0 0 13 13" fill="none">

                                        <path d="M5 13H0V8H5V13ZM13 13H8V8H13V13ZM5 5H0V0H5V5ZM13 5H8V0H13V5Z"
                                            fill="currentColor"></path>

                                    </svg>

                                </div>

                            </div>

                            <span>Menu</span>

                        </span>



                        <div class="custom-offcanvas" data-bs-backdrop="false" id="myOffcanvas">

                            <div class="offcanvas-header">

                                <p class="title_48 blue_txt" style="visibility:hidden;">Main Menu</p>

                                <span class="close-offcanvas">&times;</span>

                            </div>

                            <div class="offcanvas-body">

                                <ul class="menu-items">

                                    <li class="has-submenu-about"><a href="{{ route('front.story') }}">About ></a>
                                    </li>
                                    <li class="has-submenu"><a href="{{ route('front.projects') }}">Services ></a>
                                    </li>
                                    <li class="has-submenu-tech"><a href="{{ route('front.printing') }}">Technologies
                                            ></a></li>

                                    <li><a href="{{ route('front.projects') }}">Projects</a></li>

                                    <li><a href="{{ route('front.blog_listing') }}">Blogs</a></li>

                                    @php

                                        use App\Models\Services;

                                        $services = Services::where('status', 'Active')->orderBy('id', 'Desc')->get();

                                    @endphp

                                    @foreach ($services as $service)
                                        @if ($service->title == 'Architectural Model Making')
                                            <li><a
                                                    href="{{ route('front.services', ['url' => $service->url]) }}">{{ $service->title }}</a>
                                            </li>
                                        @endif
                                    @endforeach

                                    <li><a href="{{ route('front.career') }}">Careers</a></li>

                                    <li><a href="{{ route('front.contact') }}">Contact Us</a></li>

                                </ul>

                                @php

                                    $exclude_slugs = config('global_values.exclude_service_slugs', []);

                                    $services = Services::where('status', 'Active')
                                        ->whereNotIn('url', $exclude_slugs)
                                        ->orderBy('id', 'Desc')
                                        ->get();
                                @endphp

                                <div class="sub_menu_wrapper">
                                    <span class="back-btn"><svg width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19 12H5M5 12L11 18M5 12L11 6" stroke="#333333" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>Back
                                    </span>

                                    <ul class="sub-menu-items">
                                        @foreach ($services as $service)
                                            @if ($service->title !== 'Architectural & Masterplan Scale Model')
                                                <li>
                                                    <a href="{{ route('front.services', ['url' => $service->url]) }}">
                                                        {{ $service->title }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>

                                </div>

                                <div class="sub_menu_wrapper2">

                                    <span class="back-btn-2"><svg width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">

                                            <path d="M19 12H5M5 12L11 18M5 12L11 6" stroke="#333333" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />

                                        </svg>

                                        Back</span>



                                    <ul class="sub-menu-items">

                                        @php

                                            use App\Models\Technologies;

                                            $Technologies = Technologies::where('status', 'Active')
                                                ->orderBy('id', 'Desc')
                                                ->get();

                                        @endphp



                                        @foreach ($Technologies as $technology)
                                            <li><a
                                                    href="{{ route('front.printing') }}#printing_{{ $technology->url }}">{{ $technology->shortname }}({{ $technology->fullname }})</a>
                                            </li>
                                        @endforeach

                                    </ul>

                                </div>

                                <div class="sub_menu_wrapper3">

                                    <span class="back-btn-3"><svg width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">

                                            <path d="M19 12H5M5 12L11 18M5 12L11 6" stroke="#333333" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />

                                        </svg>

                                        Back</span>



                                    <ul class="sub-menu-items">

                                        <li>

                                            <a href="{{ route('front.story') }}">Our Story</a>

                                        </li>

                                        <li>

                                            <a href="{{ route('front.our_team') }}">Team</a>

                                        </li>

                                        <li>

                                            <a href="{{ route('front.our_process') }}">Our Process</a>

                                        </li>

                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>



                    <!-- -------- maga menu end----------- -->



                </div>

            </div>

        </nav>

    </header>



    <script>
        const menuBtn = document.querySelector('.menu_btn');

        const offcanvas = document.getElementById('myOffcanvas');

        const closeBtn = document.querySelector('.close-offcanvas');

        const hasSubmenu = document.querySelector('.has-submenu');

        const hasSubmenutech = document.querySelector('.has-submenu-tech');

        const hasSubmenuabout = document.querySelector('.has-submenu-about');

        const subMenuWrapper = document.querySelector('.sub_menu_wrapper');

        const subMenuWrapper2 = document.querySelector('.sub_menu_wrapper2');

        const subMenuWrapper3 = document.querySelector('.sub_menu_wrapper3');

        const backBtn = document.querySelector('.back-btn');

        const backBtn2 = document.querySelector('.back-btn-2');

        const backBtn3 = document.querySelector('.back-btn-3');



        const mainMenu = document.querySelector('.menu-items');



        menuBtn.addEventListener('click', () => {

            offcanvas.classList.add('open');

        });



        // ✅ Close on Outside Click

        document.addEventListener('click', (event) => {

            // only close if offcanvas is open

            if (offcanvas.classList.contains('open')) {

                if (!offcanvas.contains(event.target) && !menuBtn.contains(event.target)) {

                    offcanvas.classList.remove('open');

                    resetMenus();

                }

            }

        });



        closeBtn.addEventListener('click', () => {

            offcanvas.classList.remove('open');

            // Reset to main menu

            subMenuWrapper.classList.remove('active');

            subMenuWrapper2.classList.remove('active');

            subMenuWrapper3.classList.remove('active');

            mainMenu.style.display = 'block';

        });



        hasSubmenu.addEventListener('click', (e) => {

            e.preventDefault();

            mainMenu.style.display = 'none';

            subMenuWrapper2.classList.remove('active');

            subMenuWrapper3.classList.remove('active');

            subMenuWrapper.classList.add('active');

            // 👉 sirf zarurat ho to subMenuWrapper2 open karo

            // subMenuWrapper2.classList.add('active');

        });



        hasSubmenutech.addEventListener('click', (e) => {

            e.preventDefault();

            mainMenu.style.display = 'none';

            // subMenuWrapper.classList.add('active');

            // 👉 sirf zarurat ho to subMenuWrapper2 open karo

            subMenuWrapper.classList.remove('active');

            subMenuWrapper3.classList.remove('active');

            subMenuWrapper2.classList.add('active');

        });



        hasSubmenuabout.addEventListener('click', (e) => {

            e.preventDefault();

            mainMenu.style.display = 'none';

            // subMenuWrapper.classList.add('active');

            // 👉 sirf zarurat ho to subMenuWrapper2 open karo

            subMenuWrapper.classList.remove('active');

            subMenuWrapper2.classList.remove('active');

            subMenuWrapper3.classList.add('active');

        });



        backBtn.addEventListener('click', () => {

            subMenuWrapper.classList.remove('active');

            // ❌ Ye hata do agar aap nahi chahte ki 2nd submenu close ho

            mainMenu.style.display = 'block';

        });



        backBtn2.addEventListener('click', () => {

            subMenuWrapper2.classList.remove('active');

            mainMenu.style.display = 'block';

        });



        backBtn3.addEventListener('click', () => {

            subMenuWrapper3.classList.remove('active');

            mainMenu.style.display = 'block';

        });
    </script>
