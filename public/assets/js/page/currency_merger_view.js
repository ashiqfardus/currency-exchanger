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

    $('#edit_modal').on('shown.bs.modal', function (){
        var id = $('#dataId').val();
        $.ajax({
            url: pathUrl+"/admin/currency/merge/getCurrencyDetails/"+id,
            type: "get",
            dataType: "json",
            success: function(result) {
                $('#edit_currency').html(result.currency_details);
                $('#edit_currency_type').val(result.currency_type_name);
                $('#edit_min_amount').val(result.min);
                $('#edit_max_amount').val(result.max);
                $('#included_prod_tbody').html(result.tr);
                if(result.active_status === 0){
                    $('#is_active_input').attr('checked', false);
                    $('#is_active').val(0);
                }
                else{
                    $('#is_active_input').attr('checked', true);
                    $('#is_active').val(1);
                }
            }
        });
    });

    $('#is_active_input').on('click', function (){
        var is_checked = $('#is_active_input').is(':checked');
        if (is_checked){
            $('#is_active').val(1);
        }
        else {
            $('#is_active').val(0);
        }
    });

    $('#edit_modal').on('hidden.bs.modal', function () {
        $('#currency_merger_edit')[0].reset();
        $('#included_prod_tbody').html('');
    })

    //currency on change get currency type
    $('#edit_currency').on('change', function (){
        let currency_type = $(this).find(':selected').attr('data-type');
        $('#edit_currency_type').val(currency_type);
    });
});


var edit_currency_body = new Vue({
    el:'#edit_currency_body',
    data:{
        rawItem :0
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
            // if(isNotExistRow){
            //     this.rawItem++;
            // }
        },

        getReceiveCurrency:function (){
            var sent_currency_id = $('#edit_currency').val();
            var id = this.rawItem;

            if (sent_currency_id !== ''){
                $.ajax({
                    url: pathUrl+"/admin/currency/merge/getReceiveUrl/"+sent_currency_id,
                    type: "get",
                    dataType: "json",
                    success: function(result) {
                        $('#edit_receive_currency_id'+id).html(result.td);
                    }
                });
            }
        },
        getReceiveCurrencyType:function(id){
            var dataId = id;
            var currencyType = $('#edit_receive_currency_id'+dataId).find(':selected').attr('data-type');
            $('#edit_receive_currency_type'+dataId).val(currencyType);
        }
    }
});

function getReceiveCurrencyTypeEdit(id){
    edit_currency_body.getReceiveCurrencyType(id);
}

