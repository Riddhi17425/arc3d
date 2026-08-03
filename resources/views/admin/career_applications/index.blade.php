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
                        <h3 class="fw-bold mb-0">Career Inquiries</h3>
                    </div>   
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3"> 
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="applicationTable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Full Name</th>
                                        <th>Email Id</th>
                                        <th>Mobile Number</th>
                                        <th>Message</th>
                                        <th>Download Resume</th>   
                                    </tr>
                                </thead> 
                               
                            </table>
                        </div>
                    </div>
                </div> 
            </div><!-- Row End --> 
        </div> 
    </div>

    <script>
        // js load on footer
        window.APP_URLS = {
            csrfToken: "{{ csrf_token() }}", 
            application_get_data : "{{ route('fetch.applications') }}",
        }; 
    </script>

    <script src="{{ asset('public/admin/js/career_application/application.js') }}" defer></script>

@endsection