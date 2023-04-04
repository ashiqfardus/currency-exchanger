$(document).ready(function(){
    const pathUrl = $('#pathUrl').val();
    const baseUrl = $('#baseUrl').val();

    $('#send_currency').on('change', function (){
       let send_id = $(this).val();
       let min = $(this).find(':selected').attr('data-min');
       let max = $(this).find(':selected').attr('data-max');

        $.ajax({
            url: pathUrl+"/getReceiveCurrencyDetailsBySendCurrencyId/"+send_id,
            type: "get",
            dataType: "json",
            success: function(result) {
                $('#receive_currency').html(result.option);
            }
        });
       $('#send_amount').attr('min',min);
       $('#send_amount').attr('max',max);
    });


    $('#receive_currency').on('change', function (){
        let send = $(this).find(':selected').attr('data-send');
        let receive = $(this).find(':selected').attr('data-receive');
        let reserve = $(this).find(':selected').attr('data-reserve');

        $('#send_unit').val(send);
        $('#receive_unit').val(receive);
        $('#reserve_amount').val(reserve);
    });

});
