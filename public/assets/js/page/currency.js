$(document).ready(function(){

    var baseUrl = $('#baseUrl').val();
    //for add form
    $('#is_active_input').on('click', function (){
        var is_checked = $('#is_active_input').is(':checked');
        if (is_checked){
            $('#is_active').val(1);
        }
        else {
            $('#is_active').val(0);
        }
    });

    //for view form

    //edit modal open
    $('#customers-table-body').on('click','#btn_reserve', function (e){
        var id = $(this).attr('data-id');
        $('#dataId').val(id);
        $('#edit_modal').modal('show');
    });

    //edit modal shown
    $('#edit_modal').on('shown.bs.modal', function (){
        var id = $('#dataId').val();
        $.ajax({
            url: baseUrl+"/getReserve/"+id,
            type: "get",
            dataType: "json",
            success: function(result) {
                $('#reserve').val(result.reserve);
            }
        });
    });

    $('#update_reserve').submit(function (event){
        event.preventDefault();
        $.ajax({
            url: baseUrl+"/updateReserve/",
            type: "post",
            dataType: "json",
            data:$(this).serialize(),
            success: function(result) {
                setTimeout(function () {
                if (result){
                    $.toastr.success('Reserve has been updated.', {position: 'top-right'});
                }
                else{
                    $.toastr.error('Something went wrong.', {position: 'top-right'});
                }}
                , 1000);

                $('#edit_modal').hide();
                setTimeout(function() {
                    location.reload(true);
                }, 1000);
            }
        });
    });


    //    Delete modal open

    $('#customers-table-body').on('click','#btn_delete', function(e){
        var id = $(this).attr('data-id');
        $('#delete_id').val(id);
        $('#delete_modal').modal('show');
    });

});
