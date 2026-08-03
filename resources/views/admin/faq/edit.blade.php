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
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Add Data</h3>
                        <a href="{{ route('faq') }}" class="btn btn-primary btn-set-task">Back</a>
                    </div>
                </div>
            </div> 

            {{-- Form Section --}}
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{ route('faq.update' , $faq->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- whychooseus Info --}}
                                <div class="card mb-4 border">
                                    <div class="card-header bg-light"><strong>Faq Information</strong></div>
                                    <div class="card-body row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Faq Url<span
                                                    class="required-star">*</span></label>
                                            <input type="text" name="faq_url"
                                                class="form-control @error('faq_url') is-invalid @enderror"
                                                value="{{ old('faq_url' , $faq->faq_url ) }}" placeholder="Enter Title Here">
                                            @error('faq_url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        @php
                                            $faqBlocks = $faq->title_description ?? [];
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
                                                            <label class="form-label">Title <span class="required-star">*</span></label>
                                                            <input type="text" name="title[]" class="form-control" value="{{ $block['title'] ?? '' }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Description <span class="required-star">*</span></label>
                                                            <textarea name="description[]" class="form-control summernote" rows="4" required>{{ $block['description'] ?? '' }}</textarea>
                                                        </div>
                                                        <div class="text-end">
                                                            <button type="button" class="btn btn-danger removeFaq">Remove</button>
                                                        </div>
                                                    </div>
                                                @empty
                                                    {{-- Show one empty block if nothing stored --}}
                                                    <div class="faqGroup border rounded p-3 mb-3">
                                                        <div class="mb-3">
                                                            <label class="form-label">Title <span class="required-star">*</span></label>
                                                            <input type="text" name="title[]" class="form-control" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Description <span class="required-star">*</span></label>
                                                            <textarea name="description[]" class="form-control summernote" rows="4" required></textarea>
                                                        </div>
                                                        <div class="text-end">
                                                            <button type="button" class="btn btn-danger removeFaq">Remove</button>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>

                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Status <span
                                                    class="required-star">*</span></label>
                                            <select name="status"
                                                class="form-control @error('status') is-invalid @enderror">
                                                <option value="Active"
                                                    {{ old('status') == 'Active' ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="In-Active"
                                                    {{ old('status') == 'In-Active' ? 'selected' : '' }}>Inactive
                                                </option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        
                                        
                                    </div>
                                    {{-- Submit --}}
                                    <div class="text-end mt-4">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                            </form>
                        </div> {{-- End Card Body --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JS Section --}}
    <script src="{{ asset('public/admin/js/faq/faq.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#description').summernote({
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
                        <label class="form-label">Title <span class="required-star">*</span></label>
                        <input type="text" name="title[]" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description <span class="required-star">*</span></label>
                        <textarea name="description[]" class="form-control summernote" rows="4" required></textarea>
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
