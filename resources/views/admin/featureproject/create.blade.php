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
                        <h3 class="fw-bold mb-0">Add Feature Project</h3>
                        <a href="{{ route('featureproject') }}" class="btn btn-primary btn-set-task">Back</a>
                    </div>
                </div>
            </div>

            {{-- Form Section --}}
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{ route('featureproject.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- featureproject Info --}}
                                <div class="card mb-4 border">
                                    <div class="card-header bg-light"><strong>Feature Project Information</strong></div>
                                    <div class="card-body row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Title <span
                                                    class="required-star">*</span></label>
                                            <input type="text" name="featureproject_title" id="featureproject_title"
                                                class="form-control @error('featureproject_title') is-invalid @enderror"
                                                value="{{ old('featureproject_title') }}" placeholder="Enter Feature project Title Here">
                                            @error('featureproject_title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Url <span
                                                    class="required-star">*</span></label>
                                            <input type="text" name="url" id="url"
                                                class="form-control @error('url') is-invalid @enderror"
                                                value="{{ old('url') }}" placeholder="Enter Feature project Url Here">
                                            @error('url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Images <span class="required-star">*</span></label>
                                            <input type="file" name="featureproject_image" id="featureproject_image"
                                                class="form-control color-image-input @error('featureproject_image') is-invalid @enderror" onchange="validateAndPreviewImage()">
                                                <span class="text-danger" id="span_featureproject_image"></span>
                                            @error('featureproject_image')
                                                <div class="invalid-feedback">{{ $message }}</div> 
                                            @enderror
                                            <div class="preview_featureproject_image-zone mt-2 d-flex flex-wrap gap-2 position-relative">
                                            </div>
                                             <img id="preview_featureproject_image" src="#" alt="Preview" class="mt-2" style="max-width: 100px; height: auto; display: none;" />
                                        </div>
                                        
                                        

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Alt <span class="required-star">*</span></label>
                                            <input type="text" name="featureproject_alt"
                                                class="form-control @error('featureproject_alt') is-invalid @enderror"
                                                value="{{ old('featureproject_alt') }}" placeholder="Enter Alt Here">
                                            @error('featureproject_alt')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label">Select Service <span class="required-star">*</span></label>
                                                <div class="service-selection-container">
                                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                                        @php
                                                            $services = $data['services']->map(function($service) {
                                                                    return [
                                                                        'title' => $service->title,
                                                                        'url'   => $service->url
                                                                    ];
                                                                });

                                                            $oldservices = old('services', []); 
                                                        @endphp
                                                        
                                                        @foreach($services as $service)  
                                                            <div class="form-check">
                                                                <input class="btn-check service-checkbox" type="checkbox" 
                                                                    name="services[]" 
                                                                    data-name="{{ $service['title'] }}"
                                                                    value="{{ $service['url'] }}" 
                                                                    id="service_{{ $service['url'] }}"
                                                                    {{ in_array($service['url'], $oldservices) ? 'checked' : '' }}>
                                                                
                                                                <label class="btn btn-outline-primary service-btn" for="service_{{ $service['url'] }}">
                                                                    {{ $service['title'] }}
                                                                </label>
                                                            </div> 
                                                        @endforeach  
                                                    </div>
                                                    
                                                    {{-- Selected services display --}} 
                                                    <div class="selected-services-display">
                                                        <small class="text-muted">Selected: </small>
                                                        <span id="selectedservicesText" class="fw-bold text-primary">None</span>
                                                    </div>
                                                    
                                                    @error('services') 
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Status <span
                                                    class="required-star">*</span></label> 
                                            <select name="featureproject_status"
                                                class="form-control @error('featureproject_status') is-invalid @enderror">
                                                <option value="Active"
                                                    {{ old('featureproject_status') == 'Active' ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="In-Active"
                                                    {{ old('featureproject_status') == 'In-Active' ? 'selected' : '' }}>Inactive
                                                </option>
                                            </select>
                                            @error('featureproject_status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>  
                                        
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Show Home Page</label> 
                                            <select name="home_status"
                                                class="form-control @error('home_status') is-invalid @enderror">
                                                <option value="No"
                                                    {{ old('home_status') == 'No' ? 'selected' : '' }}>No
                                                </option>
                                                <option value="Yes"
                                                    {{ old('home_status') == 'Yes' ? 'selected' : '' }}>Yes
                                                </option>
                                                
                                            </select>
                                            @error('home_status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>  
                                        
                                        <div class="card mb-4 border">
                                            <div class="card mb-4 border">
                                                <div class="card-header bg-light"><strong>Description </strong><span class="required-star">*</span></div>
                                                <div class="card-body">
                                                    <textarea name="featureproject_desc" class="form-control @error('featureproject_desc') is-invalid @enderror" rows="4"
                                                        id="featureproject_desc">{{ old('featureproject_desc') }}</textarea>
                                                    @error('featureproject_desc')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror 
                                                </div>
                                            </div>
 
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
    <script src="{{ asset('public/admin/js/featureproject/featureproject.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#featureproject_desc').summernote({
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
