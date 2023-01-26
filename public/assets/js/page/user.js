$(document).ready(function(){
    $('#imageView').on('click', function (){
        var userId = $(this).attr('data-id');
        $('#userId').val(userId);
    })

    $('#imageModal').on('shown.bs.modal', function (){
        var userId = $('#userId').val();
        var baseUrl = $('#baseUrl').val();
        var pathUrl = $('#pathUrl').val();
        var img= $('#imageBody')[0];
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN':
                    $('meta[name="csrf-token"]').attr('content') }
        });
        $.ajax({
            url: baseUrl+"/image/"+userId,
            type: "get",
            dataType: "json",
            success: function(result) {
                $('#imageBody').append('<img src="'+pathUrl+'/assets/images/user/'+result+'" width="100%">');
            }
        });
    })
});
