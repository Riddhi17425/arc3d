@include('layouts.frontheader', [
    'og_image' => isset($blogs->detail_image) && $blogs->detail_image !='' ? url('public/admin/blogs/detail_image/' . $blogs->detail_image) : ''
])
<style>
    table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Segoe UI', Tahoma, sans-serif;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    margin-bottom:20px;
}

thead {
    background: var(--primary-color);
    color: #fff;
}

thead th {
    padding: 14px;
    text-align: left;
    font-weight: 600;
    letter-spacing: 0.5px;
        background-color: #005762;
}

tbody tr {
    border-bottom: 1px solid var(--border-color);
    transition: all 0.3s ease;
}

tbody tr:nth-child(even) {
    background: var(--secondary-color);
}

tbody tr:hover {
    background: rgba(0, 0, 0, 0.03);
    transform: scale(1.01);
}

tbody td {
    padding: 12px 14px;
}

tbody td:last-child {
    font-weight: 600;
}
</style>


<section class="service_banner banner blog-content">
    <div class="container">
        <h1 class="title_48">
        <span style="color:#005762;">{{ $blogs->title }}</span>
        </h1>
        <p>{{date('M',strtotime($blogs->date))}}
                          {{date('d',strtotime($blogs->date))}} 
                          {{date('Y',strtotime($blogs->date))}}</p>
        {!! $blogs->short_description !!}
    </div>
</section>
<section class="mt-50 blog-content">
    <div class="container">
        <img src="{{asset('public/admin/blogs/detail_image/' . $blogs->detail_image)}}" alt="{{ $blogs->detail_image_alt }}" class="img-fluid">
    </div>
</section>
<section class="mt-50 blog-content">
   
    <div class="container">
        {!! $blogs->detail_description !!}
        
    </div>
</section>
<section class="accoding blog-content">
    <div class="container">
        @if (!empty($blogs->title_description) && count($blogs->title_description) > 0)
            <h2 class="text-center mb-5">Frequently Asked Questions</h2>
            <div class="row">
                <div class="col-lg-12">
                    <div id="accordionExample">
                        @foreach ($blogs->title_description as $index => $faq)
                            <div class="mb-4">
                                <h3 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $index }}">
                                    {{ $faq['faq_title'] }}
                                </h3>
                                <div id="collapse{{ $index }}" 
                                    class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        {!! $faq['faq_description'] !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

{{-- ================= DYNAMIC SCHEMA (BlogPosting + FAQPage) ================= --}}
@php
    // ---------- FAQ data ----------
    $rawFaqs = $blogs->title_description;
    if (is_string($rawFaqs)) {
        $rawFaqs = json_decode($rawFaqs, true);
    }

    $faqItems = collect($rawFaqs ?? [])
        ->map(fn ($item) => [
            'question' => trim(html_entity_decode(strip_tags($item['faq_title'] ?? ''))),
            'answer'   => trim(html_entity_decode(strip_tags($item['faq_description'] ?? ''))),
        ])
        ->filter(fn ($i) => $i['question'] !== '' && $i['answer'] !== '')
        ->values();

    // ---------- BlogPosting data ----------
    $blogUrl = route('front.blog_detail', ['url' => $blogs->url]);

    $blogImage = !empty($blogs->detail_image)
        ? url('public/admin/blogs/detail_image/' . $blogs->detail_image)
        : (!empty($blogs->front_image) ? url('public/admin/blogs/front_image/' . $blogs->front_image) : null);

    $blogDescription = !empty($blogs->meta_description)
        ? $blogs->meta_description
        : \Illuminate\Support\Str::limit(trim(html_entity_decode(strip_tags($blogs->short_description))), 160);

    $datePublished = \Carbon\Carbon::parse($blogs->date)->toIso8601String();
    $dateModified  = !empty($blogs->updated_at)
        ? \Carbon\Carbon::parse($blogs->updated_at)->toIso8601String()
        : $datePublished;

    $blogPostingSchema = array_filter([
        '@context'         => 'https://schema.org',
        '@type'            => 'BlogPosting',
        'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => $blogUrl],
        'headline'         => \Illuminate\Support\Str::limit($blogs->title, 110, ''),
        'description'      => $blogDescription,
        'image'            => $blogImage,
        'author'           => ['@type' => 'Organization', 'name' => 'ARC 3D', 'url' => url('/')],
        'publisher'        => [
            '@type' => 'Organization',
            'name'  => 'ARC 3D',
            // TODO: PNG ready hone par isse head_logo.png se replace karna (Google SVG support nahi karta)
            'logo'  => ['@type' => 'ImageObject', 'url' => asset('public/front/images/head_logo.svg')],
        ],
        'datePublished'    => $datePublished,
        'dateModified'     => $dateModified,
    ]);

    // ---------- FAQPage ----------
    $faqSchema = [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => $faqItems->map(fn ($i) => [
            '@type'          => 'Question',
            'name'           => $i['question'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $i['answer']],
        ])->all(),
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($blogPostingSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>

@if($faqItems->isNotEmpty())
<script type="application/ld+json">
{!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endif

@include('layouts.frontfooter')
