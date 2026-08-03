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
                        <h3 class="fw-bold mb-0">Add Services</h3>
                        <a href="{{ route('services') }}" class="btn btn-primary btn-set-task">Back</a>
                    </div>
                </div> 
            </div>

            {{-- Form Section --}}
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf 
                                {{-- service Info --}}
                                <div class="card mb-4 border">
                                    <div class="card-header bg-light"><strong>Service Information</strong></div>
                                    <div class="card-body row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Title <span
                                                    class="required-star">*</span></label>
                                            <input type="text" name="service_title" id="service_title"
                                                class="form-control @error('service_title') is-invalid @enderror"
                                                value="{{ old('service_title') }}" placeholder="Enter Service Title Here">
                                            @error('service_title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>  
                                         
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Url <span
                                                    class="required-star">*</span></label>
                                            <input type="text" name="service_url" id="service_url"
                                                class="form-control @error('service_url') is-invalid @enderror"
                                                value="{{ old('service_url') }}" placeholder="Enter Service Url Here">
                                            @error('service_url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Front Images </label>
                                            <input type="file" name="service_image" id="service_image"
                                                class="form-control color-image-input @error('service_image') is-invalid @enderror" onchange="validateAndPreviewImage()">
                                                <span class="text-danger" id="span_service_image"></span>
                                            @error('service_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                           
                                             <img id="preview_service_image" src="#" alt="Preview" class="mt-2" style="max-width: 100px; height: auto; display: none;" />
                                        </div> 

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Front Images Alt </label>
                                            <input type="text" name="service_alt"
                                                class="form-control @error('service_alt') is-invalid @enderror"
                                                value="{{ old('service_alt') }}" placeholder="Enter Alt Here">
                                            @error('service_alt')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Back Images </label>
                                            <input type="file" name="back_service_image" id="back_service_image"
                                                class="form-control color-image-input @error('back_service_image') is-invalid @enderror" onchange="backValidateAndPreviewImage()">
                                                <span class="text-danger" id="span_back_service_image"></span>
                                            @error('back_service_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            
                                             <img id="preview_back_service_image" src="#" alt="Preview" class="mt-2" style="max-width: 100px; height: auto; display: none;" />
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Back Images Alt </label>
                                            <input type="text" name="back_service_alt"
                                                class="form-control @error('back_service_alt') is-invalid @enderror"
                                                value="{{ old('back_service_alt') }}" placeholder="Enter Alt Here">
                                            @error('back_service_alt')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Why It’s Worth Investing Images </label>
                                            <input type="file" name="its_worth_image" id="its_worth_image"
                                                class="form-control color-image-input @error('its_worth_image') is-invalid @enderror" onchange="whyitsworthAndPreviewImage()">
                                                <span class="text-danger" id="span_its_worth_image"></span>
                                            @error('its_worth_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            
                                             <img id="preview_its_worth_image" src="#" alt="Preview" class="mt-2" style="max-width: 100px; height: auto; display: none;" />
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Why It’s Worth Investing Images Alt </label>
                                            <input type="text" name="its_worth_image_alt"
                                                class="form-control @error('its_worth_image_alt') is-invalid @enderror"
                                                value="{{ old('its_worth_image_alt') }}" placeholder="Enter Alt Here">
                                            @error('its_worth_image_alt')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label">Select How Its Works </label>
                                                <div class="howitwork-selection-container">
                                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                                        @php
                                                            $howitworks = $data['howitworks']->map(function($howitwork) {
                                                                return [
                                                                    'id'   => $howitwork->id,
                                                                    'name' => $howitwork->name
                                                                ];
                                                            }); 
                                                            $oldhowitworks = old('howitworks', []); 
                                                        @endphp   

                                                        @foreach($howitworks as $howitwork) 
                                                            <div class="form-check">
                                                                <input class="btn-check howitwork-checkbox" type="checkbox" 
                                                                    name="howitworks[]" 
                                                                    data-name="{{ $howitwork['name'] }}"
                                                                    value="{{ $howitwork['id'] }}" 
                                                                    id="howitwork_{{ $howitwork['id'] }}" 
                                                                    {{ in_array($howitwork['id'], $oldhowitworks) ? 'checked' : '' }}>

                                                                <label class="btn btn-outline-primary howitwork-btn" for="howitwork_{{ $howitwork['id'] }}">
                                                                    {{ $howitwork['name'] }}
                                                                </label>
                                                            </div> 
                                                        @endforeach
                                                    </div>
                                                    
                                                    {{-- Selected howitworks display --}} 
                                                    <div class="selected-howitworks-display">
                                                        <small class="text-muted">Selected: </small>
                                                        <span id="selectedhowitworksText" class="fw-bold text-primary">None</span>
                                                    </div>
                                                    
                                                    @error('howitworks') 
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
 
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label">Select Exceeds Expectations </label>
                                                <div class="howitwork-selection-container">
                                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                                        @php
                                                            $exceeds_expectations = $data['exceeds_expectations']->map(function($exceeds_expectation) {
                                                                return [
                                                                    'id'   => $exceeds_expectation->id,
                                                                    'name' => $exceeds_expectation->name
                                                                ];
                                                            }); 
                                                            $oldexceeds_expectations = old('exceeds_expectations', []); 
                                                        @endphp   

                                                        @foreach($exceeds_expectations as $exceeds_expectation) 
                                                            <div class="form-check">
                                                                <input class="btn-check exceeds_expectation-checkbox" type="checkbox" 
                                                                    name="exceeds_expectations[]" 
                                                                    data-name="{{ $exceeds_expectation['name'] }}"
                                                                    value="{{ $exceeds_expectation['id'] }}" 
                                                                    id="exceeds_expectation_{{ $exceeds_expectation['id'] }}" 
                                                                    {{ in_array($exceeds_expectation['id'], $oldexceeds_expectations) ? 'checked' : '' }}>

                                                                <label class="btn btn-outline-primary exceeds_expectation-btn" for="exceeds_expectation_{{ $exceeds_expectation['id'] }}">
                                                                    {{ $exceeds_expectation['name'] }}
                                                                </label>
                                                            </div> 
                                                        @endforeach
                                                    </div>
                                                    
                                                    {{-- Selected exceeds_expectations display --}} 
                                                    <div class="selected-exceeds_expectations-display">
                                                        <small class="text-muted">Selected: </small>
                                                        <span id="selectedexceeds_expectationsText" class="fw-bold text-primary">None</span>
                                                    </div>
                                                    
                                                    @error('exceeds_expectations') 
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Status <span
                                                    class="required-star">*</span></label>
                                            <select name="service_status"
                                                class="form-control @error('service_status') is-invalid @enderror">
                                                <option value="Active"
                                                    {{ old('service_status') == 'Active' ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="In-Active"
                                                    {{ old('service_status') == 'In-Active' ? 'selected' : '' }}>Inactive
                                                </option>
                                            </select>
                                            @error('service_status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Meta Title</label>
                                            <input type="text" name="meta_title"
                                                class="form-control @error('meta_title') is-invalid @enderror"
                                                value="{{ old('meta_title') }}" placeholder="Enter Alt Here">
                                            @error('meta_title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="card mb-4 border">
                                            <div class="card mb-4 border">
                                                <div class="card-header bg-light"><strong>Short Description </strong></div>
                                                <div class="card-body">
                                                    <textarea name="service_short_desc" class="form-control @error('service_short_desc') is-invalid @enderror" rows="4"
                                                        id="service_short_desc">{{ old('service_short_desc') }}</textarea>
                                                    @error('service_short_desc')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mb-4 border">
                                            <div class="card mb-4 border">
                                                <div class="card-header bg-light"><strong>Description </strong></div>
                                                <div class="card-body">
                                                    <textarea name="service_desc" class="form-control @error('service_desc') is-invalid @enderror" rows="4"
                                                        id="service_desc">{{ old('service_desc') }}</textarea>
                                                    @error('service_desc')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mb-4 border">
                                            <div class="card mb-4 border">
                                                <div class="card-header bg-light"><strong>Why It’s Worth Investing Description </strong></div>
                                                <div class="card-body">
                                                    <textarea name="its_worth_description" class="form-control @error('its_worth_description') is-invalid @enderror" rows="4"
                                                        id="its_worth_description">{{ old('its_worth_description') }}</textarea>
                                                    @error('its_worth_description')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mb-4 border">
                                            <div class="card mb-4 border">
                                                <div class="card-header bg-light"><strong>How it Works Short Description </strong></div>
                                                <div class="card-body">
                                                    <textarea name="howitworks_short_desc" class="form-control @error('howitworks_short_desc') is-invalid @enderror" rows="4"
                                                        id="howitworks_short_desc">{{ old('howitworks_short_desc') }}</textarea>
                                                    @error('howitworks_short_desc')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mb-4 border">
                                            <div class="card mb-4 border">
                                                <div class="card-header bg-light"><strong>How it Works Description </strong></div>
                                                <div class="card-body">
                                                    <textarea name="howitworks_desc" class="form-control @error('howitworks_desc') is-invalid @enderror" rows="4"
                                                        id="howitworks_desc">{{ old('howitworks_desc') }}</textarea>
                                                    @error('howitworks_desc')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="card mb-4 border">
                                            <div class="card mb-4 border">
                                                <div class="card-header bg-light"><strong>Meta Description </strong></div>
                                                <div class="card-body">
                                                    <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" rows="4"
                                                        id="meta_description">{{ old('meta_description') }}</textarea>
                                                    @error('meta_description')
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
    <script src="{{ asset('public/admin/js/service/service.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
