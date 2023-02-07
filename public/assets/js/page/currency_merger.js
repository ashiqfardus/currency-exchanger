var pathUrl = $('#pathUrl').val();
$(document).ready(function() {

    var baseUrl = $('#baseUrl').val();

    //get currency type on change currency
    $('#currency').on('change', function (){
       let currency_type = $(this).find(':selected').attr('data-type');
       $('#currency_type').val(currency_type);

       let id = $(this).val();
       if (id !==''){
           $('#add_row').removeClass('readOnly');
       }
       else{
           $('#add_row').addClass('readOnly');
       }
    });

});

var currency_body = new Vue({
    el:'#currency_body',
    data:{
        rawItem :1
    },
    methods:{
        resetCreate:function (){
            $('.checkbox-raw-item').each(function(){
                var id = $('#'+this.id).attr('data-id');
                $('#raw-row-id'+id).html('');
            });
            this.AddMoreRaw();
        },
        AddMoreRaw:function(){
            this.rawItem++;
            this.getReceiveCurrency();
        },
        SelectAllRawFunc:function(){
            var isAllSel = $('#all-raw').is( ":checked" )
            if(isAllSel){
                $('.checkbox-raw-item').each(function(){
                    if($('#'+this.id).is( ":checked" ) == false){
                        document.getElementById(this.id).checked = true;
                    }
                });
            }else{
                $('.checkbox-raw-item').each(function(){
                    if($('#'+this.id).is( ":checked" )){
                        document.getElementById(this.id).checked = false;
                    }
                });
            }
        },
        removeItemRaw:function(){
            $('.checkbox-raw-item').each(function(){
                if($('#'+this.id).is(":checked")){
                    var id = $('#'+this.id).attr('data-id');
                    $('#raw-row-id'+id).html('');
                }
            });
            document.getElementById('all-raw').checked = false;
            var isNotExistRow = true;
            $('.row-item').each(function(){
                var isText = $('#'+this.id).text();
                if(isText != ''){
                    isNotExistRow = false;
                }
            });
            if(isNotExistRow){
                this.rawItem++;
            }
        },

        getReceiveCurrency:function (){
            var sent_currency_id = $('#currency').val();
            var id = this.rawItem;

            if (sent_currency_id !== ''){
                $.ajax({
                    url: pathUrl+"/admin/currency/merge/getReceiveUrl/"+sent_currency_id,
                    type: "get",
                    dataType: "json",
                    success: function(result) {
                        $('#receive_currency_id'+id).html(result.td);
                    }
                });
            }
        },
        getReceiveCurrencyType:function(id){
            var dataId = id;
            var currencyType = $('#receive_currency_id'+dataId).find(':selected').attr('data-type');
            $('#receive_currency_type'+dataId).val(currencyType);
        }
    }
});
