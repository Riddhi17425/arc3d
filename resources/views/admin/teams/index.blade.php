@extends('admin.layouts.app')

@section('content')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div id="message-pop-up" class="alert  alert-dismissible fade show"  role="alert" style="display: none">
                    <span id="success-message"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Teams Information</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#teams_modal"><i class="icofont-plus-circle me-2 fs-6"></i>Add Teams</button>
                        </div> 
                    </div> 
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="teamstable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Designation</th>
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
    <div class="modal fade" id="teams_modal" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="teams_modalLabel">Add Teams</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="deadline-form">
                    <form id="teams_form" method="Post" enctype="multipart/form-data">
                        @csrf

                         <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="name" class="form-label">Name <span class="required-star text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Add  Name" required>
                                <span class="text-danger error" id="span_name"></span>
                            </div>
                        </div> 

                         <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="designation" class="form-label">Designation <span class="required-star text-danger">*</span></label>
                                <input type="text" class="form-control " name="designation" id="designation" placeholder="Add Designation" required>
                                <span class="text-danger error" id="span_designation"></span>
                            </div>
                        </div> 

                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="description" class="form-label">Description<span class="required-star text-danger">*</span></label>
                                <textarea name="description" class="form-control" rows="4"
                                                        id="description"></textarea>
                                <span class="text-danger error" id="span_desc"></span>
                            </div>
                        </div> 

                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <input type="text" name="teams_id" id="teams_id" hidden>
                                <label for="teams_status" class="form-label">Status</label> <br>
                                <input type="radio"  name="teams_status" value="Active"> Active
                                <input type="radio" name="teams_status" value="In-Active"> In Active <br>
                                <span class="text-danger error" id="span_teams_status"></span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="teams_image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="teams_image" id="teams_image" onchange="validateAndPreviewImage()">
                                <span class="text-danger error" id="span_teams_image"></span>
                            </div>

                            <div class="col-sm-12">
                                <img id="preview_teams_image" src="#" alt="Preview" class="mt-2" style="max-width: 100px; height: auto; display: none;" />
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
                <button type="button" id="Saveteams" class="btn btn-primary">Add</button>
            </div>
        </div>
        </div>
    </div>

    <script> 
        // js load on footer
        window.APP_URLS = {
            teamsStore: "{{ route('teams.store.update') }}",
            csrfToken: "{{ csrf_token() }}", 
            teams_get_data : "{{ route('teams_get_data') }}",
            teams_edit_data : "{{ route('teams.edit' , [':id']) }}",
            teams_delete_data : "{{ route('teams.delete' , [':id']) }}",
            image_path: "{{ asset('public/admin/teams/') }}"

        }; 
    </script>

    <script src="{{ asset('public/admin/js/teams/teams.js') }}" defer></script>

    @endsection
    

     