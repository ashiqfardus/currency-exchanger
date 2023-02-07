@extends('layouts.admin')

@section('content')
    <style>
        .combined_select{
            position: relative;
            border: 1px solid #e3ebf6;
        }
        /* The container */
        .checkbox-area {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            /*font-size: 22px;*/
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .checkbox-area-header{
            top: 11px;
        }

        /* Hide the browser's default checkbox */
        .checkbox-area input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: -5px;
            left: 8px;
            height: 15px;
            width: 15px;
            background-color: #eee;
        }
        .checkmark-item{
            top: 5px;
        }

        /* On mouse-over, add a grey background color */
        .checkbox-area:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .checkbox-area input:checked ~ .checkmark {
            background-color: #38086f;
        }
        .checkbox-area input:checked ~ .checkmark-item {
            background-color: #56189d !important;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .checkbox-area input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .checkbox-area .checkmark:after {
            left: 5px;
            top: 2px;
            width: 4px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }
        .currency_table th{
            background-color: #324b68;
            text-align: center;
        }
        .custom-field{
            border: 0px solid transparent;
            border-radius: 0px !important;
            width: 100%;
        }
        .table>:not(caption)>*>*{
            padding:0 !important;
        }
    </style>
    <div class="content">
        <div class="mb-9">
            <div class="row g-2 mb-4">
                <div class="col-auto">
                    <h3 class="mb-0">Merge Currency</h3>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="card" style="width: 75rem;">
                    <div class="card-body" id="currency_body">
                        @if($errors->any())
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif
                        <form method="POST" action="{{route('currency_merge.store')}}" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <label for="currency" class="form-label">Currency Type</label>
                                    <select name="currency" id="currency" class="form-select form-control @error('currency') is-invalid @enderror" data-parsley-required @change="getReceiveCurrency">
                                        <option value="">Select currency</option>
                                        @foreach($currency_details as $currency)
                                            <option value="{{$currency->id}}" data-type="{{$currency->currency_type_name}}">{{$currency->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('currency')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <label for="currency_type" class="form-label">Currency Type</label>
                                    <input type="text" class="form-control readOnly" name="currency_type" id="currency_type" readonly data-parsley-required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <label for="min_amount" class="form-label">Minimum sent amount</label>
                                    <input type="number" class="form-control @error('min_amount') is-invalid @enderror" name="min_amount" id="min_amount" data-parsley-required data-parsley-min="0" step="0.01" data-parsley-type="number" value="0" min="0">
                                    @error('min_amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <label for="max_amount" class="form-label">Maximum sent amount</label>
                                    <input type="number" class="form-control @error('max_amount') is-invalid @enderror" name="max_amount" id="max_amount" data-parsley-required data-parsley-min="0" step="0.01" data-parsley-type="number" value="0" min="0">
                                    @error('max_amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-2">
                                    <h5><b>Receive currency details</b></h5>
                                    <div class="col-md-12" id="inc_currency">
                                        <div class="table-responsive">
                                            <table class="table table-bordered data-field-table currency_table" id="currency_table">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        <label class="checkbox-area checkbox-area-header" for="all-raw" style="padding-left: 30px!important;margin-bottom: 2px!important;">
                                                            <input @click="SelectAllRawFunc" type="checkbox" name="all" id="all-raw">&nbsp;
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </th>
                                                    <th style="color: white !important;">Receive Currency</th>
                                                    <th style="color: white !important;">Receive Currency Type</th>
                                                    <th style="color: white !important;">Sent Currency Amount</th>
                                                    <th style="color: white !important;">Receive Currency Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody id="included_prod_tbody">
                                                <tr v-for="(i, index) in rawItem" :id="'raw-row-id'+i" class="row-item">
                                                    <input type="hidden" name="inc_prod_data_id[]" :value="i">
                                                    <td width="10px">
                                                        <label class="checkbox-area">
                                                            <input type="checkbox" name="raw-check-item" class="checkbox-raw-item" :id="'raw-checkbox-id'+i" :data-id="i">
                                                            <span class="checkmark checkmark-item"></span>
                                                        </label>
                                                    </td>
                                                    <td width="250px">
                                                        <select @change="getReceiveCurrencyType(i)" name="receive_currency_id[]" :id="'receive_currency_id'+i" class="custom-field receive_currency_id @error('receive_currency_id.*') is-invalid @enderror" :data-id="i" required>

                                                        </select>
                                                        @error('receive_currency_id.*')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </td>
                                                    <td width="180px">
                                                        <input type="text" style="border: inherit;" class="readOnly custom-field text-center" name="receive_currency_type[]" :id = "'receive_currency_type'+i" :data-id="i" data-parsley-required="true">
                                                    </td>
                                                    <td width="150px">
                                                        <input class="custom-field text-end @error('sent_amount') is-invalid @enderror" style="padding-right: 30px;" type="number" value="0" name="sent_amount[]" :id="'sent_amount'+i" :data-id="i" data-parsley-required="true" data-parsley-min="0" step="0.01" data-parsley-type="number">
                                                        @error('sent_amount')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </td>
                                                    <td width="150px">
                                                        <input class="custom-field text-end @error('receive_amount') is-invalid @enderror" style="padding-right: 30px;" type="number" value="0" name="receive_amount[]" :id="'receive_amount'+i" :data-id="i" data-parsley-required="true" data-parsley-min="0" step="0.01" data-parsley-type="number">
                                                        @error('receive_amount')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </td>

                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr style="padding: 10px;">
                                                        <td colspan="5">
                                                            <span @click="AddMoreRaw" id="add_row" style="padding: 0px 5px 0px 5px" class="btn btn-sm btn-success readOnly"><i class="fa fa-plus"></i></span>
                                                            <span @click="removeItemRaw" style="padding: 0px 5px 0px 5px" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></span>
                                                        </td>
                                                    </tr>

                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <button class="btn btn-success mb-3 mt-3 text-end float-end" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('includes.admin.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="{{asset('assets/js/page/currency_merger.js')}}"></script>
@endsection
