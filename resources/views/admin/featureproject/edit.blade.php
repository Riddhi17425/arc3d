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
                        <a href="{{ route('featureproject') }}" class="btn btn-primary btn-set-task">Back</a>
                    </div>
                </div>
            </div>

            {{-- Form Section --}}
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{ route('featureproject.update', $featureproject->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card mb-4 border">
                                    <div class="card-header bg-light"><strong>Feature Project Information</strong></div>
                                    <div class="card-body row">
                                        {{-- Title --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Title <span class="required-star">*</span></label>
                                            <input type="text" name="featureproject_title" id="featureproject_title"
                                                class="form-control @error('featureproject_title') is-invalid @enderror"
                                                value="{{ old('featureproject_title', $featureproject->title) }}" placeholder="Enter Feature Project Here">
                                            @error('featureproject_title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>  

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Url <span
                                                    class="required-star">*</span></label>
                                            <input type="text" name="url" id="url"
                                                class="form-control @error('url') is-invalid @enderror"
                                                value="{{ old('url' , $featureproject->url ) }}" placeholder="Enter Feature project url Here">
                                            @error('url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Image --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Image</label>
                                            <input type="file" name="featureproject_image" id="featureproject_image"
                                                class="form-control color-image-input @error('featureproject_image') is-invalid @enderror" onchange="validateAndPreviewImage()">
                                            @error('featureproject_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            @if($featureproject->image)
                                                <div class="mt-2">
                                                    <img id="preview_featureproject_image" src="{{ asset('public/admin/featureproject_image/' .$featureproject->image) }}" width="150" height="120" alt="{{ $featureproject->alt_tag }}">
                                                </div>
                                            @endif 
                                        </div>

                                        

                                        {{-- Alt --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Alt <span class="required-star">*</span></label>
                                            <input type="text" name="featureproject_alt"
                                                class="form-control @error('featureproject_alt') is-invalid @enderror"
                                                value="{{ old('featureproject_alt', $featureproject->alt_tag) }}" placeholder="Enter Alt Here">
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
                                                                        'url'   => $service->url,
                                                                    ];
                                                                });

                                                                $existingkeywords = [];
                                                                if ($featureproject->services) {
                                                                    $existingkeywords = json_decode($featureproject->services, true);
                                                                }

                                                                $oldservices = old('services', $existingkeywords); 
                                                        @endphp
                                                         
                                                        @foreach($services as $service) 
                                                            <div class="form-check">
                                                                <input class="btn-check service-checkbox" 
                                                                    type="checkbox" 
                                                                    data-name="{{ $service['title'] }}"
                                                                    name="services[]" 
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

                                        {{-- Status --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Status <span class="required-star">*</span></label>
                                            <select name="featureproject_status"
                                                class="form-control @error('featureproject_status') is-invalid @enderror">
                                                <option value="Active" {{ old('featureproject_status', $featureproject->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="In-Active" {{ old('featureproject_status', $featureproject->status) == 'In-Active' ? 'selected' : '' }}>Inactive</option>
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
                                                    {{ old('home_status' , $featureproject->home_status) == 'No' ? 'selected' : '' }}>No
                                                </option>
                                                <option value="Yes"
                                                    {{ old('home_status' , $featureproject->home_status) == 'Yes' ? 'selected' : '' }}>Yes
                                                </option>
                                                
                                            </select>
                                            @error('home_status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div> 

                                        {{-- Description --}}
                                        <div class="card mb-4 border">
                                            <div class="card-header bg-light"><strong>Description </strong><span class="required-star">*</span></div>
                                            <div class="card-body">
                                                <textarea name="featureproject_desc"
                                                    class="form-control @error('featureproject_desc') is-invalid @enderror"
                                                    rows="4" id="featureproject_desc">{{ old('featureproject_desc', $featureproject->description) }}</textarea>
                                                @error('featureproject_desc')
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
