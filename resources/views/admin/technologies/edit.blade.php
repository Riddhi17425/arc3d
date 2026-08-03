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
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Edit Data</h3>
                        <a href="{{ route('technologies') }}" class="btn btn-primary btn-set-task">Back</a>
                    </div>
                </div>
            </div>

            {{-- Form Section --}}
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{ route('technologies.update', $technologies->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card mb-4 border">
                                    <div class="card-header bg-light"><strong>Technologies Information</strong></div>
                                    <div class="card-body row">
                                        {{-- ShortName --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">ShortName <span class="required-star">*</span></label>
                                            <input type="text" name="technologies_shortname"
                                                class="form-control @error('technologies_shortname') is-invalid @enderror"
                                                value="{{ old('technologies_shortname', $technologies->shortname) }}" placeholder="Enter Technologies Short Name Here">
                                            @error('technologies_shortname')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{-- FullName --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">FullName <span class="required-star">*</span></label>
                                            <input type="text" name="technologies_fullname"
                                                class="form-control @error('technologies_fullname') is-invalid @enderror"
                                                value="{{ old('technologies_fullname', $technologies->fullname) }}" placeholder="Enter Technologies Full Name Here">
                                            @error('technologies_fullname')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{-- Image --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Image</label>
                                            <input type="file" name="technologies_image" id="technologies_image"
                                                class="form-control color-image-input @error('technologies_image') is-invalid @enderror" onchange="validateAndPreviewImage()">
                                            @error('technologies_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            @if($technologies->image)
                                                <div class="mt-2">
                                                    <img id="preview_technologies_image" src="{{ asset('public/admin/technologies_image/' .$technologies->image) }}" width="150" height="120" alt="{{ $technologies->alt_tag }}">
                                                </div>
                                            @endif
                                        </div>

                                        

                                        {{-- Alt --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Alt <span class="required-star">*</span></label>
                                            <input type="text" name="technologies_alt"
                                                class="form-control @error('technologies_alt') is-invalid @enderror"
                                                value="{{ old('technologies_alt', $technologies->alt_tag) }}" placeholder="Enter Alt Here">
                                            @error('technologies_alt')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Status --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Status <span class="required-star">*</span></label>
                                            <select name="technologies_status"
                                                class="form-control @error('technologies_status') is-invalid @enderror">
                                                <option value="Active" {{ old('technologies_status', $technologies->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="In-Active" {{ old('technologies_status', $technologies->status) == 'In-Active' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('technologies_status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            
                                        </div>

                                         <div class="col-md-6 mb-3">
                                            <label class="form-label">URl <span class="required-star">*</span></label>
                                            <input type="text" name="url"
                                                class="form-control @error('url') is-invalid @enderror"
                                                value="{{ old('url' , $technologies->url) }}" placeholder="Enter Alt Here">
                                            @error('url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Description --}}
                                        <div class="card mb-4 border">
                                            <div class="card-header bg-light"><strong>Description </strong><span class="required-star">*</span></div>
                                            <div class="card-body">
                                                <textarea name="technologies_desc"
                                                    class="form-control @error('technologies_desc') is-invalid @enderror"
                                                    rows="4" id="technologies_desc">{{ old('technologies_desc', $technologies->description) }}</textarea>
                                                @error('technologies_desc')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Submit --}}
                                    <div class="text-end mt-4">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                            </form>
                        </div> {{-- End Card Body --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JS Section --}}
    <script src="{{ asset('public/admin/js/technologies/technologies.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#technologies_desc').summernote({
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
@endsection
