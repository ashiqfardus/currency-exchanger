$(document).ready(function(){
    $('#is_active_input').on('click', function (){
        var is_checked = $('#is_active_input').is(':checked');
        if (is_checked){
            $('#is_active').val(1);
        }
        else {
            $('#is_active').val(0);
        }
    })
});
