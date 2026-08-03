$(document).ready(function () {

    var table = $('#applicationTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: window.APP_URLS.application_get_data,   
        columns: [ 
            { data: 'id', name: 'id' },
            { data: 'full_name', name: 'full_name' },
            { data: 'email', name: 'email' },
            { data: 'mobile_number', name: 'mobile_number' },
            { data: 'message', name: 'message' },
            { data: 'resume', name: 'resume', orderable: false, searchable: false }
        ]
    });
});