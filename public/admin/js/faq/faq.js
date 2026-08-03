$(document).ready(function () {
   
    var table = $('#faq_table').DataTable({
    processing: true,
    serverSide: true,
    ajax: window.APP_URLS.getfaqdata, 
    order: [[0, 'desc']],
    columns: [
        { data: 'id', name: 'id' },
        { data: 'faq_url', name: 'faq_url' }, 
        {
            data: 'title_description',
            name: 'title_description',
            render: function(data, type, row) {
                // Assuming title_description is an array and needs to be displayed as text
                let titles = data.map(item => item.title).join(", ");
                let descriptions = data.map(item => item.description).join(" / ");
                return titles + " - " + descriptions;
            }
        },
        { data: 'status', name: 'status' },
        { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
});

    // delete milestone
    $(document).on('click', '.delete_faq', function () {
        let id = $(this).data('id');

        var url = window.APP_URLS.deletefaq.replace(':id' , id);
        if (confirm('Are you sure you want to delete this data?')) {
            $.ajax({
                url: url,  // Make sure your route matches this
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': window.APP_URLS.csrfToken
                },
                success: function (response) {
                   if(response.result){
                        $("#message-pop-up").attr('style' , 'display:block')
                        $("#message-pop-up").addClass('alert-success')
                        $("#success-message").html(response.message);
                        setTimeout(() => {
                            $("#message-pop-up").attr('style' , 'display:none')
                        }, 3000);
                        table.draw();
                    }else{
                        $("#message-pop-up").attr('style' , 'display:block')
                        $("#message-pop-up").addClass('alert-warning')
                        $("#success-message").html(response.message);
                        setTimeout(() => {
                            $("#message-pop-up").attr('style' , 'display:none')
                        }, 3000);
                    }
                },
                error: function (xhr) {
                    alert('Something went wrong!');
                }
            }); 
        }
    });
});
