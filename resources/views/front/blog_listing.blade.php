@include('layouts.frontheader')
<style>
    .tech_slide{
        display: flex;
    flex-direction: column;
    height: 100%;
     background: var(--eee-gray);
     border-bottom-left-radius: 10px;
     border-bottom-right-radius: 10px;
    }
</style>
<section class="banner">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <h1 class="title_48">
          <span class="blue_txt">Blogs:</span>
          <br>Insights, Innovations & Industry Trends
        </h1>
        <div class="banner_para">
          <p>Explore our latest blogs featuring expert insights, design inspirations, technology trends, and project highlights. Stay informed about what’s shaping the future of our industry — from creative ideas and sustainability practices to cutting-edge 3D printing, product design, and digital transformation.</p>
        </div>
        <a href="{{ route('front.contact') }}" class="btn_0">Contact Us <svg width="12" height="11" viewBox="0 0 12 11"
            fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 10.5L11 0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M2.11108 0.5H11V8.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </a> 
      </div>
      <div class="col-lg-6">
        <div class="pc_banner_wrapper">
          <img src="{{asset('public/front/images/blog_list_banner.png')}}" alt="blog" class="img-fluid">
        </div>
      </div>
    </div>
  </div> 
</section>
<section class="mt-100">
    <div class="container">
        <div class="row blog_wrapper">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 mb-4"> 
                    <!--<div >-->
                            <a class="tech_slide" href="{{ route('front.blog_detail', ['url' => $blog->url]) }}">
                                <div class="tech_icon">
                                    <img src="{{ asset('public/admin/blogs/front_image/' . $blog->front_image) }}" alt="{{ $blog->front_image_alt }}" class="img-fluid w-100">
                                </div>
                                <div class="tech_des" style="flex-direction:column">
                                    <div class="date-after">
                           
                                
                                
                            
                            <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none" class="me-1">
                              <path d="M4 8.5H20M4 8.5V17.3002C4 18.4203 4 18.9801 4.21799 19.4079C4.40973 19.7842 4.71547 20.0905 5.0918 20.2822C5.5192 20.5 6.07899 20.5 7.19691 20.5H16.8031C17.921 20.5 18.48 20.5 18.9074 20.2822C19.2837 20.0905 19.5905 19.7842 19.7822 19.4079C20 18.9805 20 18.4215 20 17.3036V8.5M4 8.5V7.7002C4 6.58009 4 6.01962 4.21799 5.5918C4.40973 5.21547 4.71547 4.90973 5.0918 4.71799C5.51962 4.5 6.08009 4.5 7.2002 4.5H8M20 8.5V7.69691C20 6.57899 20 6.0192 19.7822 5.5918C19.5905 5.21547 19.2837 4.90973 18.9074 4.71799C18.4796 4.5 17.9203 4.5 16.8002 4.5H16M16 2.5V4.5M16 4.5H8M8 2.5V4.5" stroke="#666666" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg> 
                             {{date('M',strtotime($blog->date))}}
                          {{date('d',strtotime($blog->date))}} 
                          {{date('Y',strtotime($blog->date))}}</p>
                        </div>
                                    <div class="tech_left">
                                        <h2 class="head_2 lh-base fs-4">{{ $blog->title }}</span></h2>
                                         @php
                                            $firstParagraph = '';
                                            if (preg_match_all('/<p>(.*?)<\/p>/s', $blog->short_description, $matches)) {
                                                $firstParagraph = collect($matches[1])->first(function ($p) {
                                                    return trim(strip_tags($p)) !== '';
                                                });
                                            }
                                        @endphp
                                        
                                        <p class="mb-0">{{ $firstParagraph }}</p>
                                        <!--{!! $blog->short_description !!}-->
                                    </div>
                                    <div class="tech_right">
                                        <img src="{{ asset('public/front/images/tech_arr.svg')}}" alt="" class="arrow_2">
                                    </div>
                                </div>
                            </a>
                        </div>
                <!--</div>-->
                
            @endforeach
            
        </div>
    </div>
</section>
@include('layouts.frontfooter')