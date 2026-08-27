<Style>
    .WhatsAppButton {

        position: relative;

        transform: translate(120px, 0);

        width: 170px;

        overflow: hidden;

        background-color: #25d366;

        color: #fff;

        border-radius: 10px 0 0 10px;

        transition: all .5s ease-in-out;

        vertical-align: middle;

    }

    .float-buttons {

        position: fixed;

        top: 80%;

        right: 0;

        z-index: 900;

    }

    .WhatsAppButton i {

        font-size: 30px;

        color: #fff;

        line-height: 30px;

        margin-left: 4px;

        margin-right: 10px;

        padding: 10px;

        transform: rotate(0);

        transition: all .5s ease-in-out;

        text-align: center !important;

    }

    .WhatsAppButton a span {

        color: #fff;

        font-size: 15px;

        padding-top: 8px;

        padding-bottom: 10px;

        position: absolute;

        line-height: 16px;

        font-weight: bolder;

    }

    .WhatsAppButton:hover {

        color: #fff;

        background-color: #005762;

        transform: translate(0, 0);

    }
</Style>

<footer class="mt-100">

    <div class="container">

        <div class="ft_wrapper">

            <div class="ft_left">

                <div class="ft_top">

                    <img src="{{ asset('public/front/images/ft_logo.svg') }}" alt="ARC 3D logo" class="img-fluid">

                    <div class="ft_top_left">

                        <p>From architectural models to industrial-grade prototyping — we bring your visions to life

                            with precision, speed, and style.</p>

                        <div class="ft_social">

                            <a href="https://www.linkedin.com/company/arc-3d-ae/" target="_blank"
                                class="icon linkedin"><svg xmlns="http://www.w3.org/2000/svg" width="36"
                                    height="37" viewBox="0 0 36 37" fill="none">

                                    <path
                                        d="M33.3352 0.625977H2.65781C1.18828 0.625977 0 1.78613 0 3.22051V34.0244C0 35.4588 1.18828 36.626 2.65781 36.626H33.3352C34.8047 36.626 36 35.4588 36 34.0314V3.22051C36 1.78613 34.8047 0.625977 33.3352 0.625977ZM10.6805 31.3033H5.33672V14.1189H10.6805V31.3033ZM8.00859 11.7775C6.29297 11.7775 4.90781 10.3924 4.90781 8.68379C4.90781 6.9752 6.29297 5.59004 8.00859 5.59004C9.71719 5.59004 11.1023 6.9752 11.1023 8.68379C11.1023 10.3854 9.71719 11.7775 8.00859 11.7775ZM30.6773 31.3033H25.3406V22.9502C25.3406 20.9604 25.3055 18.3939 22.5633 18.3939C19.7859 18.3939 19.3641 20.5666 19.3641 22.8096V31.3033H14.0344V14.1189H19.1531V16.4674H19.2234C19.9336 15.1174 21.6773 13.69 24.2719 13.69C29.6789 13.69 30.6773 17.2479 30.6773 21.8744V31.3033V31.3033Z"
                                        fill="#005762" />

                                </svg>

                            </a>

                            <a href="https://www.facebook.com/profile.php?id=100087950862002" target="_blank"
                                class="icon facebook"><svg xmlns="http://www.w3.org/2000/svg" width="36"
                                    height="37" viewBox="0 0 36 37" fill="none">

                                    <path
                                        d="M36 18.626C36 8.68484 27.9411 0.625977 18 0.625977C8.05887 0.625977 0 8.68484 0 18.626C0 27.6102 6.5823 35.057 15.1875 36.4073V23.8291H10.6172V18.626H15.1875V14.6604C15.1875 10.1491 17.8748 7.65723 21.9864 7.65723C23.9551 7.65723 26.0156 8.00879 26.0156 8.00879V12.4385H23.7459C21.51 12.4385 20.8125 13.8261 20.8125 15.251V18.626H25.8047L25.0066 23.8291H20.8125V36.4073C29.4177 35.057 36 27.6102 36 18.626Z"
                                        fill="#005762" />

                                </svg>

                            </a>

                            <a href="https://www.instagram.com/arc3d.ae/" target="_blank" class="icon instagram">

                                <svg width="36" height="37" viewBox="0 0 36 37" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">

                                    <g clip-path="url(#clip0_1_7567)">

                                        <path
                                            d="M18 3.86738C22.8094 3.86738 23.3789 3.88848 25.2703 3.97285C27.0281 4.0502 27.9773 4.34551 28.6102 4.5916C29.4469 4.91504 30.0516 5.30879 30.6773 5.93457C31.3102 6.56738 31.6969 7.16504 32.0203 8.00176C32.2664 8.63457 32.5617 9.59082 32.6391 11.3416C32.7234 13.24 32.7445 13.8096 32.7445 18.6119C32.7445 23.4213 32.7234 23.9908 32.6391 25.8822C32.5617 27.64 32.2664 28.5893 32.0203 29.2221C31.6969 30.0588 31.3031 30.6635 30.6773 31.2893C30.0445 31.9221 29.4469 32.3088 28.6102 32.6322C27.9773 32.8783 27.0211 33.1736 25.2703 33.251C23.3719 33.3354 22.8023 33.3564 18 33.3564C13.1906 33.3564 12.6211 33.3354 10.7297 33.251C8.97188 33.1736 8.02266 32.8783 7.38984 32.6322C6.55313 32.3088 5.94844 31.915 5.32266 31.2893C4.68984 30.6564 4.30312 30.0588 3.97969 29.2221C3.73359 28.5893 3.43828 27.633 3.36094 25.8822C3.27656 23.9838 3.25547 23.4143 3.25547 18.6119C3.25547 13.8025 3.27656 13.233 3.36094 11.3416C3.43828 9.58379 3.73359 8.63457 3.97969 8.00176C4.30312 7.16504 4.69688 6.56035 5.32266 5.93457C5.95547 5.30176 6.55313 4.91504 7.38984 4.5916C8.02266 4.34551 8.97891 4.0502 10.7297 3.97285C12.6211 3.88848 13.1906 3.86738 18 3.86738ZM18 0.625977C13.1133 0.625977 12.5016 0.64707 10.582 0.731445C8.66953 0.81582 7.35469 1.1252 6.21563 1.56816C5.02734 2.03223 4.02188 2.64395 3.02344 3.64941C2.01797 4.64785 1.40625 5.65332 0.942188 6.83457C0.499219 7.98067 0.189844 9.28848 0.105469 11.201C0.0210938 13.1275 0 13.7393 0 18.626C0 23.5127 0.0210938 24.1244 0.105469 26.0439C0.189844 27.9564 0.499219 29.2713 0.942188 30.4104C1.40625 31.5986 2.01797 32.6041 3.02344 33.6025C4.02188 34.601 5.02734 35.2197 6.20859 35.6768C7.35469 36.1197 8.6625 36.4291 10.575 36.5135C12.4945 36.5979 13.1062 36.6189 17.993 36.6189C22.8797 36.6189 23.4914 36.5979 25.4109 36.5135C27.3234 36.4291 28.6383 36.1197 29.7773 35.6768C30.9586 35.2197 31.9641 34.601 32.9625 33.6025C33.9609 32.6041 34.5797 31.5986 35.0367 30.4174C35.4797 29.2713 35.7891 27.9635 35.8734 26.051C35.9578 24.1314 35.9789 23.5197 35.9789 18.633C35.9789 13.7463 35.9578 13.1346 35.8734 11.215C35.7891 9.30254 35.4797 7.9877 35.0367 6.84863C34.5938 5.65332 33.982 4.64785 32.9766 3.64941C31.9781 2.65098 30.9727 2.03223 29.7914 1.5752C28.6453 1.13223 27.3375 0.822852 25.425 0.738477C23.4984 0.64707 22.8867 0.625977 18 0.625977Z"
                                            fill="#005762" />

                                        <path
                                            d="M18 9.37988C12.8953 9.37988 8.75391 13.5213 8.75391 18.626C8.75391 23.7307 12.8953 27.8721 18 27.8721C23.1047 27.8721 27.2461 23.7307 27.2461 18.626C27.2461 13.5213 23.1047 9.37988 18 9.37988ZM18 24.6236C14.6883 24.6236 12.0023 21.9377 12.0023 18.626C12.0023 15.3143 14.6883 12.6283 18 12.6283C21.3117 12.6283 23.9977 15.3143 23.9977 18.626C23.9977 21.9377 21.3117 24.6236 18 24.6236Z"
                                            fill="#005762" />

                                        <path
                                            d="M29.7703 9.01407C29.7703 10.2094 28.8 11.1727 27.6117 11.1727C26.4164 11.1727 25.4531 10.2023 25.4531 9.01407C25.4531 7.81875 26.4234 6.85547 27.6117 6.85547C28.8 6.85547 29.7703 7.82578 29.7703 9.01407Z"
                                            fill="#005762" />

                                    </g>

                                    <defs>

                                        <clipPath id="clip0_1_7567">

                                            <rect width="36" height="36" fill="white"
                                                transform="translate(0 0.625977)" />

                                        </clipPath>

                                    </defs>

                                </svg>

                            </a>

                            <a href="https://www.youtube.com/@Arc3dprinting/" target="_blank" class="icon">

                                <svg width="32" height="33" viewBox="0 0 32 33" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">

                                    <mask id="mask0_209_169" style="mask-type:luminance" maskUnits="userSpaceOnUse"
                                        x="0" y="0" width="32" height="33">

                                        <path d="M32 0.5H0V32.5H32V0.5Z" fill="white" />

                                    </mask>

                                    <g mask="url(#mask0_209_169)">

                                        <path
                                            d="M31.1813 8.8875C30.8188 7.3625 29.6375 6.18125 28.1125 5.81875C25.3375 5.1875 16 5.1875 16 5.1875C16 5.1875 6.6625 5.1875 3.8875 5.81875C2.3625 6.18125 1.18125 7.3625 0.81875 8.8875C0.1875 11.6625 0.1875 16.5 0.1875 16.5C0.1875 16.5 0.1875 21.3375 0.81875 24.1125C1.18125 25.6375 2.3625 26.8188 3.8875 27.1813C6.6625 27.8125 16 27.8125 16 27.8125C16 27.8125 25.3375 27.8125 28.1125 27.1813C29.6375 26.8188 30.8188 25.6375 31.1813 24.1125C31.8125 21.3375 31.8125 16.5 31.8125 16.5C31.8125 16.5 31.8125 11.6625 31.1813 8.8875Z"
                                            fill="#005762" />

                                        <path d="M12.6875 11.7812L20.7188 16.5L12.6875 21.2188V11.7812Z"
                                            fill="white" />

                                    </g>

                                </svg>



                            </a>

                        </div>

                    </div>

                </div>

                <div class=" ym_cpy ym_desk">

                    <p class="mb-0">© <?php echo date('Y'); ?>, ARC 3D. All Rights Reserved.</p>

                    <div class="d-flex gap-2">

                        <a href="{{ route('front.terms') }}" class="ct_a">Terms & Conditions</a>

                        <a href="{{ route('front.privacy') }}" class="ct_a">Privacy Policy</a>

                    </div>

                </div>

            </div>

            <div class=" ft_right">

                <div class="ft_menu d-flex justify-content-between">

                    <div>

                        <p class="ft_head">Quick Links</p>

                        <ul class="ft_list">

                            <li><a href="{{ route('front.home') }}">Home</a></li>

                            <!--<li><a href="javascript:void(0);">Industries</a></li>-->

                            <li><a href="{{ route('front.projects') }}">Projects</a></li>

                            <li><a href="{{ route('front.blog_listing') }}">Blogs</a></li>

                            <li><a href="{{ route('front.career') }}">Careers</a></li>

                            <li><a href="{{ route('front.contact') }}">Contact Us</a></li>

                        </ul>

                    </div>

                    <div class="mob_about d-block d-md-none">

                        <p class="ft_head">About</p>

                        <ul class="ft_list">

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

                @php

                    use App\Models\Technologies;

                    $Technologies = Technologies::where('status', 'Active')->orderBy('id', 'Desc')->get();

                @endphp

                <div class="ft_menu d-flex justify-content-between">

                    <div>

                        @php
                            use App\Models\Services;

                            $exclude_slugs = config('global_values.exclude_service_slugs', []);

                            $services = Services::where('status', 'Active')
                                ->whereNotIn('url', $exclude_slugs)
                                ->orderBy('id', 'Desc')
                                ->get();
                        @endphp

                        <p class="ft_head">Services</p>

                        <ul class="ft_list">
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



                    <!--<div class="d-md-none">-->

                    <!--    <h4 class="ft_head">Technologies</h4>-->





                    <!--    <ul class="ft_list mb-3">-->



                    <!--         @foreach ($Technologies as $technology)
-->

                    <!--            <li><a href="{{ route('front.printing') }}#printing_{{ $technology->url }}">{{ $technology->shortname }}({{ $technology->fullname }})</a></li>-->

                    <!--
@endforeach-->



                    <!--    </ul>-->

                    <!--</div>-->

                </div>

                <div class="ft_menu">

                    <div class=" d-md-block">

                        <p class="ft_head">Technologies</p>

                        <ul class="ft_list mb-3">



                            @foreach ($Technologies as $technology)
                                <li><a
                                        href="{{ route('front.printing') }}#printing_{{ $technology->url }}">{{ $technology->shortname }}({{ $technology->fullname }})</a>
                                </li>
                            @endforeach



                        </ul>

                    </div>

                    <div class="desk_about d-none d-md-block">

                        <p class="ft_head">About</p>

                        <ul class="ft_list">

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

        <div class=" ym_cpy ym_mob">

            <p class="mb-0">© <?php echo date('Y'); ?>, ARC 3D. All Rights Reserved.</p>

            <div class="d-flex gap-2">

                <a href="{{ route('front.terms') }}">Terms & Conditions</a>

                <a href="{{ route('front.privacy') }}">Privacy Policy</a>

            </div>

        </div>

        <div class="ft_bottom d-none d-mb-block" data-aos="zoom-in" data-aos-duration="800">

            <img src="{{ asset('public/front/images/ft_bottom.svg') }}" alt="Footer design graphic"
                class="img-fluid">

        </div>

        <div class="ft_bottom d-mb-none">

            <img src="{{ asset('public/front/images/ft_bottom.svg') }}" alt="Footer design graphic"
                class="img-fluid">

        </div>

    </div>

</footer>



<a href="{{ route('front.contact') }}#Inquiry_jump" class="btn_0 Inquiry_jump">Enquiry</a>



<!--<div class="float-buttons">-->

<!--        <div class="WhatsAppButton"> -->

<!--            <a href="https://api.whatsapp.com/send?phone=971542797571&text=Hello,%20I%27m%20visiting%20your%20website%20and%20would%20like%20to%20know%20more" id="whatsapp" rel="nofollow" target="_blank"> -->

<!--                <i class="fab fa-whatsapp"></i>-->

<!--                <span>WhatsApp<br><small>971542797571</small></span>-->

<!--             </a>-->

<!--        </div>-->

<!--    </div>-->





<!-----------------------------------------whatsapp button start-------------------->



<style>
    .Whats_mpp_modal .popup-box_whatsapp {

        border-radius: 16px;

    }

    .Whats_mpp_modal .popup-header {

        background: #005762;

        color: #fff;

        padding: 15px 20px;

    }

    .Whats_mpp_modal .popup-header h5 {

        margin: 0;

        font-weight: 600;

    }

    .Whats_mpp_modal .white-close {

        filter: invert(1);

    }

    .Whats_mpp_modal .popup-box_whatsapp .modal-body {

        padding: 25px;

    }

    .Whats_mpp_modal .popup-input {

        border-radius: 12px;

        height: 50px;

        border: 1px solid #ddd;

        box-shadow: none !important;

    }

    .Whats_mpp_modal .popup-input:focus {

        border-color: #005762;

    }

    .Whats_mpp_modal textarea.popup-input {

        height: 90px;

    }

    .Whats_mpp_modal .popup-btn {

        background: #005762;

        color: #fff;

        height: 50px;

        border-radius: 12px;

        font-weight: 600;

        border: none;

    }

    .popup-btn .btn-spinner {
        display: inline-block;
        width: 16px;
        height: 16px;
        border: 2px solid rgba(255, 255, 255, 0.4);
        border-top-color: #fff;
        border-radius: 50%;
        animation: btnSpin 0.7s linear infinite;
        margin-right: 8px;
        vertical-align: middle;
    }

    @keyframes btnSpin {
        to {
            transform: rotate(360deg);
        }
    }


    .Whats_mpp_modal .popup-btn:hover {

        background: #005762;

        color: #fff;

    }

    .Whats_mpp_modal .iti {

        width: 100%;

    }

    .Whats_mpp_modal .iti__selected-flag {

        border-radius: 10px 0 0 10px;

    }

    .Whats_mpp_modal .modal-dialog {

        max-width: 420px;

    }

    .WhatsAppButton_mpp {

        background: #14a614;

        position: fixed;

        bottom: 35px;

        right: 0px;

        z-index: 9999;

        width: 45px;

        height: 45px;

        border-radius: 5px 0 0 5px;

        cursor: pointer;

        animation: pulse 1.5s infinite;

    }

    @keyframes pulse {

        0% {
            box-shadow: 0 0 0 0 rgba(20, 166, 20, 0.7);
        }

        70% {
            box-shadow: 0 0 0 15px rgba(20, 166, 20, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(20, 166, 20, 0);
        }

    }

    .WhatsAppButton_mpp img {

        width: 100%;

        height: 100%;

    }

    .is-invalid {

        border: 1px solid red !important;

    }

    .error-message {

        font-size: 13px;

    }

    .error {

        color: red;

        font-size: 13px;

    }
</style>

<!-- Call Floating Button -->
<div class="CallButton_mpp">
    <a href="tel:+971542797571" aria-label="Call Us">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M22 16.92V20a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 11.19 19
            19.5 19.5 0 0 1 5 12.81 19.8 19.8 0 0 1 2 4.18 2 2 0 0 1 4 2h3
            a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09
            9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57
            2.81.7A2 2 0 0 1 22 16.92Z" stroke="#fff" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </a>
</div>

<style>
    .CallButton_mpp {
        background: #005762;
        position: fixed;
        bottom: 90px;
        right: 0;
        z-index: 9999;
        width: 45px;
        height: 45px;
        border-radius: 5px 0 0 5px;
        cursor: pointer;
        animation: pulseCall 1.5s infinite;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .CallButton_mpp a {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .CallButton_mpp svg {
        width: 22px;
        height: 22px;
    }

    @keyframes pulseCall {
        0% {
            box-shadow: 0 0 0 0 rgba(0, 87, 98, 0.7);
        }

        70% {
            box-shadow: 0 0 0 15px rgba(0, 87, 98, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(0, 87, 98, 0);
        }
    }
</style>

<!-- Modal -->

<div class="modal fade Whats_mpp_modal" id="exampleModal-4" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content popup-box popup-box_whatsapp">



            <!-- HEADER -->

            <div class="modal-header popup-header">

                <h5>Chat with us on WhatsApp</h5>

                <button type="button" class="btn-close white-close" data-bs-dismiss="modal"></button>

            </div>



            <!-- BODY -->

            <div class="modal-body">

                <form method="POST" action="{{ route('whatsaapinquiry') }}" id="whatsappForm">

                    @csrf



                    <!-- Message (optional) -->

                    <div class="mb-3">

                        <label class="form-label">Message</label>

                        <textarea class="form-control popup-input" id="wa_message" name="message" placeholder="Type your message"></textarea>

                    </div>



                    <!-- Honeypot (hidden from users) -->

                    <div style="display:none;">

                        <input type="text" name="website_honey_point" id="wa_website_honey_point">

                    </div>



                    <!-- Phone (required) -->

                    <!--<div class="mb-3">-->

                    <!--    <label class="form-label">Contact No. <span class="text-danger">*</span></label>-->

                    <!--    <input type="tel" id="wa_phone" class="form-control popup-input"-->

                    <!--        oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,15);">-->

                    <!--    <small class="text-danger error-message" id="wa_phone_error"></small>-->

                    <!-- Hidden fields -->

                    <!--    <input type="hidden" name="number" id="wa_full_phone">-->

                    <!--    <input type="hidden" name="country" id="wa_country_name">-->

                    <!--</div>-->

                    <!-- Phone (required) -->

                    <div class="mb-3">

                        <label class="form-label">Contact No. <span class="text-danger">*</span></label>

                        <input type="tel" name="wa_phone" id="wa_phone" class="form-control popup-input"
                            oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,15);">

                        <small class="text-danger error-message" id="wa_phone_error"></small>

                        <!-- Hidden fields -->

                        <input type="hidden" name="number" id="wa_full_phone">

                        <input type="hidden" name="country" id="wa_country_name">

                    </div>



                    <div class="d-grid">

                        <button type="submit" id="submitbtn" class="btn popup-btn">

                            Start Chat with Us

                        </button>

                    </div>



                </form>

            </div>



        </div>

    </div>

</div>



<!-- WhatsApp Floating Button -->

<div class="WhatsAppButton_mpp">

    <a data-bs-toggle="modal" data-bs-target="#exampleModal-4">

        <img src="{{ asset('public/front/images/whatsapp.png') }}" alt="whatsapp">

    </a>

</div>



<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
    integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/additional-methods.min.js"
    integrity="sha512-owaCKNpctt4R4oShUTTraMPFKQWG9UdWTtG6GRzBjFV4VypcFi6+M3yc4Jk85s3ioQmkYWJbUl1b2b2r41RTjA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/js/intlTelInput.min.js"></script>



<script>
    // URL validation

    $.validator.addMethod("noUrl", function(value, element) {

        return this.optional(element) || !/(https?:\/\/|www\.)/i.test(value);

    }, "Links are not allowed in message.");



    // Cyrillic / Russian character validation

    $.validator.addMethod("noCyrillic", function(value, element) {

        return this.optional(element) || !/[А-Яа-яЁё]/u.test(value);

    }, "Invalid characters detected.");



    // Spam keyword validation

    $.validator.addMethod("noSpamWords", function(value, element) {

        let spamWords = [

            'seo',

            'crypto',

            'viagra',

            'casino',

            'furniture',

            'wholesale'

        ];

        let lowerValue = value.toLowerCase();

        for (let i = 0; i < spamWords.length; i++) {

            if (lowerValue.includes(spamWords[i])) {

                return false;

            }

        }

        return true;

    }, "Spam content detected.");



    $.validator.addMethod("noHtml", function(value, element) {

        return this.optional(element) || !(/<[^>]*>/g.test(value));

    }, "HTML tags are not allowed.");



    // Minimum form submit time validation

    $.validator.addMethod("minSubmitTime", function(value, element) {

        let formTime = parseInt($('input[name="form_time"]').val());

        let currentTime = Math.floor(Date.now() / 1000);

        return (currentTime - formTime) >= 5;

    }, "Please wait a few seconds before submitting.");



    document.addEventListener("DOMContentLoaded", function() {



        // ── intl-tel-input setup ──

        const input = document.querySelector("#wa_phone", "#phone_code");

        const fullPhone = document.querySelector("#wa_full_phone");

        const countryName = document.querySelector("#wa_country_name");



        const iti = window.intlTelInput(input, {

            initialCountry: "ae",

            separateDialCode: true,

            preferredCountries: ["ae", "in", "us", "gb"],

            geoIpLookup: function(callback) {

                fetch("https://ipapi.co/json/")

                    .then(res => res.json())

                    .then(data => callback(data.country_code))

                    .catch(() => callback("in"));

            },

            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/js/utils.js",

        });



        // ── Form submit ──

        // $('#whatsappForm').on('submit', function (e) {

        //     e.preventDefault(); // stop normal page reload



        //     // Clear old errors

        //     $('#wa_phone_error').text('');

        //     $('#wa_phone').removeClass('is-invalid');



        //     let phone = $('#wa_phone').val().trim();



        //     // Validate: phone is required

        //     // if (phone === '') {

        //     //     $('#wa_phone_error').text('Contact number is required.');

        //     //     $('#wa_phone').addClass('is-invalid');

        //     //     return;

        //     // }

        //     // Validate: phone is required + min 10 digits + max 15 digits

        //     if (phone === '') {

        //         $('#wa_phone_error').text('Contact number is required.');

        //         $('#wa_phone').addClass('is-invalid');

        //         return;

        //     }



        //     if (phone.length < 10) {

        //         $('#wa_phone_error').text('Contact number must be at least 10 digits.');

        //         $('#wa_phone').addClass('is-invalid');

        //         return;

        //     }



        //     if (phone.length > 15) {

        //         $('#wa_phone_error').text('Contact number must not exceed 15 digits.');

        //         $('#wa_phone').addClass('is-invalid');

        //         return;

        //     }



        //     // Build full phone with dial code

        //     const countryData = iti.getSelectedCountryData();

        //     fullPhone.value  = "+" + countryData.dialCode + phone;

        //     countryName.value = countryData.name;



        //     $("#submitbtn").prop("disabled", true).text("Submitting...");



        //     // Open blank tab NOW (synchronous = bypasses popup blocker)

        //     // Show loading in the new tab instead of about:blank

        //         const newTab = window.open('', '_blank');

        //         newTab.document.write(`

        //             <html>

        //             <head><title>Connecting to WhatsApp...</title></head>

        //             <body style="

        //                 margin:0;

        //                 display:flex;

        //                 align-items:center;

        //                 justify-content:center;

        //                 height:100vh;

        //                 background:#f0f0f0;

        //                 font-family:sans-serif;

        //                 flex-direction:column;

        //                 gap:15px;

        //             ">

        //                 <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" width="60" />

        //                 <p style="font-size:18px;color:#005762;font-weight:600;margin:0;">

        //                     Connecting to WhatsApp...

        //                 </p>

        //             </body>

        //             </html>

        //         `);



        //         // AJAX submit to Laravel

        //         $.ajax({

        //             url: $('#whatsappForm').attr('action'),

        //             method: 'POST',

        //             data: $('#whatsappForm').serialize(),

        //             success: function () {

        //                 const waNumber  = '971542797571';

        //                 const waMessage = 'Inquiry from the website.';

        //                 const waUrl     = 'https://api.whatsapp.com/send/?phone=' + waNumber + '&text=' + encodeURIComponent(waMessage);



        //                 newTab.location.href = waUrl;



        //                 $('#whatsappForm')[0].reset();

        //                 $('#exampleModal-4').modal('hide');

        //                 $("#submitbtn").prop("disabled", false).text("Start Chat with Us");

        //             },

        //             error: function () {

        //                 newTab.close();

        //                 alert('Something went wrong. Please try again.');

        //                 $("#submitbtn").prop("disabled", false).text("Start Chat with Us");

        //             }

        //         });

        // });



        // WhatsApp Form New Validation

        $("#whatsappForm").validate({

            rules: {

                wa_phone: {

                    required: true,

                    digits: true,

                    minlength: 10,

                    maxlength: 15

                },

                message: {

                    noUrl: true,

                    noCyrillic: true,

                    noSpamWords: true,

                    noHtml: true,

                    // minSubmitTime: true

                }

            },



            messages: {

                wa_phone: {

                    required: "Contact number is required.",

                    digits: "Please enter only digits.",

                    minlength: "Contact number must be at least 10 digits.",

                    maxlength: "Contact number must not exceed 15 digits."

                }

            },



            errorPlacement: function(error, element) {

                // Place error inside your custom error div

                if (element.attr("name") === "wa_phone") {

                    error.appendTo("#wa_phone_error");

                } else {

                    error.insertAfter(element);

                }

            },



            highlight: function(element) {

                $(element).addClass('is-invalid');

            },



            unhighlight: function(element) {

                $(element).removeClass('is-invalid');

            },



            submitHandler: function(form) {



                // Clear old errors

                $('#wa_phone_error').text('');

                $('#wa_phone').removeClass('is-invalid');



                let phone = $('#wa_phone').val().trim();



                // Build full phone with dial code

                const countryData = iti.getSelectedCountryData();

                fullPhone.value = "+" + countryData.dialCode + phone;

                countryName.value = countryData.name;



                // $("#submitbtn").prop("disabled", true).text("Submitting...");

                $("#submitbtn").prop("disabled", true).html(
                    '<span class="btn-spinner"></span>Connecting to WhatsApp...');
                // Open blank tab NOW (synchronous = bypasses popup blocker)

                // Show loading in the new tab instead of about:blank

                const newTab = window.open('', '_blank');

                newTab.document.write(`

                <html>

                <head><title>Connecting to WhatsApp...</title></head>

                <body style="

                    margin:0;

                    display:flex;

                    align-items:center;

                    justify-content:center;

                    height:100vh;

                    background:#f0f0f0;

                    font-family:sans-serif;

                    flex-direction:column;

                    gap:15px;

                ">

                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" width="60" />

                    <p style="font-size:18px;color:#005762;font-weight:600;margin:0;">

                        Connecting to WhatsApp...

                    </p>

                </body>

                </html>

            `);



                // AJAX submit to Laravel

                $.ajax({

                    url: $('#whatsappForm').attr('action'),

                    method: 'POST',

                    data: $('#whatsappForm').serialize(),

                    success: function() {

                        const waNumber = '971542797571';

                        const waMessage = 'Inquiry from the website.';

                        const waUrl = 'https://api.whatsapp.com/send/?phone=' +
                            waNumber + '&text=' + encodeURIComponent(waMessage);



                        newTab.location.href = waUrl;



                        $('#whatsappForm')[0].reset();

                        $('#exampleModal-4').modal('hide');

                        $("#submitbtn").prop("disabled", false).text(
                            "Start Chat with Us");

                    },

                    error: function() {

                        newTab.close();

                        alert('Something went wrong. Please try again.');

                        $("#submitbtn").prop("disabled", false).text(
                            "Start Chat with Us");

                    }

                });

            }

        });



        // ── Remove error while typing ──

        $('#wa_phone').on('input', function() {

            if ($(this).val().trim() !== '') {

                $('#wa_phone_error').text('');

                $(this).removeClass('is-invalid');

            }

        });



    });
</script>



<!----------------------------------------------whatsapp button end------------------------>







<!--<script src=" https://code.jquery.com/jquery-3.7.1.min.js" -->

<!--    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous" ></script>-->



<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
    integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/additional-methods.min.js"
    integrity="sha512-owaCKNpctt4R4oShUTTraMPFKQWG9UdWTtG6GRzBjFV4VypcFi6+M3yc4Jk85s3ioQmkYWJbUl1b2b2r41RTjA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->



<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<!-- bootstrap links -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"
    integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<!-- aos -->

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>



<script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>



<script src="{{ asset('public/front/js/script.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/js/intlTelInput.min.js"></script>

<script>
    AOS.init();
</script>



</body>



</html>
