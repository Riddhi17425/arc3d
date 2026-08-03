@extends('admin.layouts.app')

@section('content')
<style>
    .required-star {
        color: red;
    }
</style>

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        {{-- Page Header --}}
        <div class="row align-items-center">
            <div id="message-pop-up" class="alert alert-dismissible fade show" role="alert" style="display: none">
                <span id="success-message"></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Edit Blogs</h3>
                    <a href="{{ route('blogs') }}" class="btn btn-primary btn-set-task">Back</a>
                </div>
            </div>
        </div> 

        {{-- Form Section --}}
        <div class="row clearfix g-3">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{ route('blogs.update', $blogs->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- blogs Info --}}
                            <div class="card mb-4 border">
                                <div class="card-header bg-light"><strong>Blogs Information</strong></div>
                                <div class="card-body row">

                                    {{-- Title --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Title <span class="required-star">*</span></label>
                                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title', $blogs->title) }}" placeholder="Enter Title">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Blogs Url --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Url <span class="required-star">*</span></label>
                                        <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror"
                                            value="{{ old('url', $blogs->url) }}" placeholder="Enter url">
                                        @error('url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    

                                    {{-- Front Image --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Front Image</label>
                                        <input type="file" name="front_image" id="blogs_front_image" class="form-control @error('front_image') is-invalid @enderror" onchange="validateAndPreviewImage()">
                                        @if($blogs->front_image)
                                            <img src="{{ asset('public/admin/blogs/front_image/' . $blogs->front_image) }}" id="preview_blogs_front_image" class="mt-2" style="max-width: 100px;">
                                        @endif
                                        @error('front_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Front Image Alt Tag <span class="required-star">*</span></label>
                                        <input type="text" name="front_image_alt" id="front_image_alt" class="form-control @error('front_image_alt') is-invalid @enderror"
                                            value="{{ old('front_image_alt' , $blogs->front_image_alt) }}" placeholder="Enter front_image_alt">
                                        @error('front_image_alt')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Detail Image --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Detail Image</label>
                                        <input type="file" name="detail_image" id="blogs_detail_image" class="form-control @error('detail_image') is-invalid @enderror" onchange="validateAndPreviewImage()">
                                        @if($blogs->detail_image)
                                            <img src="{{ asset('public/admin/blogs/detail_image/' . $blogs->detail_image) }}" id="preview_blogs_detail_image" class="mt-2" style="max-width: 100px;">
                                        @endif
                                        @error('detail_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Detail Image ALt <span class="required-star">*</span></label>
                                        <input type="text" name="detail_image_alt" id="detail_image_alt" class="form-control @error('detail_image_alt') is-invalid @enderror"
                                            value="{{ old('detail_image_alt' , $blogs->detail_image_alt) }}" placeholder="Enter detail_image_alt">
                                        @error('detail_image_alt')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Meta Title <span class="required-star">*</span></label>
                                        <input type="text" name="meta_title" id="meta_title" class="form-control @error('meta_title') is-invalid @enderror"
                                            value="{{ old('meta_title' , $blogs->meta_title) }}" placeholder="Enter meta_title">
                                        @error('meta_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div> 
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date" id="date" value="{{$blogs->date}}" name="date" class="form-control @error('date') is-invalid @enderror">
                                        @error('date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Status --}}
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                                            <option value="Active" {{ old('status', $blogs->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="In-Active" {{ old('status', $blogs->status) == 'In-Active' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div> 

                                    {{-- Short Description --}}
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Short Description <span class="required-star">*</span></label>
                                        <textarea name="short_description" id="short_description"
                                            class="form-control @error('short_description') is-invalid @enderror"
                                            placeholder="Enter short description">{{ old('short_description', $blogs->short_description) }}</textarea>
                                        @error('short_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div> 

                                    {{-- Detail Description --}}
                                    <div class="card mb-4 border">
                                        <div class="card-header bg-light"><strong>Detail Description</strong> <span class="required-star">*</span></div>
                                        <div class="card-body">
                                            <textarea name="detail_description" class="form-control @error('detail_description') is-invalid @enderror"
                                                rows="4" id="detail_description">{{ old('detail_description', $blogs->detail_description) }}</textarea>
                                            @error('detail_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div> 
                                    </div>
 
                                    {{-- Meta Description --}}
                                    <div class="card mb-4 border">
                                        <div class="card-header bg-light"><strong>Meta Description</strong> <span class="required-star">*</span></div>
                                        <div class="card-body">
                                            <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror"
                                                rows="4" id="meta_description">{{ old('meta_description', $blogs->meta_description) }}</textarea>
                                            @error('meta_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div> 
                                    </div>
                                    
                                    @php
                                        $faqBlocks = is_array($blogs->title_description)
                                            ? $blogs->title_description
                                            : json_decode($blogs->title_description, true);
                                    
                                        $faqBlocks = $faqBlocks ?? [];
                                    @endphp
                                        <div class="card mb-4 border">
                                            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                                <strong>FAQ Title & Description</strong>
                                                <button type="button" id="addFaqBlock" class="btn btn-sm btn-success">+ Add More</button>
                                            </div> 
                                            <div class="card-body" id="faqRepeater">
                                                @forelse ($faqBlocks as $block)
                                                    <div class="faqGroup border rounded p-3 mb-3">
                                                        <div class="mb-3">
                                                            <label class="form-label">Title </label>
                                                            <input type="text" name="faq_title[]" class="form-control" value="{{ $block['faq_title'] ?? '' }}" >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Description </label>
                                                            <textarea name="faq_description[]" class="form-control summernote" rows="4" >{{ $block['faq_description'] ?? '' }}</textarea>
                                                        </div>
                                                        <div class="text-end">
                                                            <button type="button" class="btn btn-danger removeFaq">Remove</button>
                                                        </div>
                                                    </div>
                                                @empty
                                                    {{-- Show one empty block if nothing stored --}}
                                                    <div class="faqGroup border rounded p-3 mb-3">
                                                        <div class="mb-3">
                                                            <label class="form-label">Title </label>
                                                            <input type="text" name="faq_title[]" class="form-control" >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Description </label>
                                                            <textarea name="faq_description[]" class="form-control summernote" rows="4" ></textarea>
                                                        </div>
                                                        <div class="text-end">
                                                            <button type="button" class="btn btn-danger removeFaq">Remove</button>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>

                                        </div>
                                    
                                    
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">Update Blogs</button>
                            </div>
                        </form>
                    </div> {{-- End Card Body --}}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JS Section --}}
    <script src="{{ asset('public/admin/js/blogs/blogs.js') }}" defer></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#detail_description').summernote({
            placeholder: 'Enter Description here...',
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ]
        });
        
        $('#short_description').summernote({
            placeholder: 'Enter Description here...',
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ]
        });

    
        $('#meta_description').summernote({
                placeholder: 'Enter Meta Description here...',
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'hr']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']]
                ]
            }); 
        
        
    });
</script>
<script>
    $(document).ready(function () {
        // Initialize Summernote
        $('.summernote').summernote({
            height: 200,
            placeholder: 'Enter Description here...'
        });

        // Add More
        $('#addFaqBlock').click(function () {
            let block = `
                <div class="faqGroup border rounded p-3 mb-3">
                    <div class="mb-3">
                        <label class="form-label">Title </label>
                        <input type="text" name="faq_title[]" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description </label>
                        <textarea name="faq_description[]" class="form-control summernote" rows="4" ></textarea>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-danger removeFaq">Remove</button>
                    </div>
                </div>
            `;
            $('#faqRepeater').append(block);
            
            // Re-init summernote for new textareas
            $('.summernote').summernote({
                height: 200,
                placeholder: 'Enter Description here...'
            });
        });

        // Remove block
        $(document).on('click', '.removeFaq', function () {
            $(this).closest('.faqGroup').remove();
        });
    });
</script>
@endsection 
