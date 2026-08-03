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
                        <a href="{{ route('printing') }}" class="btn btn-primary btn-set-task">Back</a>
                    </div>
                </div>
            </div>
  
            {{-- Form Section --}}
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{ route('printing.update', $printing->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card mb-4 border">
                                    <div class="card-header bg-light"><strong>Feature Project Information</strong></div>
                                    <div class="card-body row">
                                        {{-- Title --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Title <span class="required-star">*</span></label>
                                            <input type="text" name="printing_title" id="printing_title"
                                                class="form-control @error('printing_title') is-invalid @enderror"
                                                value="{{ old('printing_title', $printing->title) }}" placeholder="Enter Feature Project Here">
                                            @error('printing_title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>  

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Url <span
                                                    class="required-star">*</span></label>
                                            <input type="text" name="url" id="url"
                                                class="form-control @error('url') is-invalid @enderror"
                                                value="{{ old('url' , $printing->url ) }}" placeholder="Enter Feature project url Here">
                                            @error('url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Image --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Image</label>
                                            <input type="file" name="printing_image" id="printing_image"
                                                class="form-control color-image-input @error('printing_image') is-invalid @enderror" onchange="validateAndPreviewImage()">
                                            @error('printing_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            @if($printing->image)
                                                <div class="mt-2">
                                                    <img id="preview_printing_image" src="{{ asset('public/admin/printing_image/' .$printing->image) }}" width="150" height="120" alt="{{ $printing->alt_tag }}">
                                                </div>
                                            @endif 
                                        </div>

                                        

                                        {{-- Alt --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Alt <span class="required-star">*</span></label>
                                            <input type="text" name="printing_alt"
                                                class="form-control @error('printing_alt') is-invalid @enderror"
                                                value="{{ old('printing_alt', $printing->alt_tag) }}" placeholder="Enter Alt Here">
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
                                                            $existingkeywords = [];
                                                            if ($printing->industires) {
                                                                $existingkeywords = json_decode($printing->industires, true);
                                                            }
                                                            $oldindustries = old('industries', $existingkeywords); 
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

                                        {{-- Status --}}
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Status <span class="required-star">*</span></label>
                                            <select name="printing_status"
                                                class="form-control @error('printing_status') is-invalid @enderror">
                                                <option value="Active" {{ old('printing_status', $printing->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="In-Active" {{ old('printing_status', $printing->status) == 'In-Active' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('printing_status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Description --}}
                                        <div class="card mb-4 border">
                                            <div class="card-header bg-light"><strong>Description </strong><span class="required-star">*</span></div>
                                            <div class="card-body">
                                                <textarea name="printing_desc"
                                                    class="form-control @error('printing_desc') is-invalid @enderror"
                                                    rows="4" id="printing_desc">{{ old('printing_desc', $printing->description) }}</textarea>
                                                @error('printing_desc')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="card mb-4 border">
                                            <div class="card mb-4 border">
                                                <div class="card-header bg-light"><strong>Materials Used </strong><span class="required-star">*</span></div>
                                                <div class="card-body">
                                                    <textarea name="printing_material_desc" class="form-control @error('printing_material_desc') is-invalid @enderror" rows="4"
                                                        id="printing_material_desc">{{ old('printing_material_desc' , $printing->printing_material_desc) }}</textarea>
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
                                                        id="printing_technology_desc">{{ old('printing_technology_desc' , $printing->printing_technology_desc) }}</textarea>
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
                                                        id="printing_btob_desc">{{ old('printing_btob_desc' , $printing->printing_btob_desc) }}</textarea>
                                                    @error('printing_btob_desc')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror 
                                                </div> 
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
    <script src="{{ asset('public/admin/js/printing/printing.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#printing_desc').summernote({
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
