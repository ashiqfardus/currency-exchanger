$(document).ready(function(){
    const pathUrl = $('#pathUrl').val();
    const baseUrl = $('#baseUrl').val();

    $('#send_currency').on('change', function (){
       let send_id = $(this).val();
       let reserve = $(this).find(':selected').attr('data-reserve');
       let min = $(this).find(':selected').attr('data-min');
       let max = $(this).find(':selected').attr('data-max');


    });

});
