var pathUrl = $('#pathUrl').val();
$(document).ready(function() {
    var baseUrl = $('#baseUrl').val();

    $('#customers-table-body').on('click', '#btn_delete', function (e){
        var id = $(this).attr('data-id');
        $('#delete_id').val(id);
        $('#delete_modal').modal('show');
    });

    $('#customers-table-body').on('click', '#btn_edit', function (e){
        var id = $(this).attr('data-id');
        $('#dataId').val(id);
        $('#edit_modal').modal('show');
    });
});

