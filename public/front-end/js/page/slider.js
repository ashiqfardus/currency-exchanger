$(document).ready(function(){
    const pathUrl = $('#pathUrl').val();
    const baseUrl = $('#baseUrl').val();

    $('#send_currency').on('change', function (){
       let send_id = $(this).val();
       let min = $(this).find(':selected').attr('data-min');
       let max = $(this).find(':selected').attr('data-max');
       let send_currency_type = $(this).find(':selected').attr('data-currency-type');
       $('#send_currency_type').val(send_currency_type);

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
        let receive_currency_type = $(this).find(':selected').attr('data-receive-currency');
        let send_currency_type = $('#send_currency_type').val();

        $('#send_unit').val(send);
        $('#receive_unit').val(receive);
        $('#reserve_amount').val(reserve);
        $('#receive_currency_type').val(receive_currency_type);

        $('#show_rate').text('Today\'s rate: '+send +' '+ send_currency_type + ' = ' + receive +' '+ receive_currency_type);
    });

    $('#send_amount').on('keyup', function (){
        let send_unit = $('#send_unit').val();
        let receive_unit = $('#receive_unit').val();
        let reserve_amount = $('#reserve_amount').val();
        let send_amount = $('#send_amount').val();

        let receive_amount = 0;

        if (send_unit>receive_unit){
            receive_amount = parseFloat(send_amount) / parseFloat(send_unit);
        }
        else{
            receive_amount = parseFloat(send_amount) * parseFloat(receive_unit)
        }

        $('#receive_amount').val(parseFloat(receive_amount).toFixed(2));

        if (receive_amount > reserve_amount){
            $('#receive_amount').addClass('error-form-input');
            $('#receive_amount_error').text('Reserve amount is '+reserve_amount);
            $('#submit').attr('disabled', true)
        }
        else{
            $('#receive_amount').removeClass('error-form-input');
            $('#receive_amount_error').text('');
            $('#submit').removeAttr('disabled');
        }
    })

});
