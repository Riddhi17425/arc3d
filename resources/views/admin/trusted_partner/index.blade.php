@extends('admin.layouts.app')

@section('content')
<style>
    .required-star {
        color: red;
    }
</style>
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div id="message-pop-up" class="alert  alert-dismissible fade show"  role="alert" style="display: none">
                    <span id="success-message"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Trusted Partner Information</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#trusted_partner_modal"><i class="icofont-plus-circle me-2 fs-6"></i>Add Images</button>
                        </div>
                    </div> 
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="trusted_partnertable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Actions</th>  
                                    </tr>
                                </thead>
                               
                            </table>
                        </div>
                    </div>
                </div> 
            </div><!-- Row End --> 
        </div> 
    </div>

    <!-- Add Category-->
    <div class="modal fade" id="trusted_partner_modal" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="trusted_partner_modalLabel">Add Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="deadline-form">
                    <form id="trusted_partner_form" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <input type="text" name="trusted_partner_id" id="trusted_partner_id" hidden>
                                <label for="trusted_partner_status" class="form-label">Status<span class="required-star">*</span></label> <br>
                                <input type="radio"  name="trusted_partner_status" value="Active"> Active
                                <input type="radio" name="trusted_partner_status" value="In-Active"> In Active <br>
                                <span class="text-danger error" id="span_trusted_partner_status"></span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="trusted_partner_image" class="form-label">Image<span class="required-star">*</span></label>
                                <input type="file" class="form-control" name="trusted_partner_image" id="trusted_partner_image" onchange="validateAndPreviewImage()">
                                <span class="text-danger error" id="span_trusted_partner_image"></span>
                            </div>

                            <div class="col-sm-12">
                                <img id="preview_trusted_partner_image" src="#" alt="Preview" class="mt-2" style="max-width: 100px; height: auto; display: none;" />
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="alt_tag" class="form-label">Alt Tag</label> <br>
                                <input type="text" id="alt_tag" placeholder="Enter Alt Tag" class="form-control" name="alt_tag"> 
                                <span class="text-danger error" id="span_alt_tag"></span>
                            </div>
                        </div> 
                    </form>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="Savetrusted_partner" class="btn btn-primary">Add</button>
            </div>
        </div>
        </div>
    </div>

    <script>
        // js load on footer
        window.APP_URLS = {
            trusted_partnerStore: "{{ route('trustedpartner.store') }}",
            trusted_partnerUpdate: "{{ route('trustedpartner.update', [':id']) }}",
            csrfToken: "{{ csrf_token() }}", 
            trusted_partner_get_data : "{{ route('trustedpartner_get_data') }}",
            trusted_partner_edit_data : "{{ route('trustedpartner.edit' , [':id']) }}",
            trusted_partner_delete_data : "{{ route('trustedpartner.delete' , [':id']) }}",
            image_path: "{{ asset('public/admin/trusted_partner/') }}"

        }; 
    </script>

    <script src="{{ asset('public/admin/js/trusted_partner/trusted_partner.js') }}" defer></script>

    @endsection
    

     