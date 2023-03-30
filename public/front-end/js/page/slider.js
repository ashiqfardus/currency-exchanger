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

});
