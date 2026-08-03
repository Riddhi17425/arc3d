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
                        <h3 class="fw-bold mb-0">Add Printing Module</h3>
                        <a href="{{ route('printing') }}" class="btn btn-primary btn-set-task">Back</a>
                    </div>
                </div>
            </div>

            {{-- Form Section --}}
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{ route('printing.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- printing Info --}}
                                <div class="card mb-4 border">
                                    <div class="card-header bg-light"><strong>Printing Information</strong></div>
                                    <div class="card-body row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Title <span
                                                    class="required-star">*</span></label>
                                            <input type="text" name="printing_title" id="printing_title"
                                                class="form-control @error('printing_title') is-invalid @enderror"
                                                value="{{ old('printing_title') }}" placeholder="Enter Feature project Title Here">
                                            @error('printing_title')
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
                                            <input type="file" name="printing_image" id="printing_image"
                                                class="form-control color-image-input @error('printing_image') is-invalid @enderror" onchange="validateAndPreviewImage()">
                                                <span class="text-danger" id="span_printing_image"></span>
                                            @error('printing_image')
                                                <div class="invalid-feedback">{{ $message }}</div> 
                                            @enderror
                                            <div class="preview_printing_image-zone mt-2 d-flex flex-wrap gap-2 position-relative">
                                            </div>
                                             <img id="preview_printing_image" src="#" alt="Preview" class="mt-2" style="max-width: 100px; height: auto; display: none;" />
                                        </div>
                                        
                                        

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Alt <span class="required-star">*</span></label>
                                            <input type="text" name="printing_alt"
                                                class="form-control @error('printing_alt') is-invalid @enderror"
                                                value="{{ old('printing_alt') }}" placeholder="Enter Alt Here">
                                            @error('printing_alt')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
 
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label">Select Applications <span class="required-star">*</span></label>
                                                <div class="indust-selection-container">
                                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                                        @php
                                                            $industries = $data['industries']->map(function($indust) {
                                                                    return [
                                                                        'title' => $indust->title,
                                                                        'id'   => $indust->id
                                                                    ];
                                                                });

                                                            $oldindustries = old('industries', []); 
                                                        @endphp
                                                        
                                                        @foreach($industries as $indust) 
                                                            <div class="form-check">
                                                                <input class="btn-check indust-checkbox" type="checkbox" 
                                                                    name="industries[]" 
                                                                    data-name="{{ $indust['title'] }}"
                                                                    value="{{ $indust['id'] }}" 
                                                                    id="indust_{{ $indust['id'] }}"
                                                                    {{ in_array($indust['id'], $oldindustries) ? 'checked' : '' }}>
                                                                
                                                                <label class="btn btn-outline-primary indust-btn" for="indust_{{ $indust['id'] }}">
                                                                    {{ $indust['title'] }} 
                                                                </label>
                                                            </div> 
                                                        @endforeach  
                                                    </div>
                                                    
                                                    {{-- Selected industries display --}} 
                                                    <div class="selected-industries-display">
                                                        <small class="text-muted">Selected: </small>
                                                        <span id="selectedindustriesText" class="fw-bold text-primary">None</span>
                                                    </div>
                                                    
                                                    @error('industries') 
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Status <span
                                                    class="required-star">*</span></label> 
                                            <select name="printing_status"
                                                class="form-control @error('printing_status') is-invalid @enderror">
                                                <option value="Active"
                                                    {{ old('printing_status') == 'Active' ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="In-Active"
                                                    {{ old('printing_status') == 'In-Active' ? 'selected' : '' }}>Inactive
                                                </option>
                                            </select>
                                            @error('printing_status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>   
                                        <div class="card mb-4 border">
                                            <div class="card mb-4 border">
                                                <div class="card-header bg-light"><strong>Description </strong><span class="required-star">*</span></div>
                                                <div class="card-body">
                                                    <textarea name="printing_desc" class="form-control @error('printing_desc') is-invalid @enderror" rows="4"
                                                        id="printing_desc">{{ old('printing_desc') }}</textarea>
                                                    @error('printing_desc')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror 
                                                </div>
                                            </div>
 
                                        </div>
                                        <div class="card mb-4 border">
                                            <div class="card mb-4 border">
                                                <div class="card-header bg-light"><strong>Materials Used </strong><span class="required-star">*</span></div>
                                                <div class="card-body">
                                                    <textarea name="printing_material_desc" class="form-control @error('printing_material_desc') is-invalid @enderror" rows="4"
                                                        id="printing_material_desc">{{ old('printing_material_desc') }}</textarea>
                                                    @error('printing_material_desc')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror 
                                                </div>
                                            </div>
 
                                        </div>
                                        <div class="card mb-4 border">
                                            <div class="card mb-4 border">
                                                <div class="card-header bg-light"><strong>What This Technology Offers </strong><span class="required-star">*</span></div>
                                                <div class="card-body">
                                                    <textarea name="printing_technology_desc" class="form-control @error('printing_technology_desc') is-invalid @enderror" rows="4"
                                                        id="printing_technology_desc">{{ old('printing_technology_desc') }}</textarea>
                                                    @error('printing_technology_desc')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror 
                                                </div>
                                            </div>
 
                                        </div>
                                        <div class="card mb-4 border">
                                            <div class="card mb-4 border">
                                                <div class="card-header bg-light"><strong>Benefits to Businesses </strong><span class="required-star">*</span></div>
                                                <div class="card-body">
                                                    <textarea name="printing_btob_desc" class="form-control @error('printing_btob_desc') is-invalid @enderror" rows="4"
                                                        id="printing_btob_desc">{{ old('printing_btob_desc') }}</textarea>
                                                    @error('printing_btob_desc')
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
    <script src="{{ asset('public/admin/js/printing/printing.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            
        });
    </script>
@endsection
