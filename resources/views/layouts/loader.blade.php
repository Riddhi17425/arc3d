<style>
 .loader-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: #111;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease-out;
        }

        .loader-container.fade-out {
            opacity: 0;
            pointer-events: none;
        }

        .logo svg {
            width: 220px;
            height: auto;
            animation: scaleUp 0.8s ease-out forwards;
            transform: scale(0);
        }

        /* Scale up animation for entire SVG */
        @keyframes scaleUp {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Hide rainbow initially */
        #rainbow {
            opacity: 0;
        }

        /* Rainbow paths draw animation */
        #rainbow path {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: drawPath 1.5s ease-out forwards;
            animation-delay: 0.8s;
            stroke: url(#paint2_linear_4_232);
            stroke-width: 2;
            opacity: 1;
        }

        /* Show rainbow group after scale animation */
        #rainbow {
            animation: showRainbow 0s linear forwards;
            animation-delay: 0.8s;
        }

        @keyframes showRainbow {
            to {
                opacity: 1;
            }
        }

        #rainbow path:nth-child(2) {
            stroke: url(#paint3_linear_4_232);
            animation-delay: 1s;
        }

        #rainbow path:nth-child(3) {
            stroke: url(#paint4_linear_4_232);
            animation-delay: 1.2s;
        }

        #rainbow path:nth-child(4) {
            stroke: url(#paint5_linear_4_232);
            animation-delay: 1.4s;
        }

        /* Draw path animation */
        @keyframes drawPath {
            0% {
                stroke-dashoffset: 1000;
                fill-opacity: 0;
            }
            50% {
                fill-opacity: 0;
            }
            100% {
                stroke-dashoffset: 0;
                fill-opacity: 1;
            }
        }

</style>
<div class="loader-container" id="loader">
        <div class="logo">
            <svg width="135" height="100" viewBox="0 0 135 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="Group 1000001857">
                    <g id="Group 1000001861">
                        <path id="Vector" fill-rule="evenodd" clip-rule="evenodd" d="M77.5543 0.0783338V35.2057C80.8969 35.6426 84.2056 36.3062 87.4679 37.1883V9.92812C92.1796 9.92812 99.9677 9.5879 106.48 10.2011C126.079 12.0451 127.118 38.755 105.694 44.8161C109.133 46.8239 112.387 49.0921 115.434 51.5829C138.739 37.7806 135.295 3.23279 107.718 0.641179C98.3492 -0.236691 84.8817 0.0237294 77.5543 0.0783338Z" fill="url(#paint0_linear_4_232)"/>
                        <path id="Vector_2" fill-rule="evenodd" clip-rule="evenodd" d="M67.3132 99.6686H76.68L59.346 55.3969C56.4078 55.8261 53.5329 56.4891 50.7507 57.373L67.3132 99.6686ZM51.9352 36.4823C49.0519 37.0899 46.2317 37.8676 43.4748 38.7982L37.6491 23.9206L29.2603 45.3425C24.2776 48.3087 19.6533 51.8401 15.48 55.8601L37.6491 0L51.9352 36.4865V36.4823Z" fill="url(#paint1_linear_4_232)"/>
                    </g>
                    <g id="rainbow">
                        <path id="Vector_3" fill-rule="evenodd" clip-rule="evenodd" d="M124.232 99.6682C119.129 71.1152 97.2081 49.4596 67.5 49.4596C37.7918 49.4596 15.8706 71.1152 10.7682 99.6682L6.73712 94.6888C13.5036 65.682 36.6358 43.7139 67.2374 43.7139C97.8391 43.7139 121.492 65.682 128.263 94.6888L124.232 99.6682Z" fill="url(#paint2_linear_4_232)"/>
                        <path id="Vector_4" fill-rule="evenodd" clip-rule="evenodd" d="M6.53905 94.6831C13.3276 65.6412 36.7944 44.3281 67.5 44.3281C98.2056 44.3281 121.672 65.6412 128.461 94.6831L134.383 99.6685C129.153 65.5041 102.823 39.3428 67.5 39.3428C32.1766 39.3428 5.84235 65.4998 0.617126 99.6642L6.53905 94.6788V94.6831Z" fill="url(#paint3_linear_4_232)"/>
                        <path id="Vector_5" fill-rule="evenodd" clip-rule="evenodd" d="M123.891 99.6686H134.383L128.151 94.4229L123.891 99.6686Z" fill="url(#paint4_linear_4_232)"/>
                        <path id="Vector_6" fill-rule="evenodd" clip-rule="evenodd" d="M0.617126 99.6686H11.1086L6.85116 94.4229L0.617126 99.6686Z" fill="url(#paint5_linear_4_232)"/>
                    </g>
                </g>
                <defs>
                    <linearGradient id="paint0_linear_4_232" x1="104.219" y1="0.229546" x2="104.219" y2="51.5871" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#00646E"/>
                        <stop offset="1" stop-color="#004C4B"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_4_232" x1="46.08" y1="0" x2="46.08" y2="99.6686" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#00646E"/>
                        <stop offset="1" stop-color="#004C4B"/>
                    </linearGradient>
                    <linearGradient id="paint2_linear_4_232" x1="128.263" y1="71.6931" x2="6.73712" y2="71.6931" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#E1AD1A"/>
                        <stop offset="1" stop-color="#AD141C"/>
                    </linearGradient>
                    <linearGradient id="paint3_linear_4_232" x1="0.617126" y1="69.5035" x2="134.379" y2="69.5035" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#E1AD1A"/>
                        <stop offset="1" stop-color="#B4151F"/>
                    </linearGradient>
                    <linearGradient id="paint4_linear_4_232" x1="123.891" y1="97.0457" x2="134.383" y2="97.0457" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#E1AD1A"/>
                        <stop offset="1" stop-color="#B2151D"/>
                    </linearGradient>
                    <linearGradient id="paint5_linear_4_232" x1="0.617126" y1="-6.29757" x2="11.1041" y2="-6.29757" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#E1AD1A"/>
                        <stop offset="1" stop-color="#B2151D"/>
                    </linearGradient>
                </defs>
            </svg>
        </div>
    </div>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const loader = document.getElementById('loader');
            const mainContent = document.getElementById('mainContent');

            // Hide the loader and show main content after animation completes
            setTimeout(() => {
                loader.classList.add('fade-out');

                // Show main content after loader fades out
                setTimeout(() => {
                    mainContent.classList.add('show');
                }, 50);
            }, 3500); // 3 seconds for the logo animation
        });
    </script>