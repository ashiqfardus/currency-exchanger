@extends('layouts.admin')

@section('content')
    <style>
        .table_padding{
            padding: 5px .5rem !important;
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/css/vue_table.css')}}">
    <div class="content">
        <div class="mb-9">
            <div class="row g-2 mb-4">
                <div class="col-auto">
                    <h3 class="mb-0">Currency Merger Details</h3>
                </div>
            </div>
            <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">All <span class="text-700 fw-semi-bold">({{$count}})</span></a></li>
            </ul>
            <div id="products" data-list='{"valueNames":["send_id","min","max","receive_id","send_unit", "receive_unit","is_active"],"page":10,"pagination":true}'>
                <div class="mb-4">
                    <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                        <div class="col-auto d-flex">
                            <div class="search-box">
                                <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                    <input class="form-control form-control-sm search-input search" type="search" placeholder="Search customers" aria-label="Search" />
                                    <span class="fas fa-search search-box-icon"></span>
                                </form>
                            </div>
                        </div>
                        <div class="col-auto d-flex">
                            <a href="{{route('currency_merge.create')}}" class="btn btn-primary float-end btn-sm mb-0"><span class="fas fa-plus me-2"></span>Add</a>
                        </div>
                    </div>
                </div>
                <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
                    <div class="table-responsive scrollbar-overlay mx-n1 px-1">
                        <table class="table table-bordered text-center fs--1 mb-0">
                            <thead>

                            <tr>
                                <th class="sort align-middle" scope="col" data-sort="send_id">Send Currency</th>
                                <th class="sort align-middle" scope="col" data-sort="min">Min</th>
                                <th class="sort align-middle" scope="col" data-sort="max">Max</th>
                                <th class="sort align-middle" scope="col" data-sort="receive_id">Receive Currency</th>
                                <th class="sort align-middle" scope="col" data-sort="send_unit">Send Amount</th>
                                <th class="sort align-middle" scope="col" data-sort="receive_unit">Receive Amount</th>
                                <th class="sort align-middle" scope="col" data-sort="is_active">Active Status</th>
                                <th class="sort align-middle" scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody class="list" id="customers-table-body">
                                @if($count ==0)
                                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                        <td colspan="6" class="text-center">No data found</td>
                                    </tr>
                                @endif

                                @foreach($data as $k=>$row)
                                    @php
                                    $c = count($row);
                                    @endphp
                                    <tr>
                                        <td class="table_padding align-middle"  rowspan="{{$c}}">{{$row[0]->send_currency_name}}</td>
                                        <td class="table_padding align-middle"  rowspan="{{$c}}">{{$row[0]->min}}</td>
                                        <td class="table_padding align-middle"  rowspan="{{$c}}">{{$row[0]->max}}</td>
                                        <td class="table_padding" >{{$row[0]->rcv_currency_name}}</td>
                                        <td class="table_padding" >{{$row[0]->sent_unit}} {{$row[0]->send_currency_type}}</td>
                                        <td class="table_padding" >{{$row[0]->receive_unit}} {{$row[0]->rcv_currency_type}}</td>
                                        <td rowspan="{{$c}}">{{($row[0]->is_active == 0 ? "Inactive" : "Active")}}</td>
                                        <td rowspan="{{$c}}">
                                            <a class="btn btn-phoenix-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit" data-id='{{$row[0]->send_id}}' id="btn_edit">
                                                <i class="fas fa-pencil"></i>
                                            </a>
                                            <a class="btn btn-phoenix-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Delete" data-id='{{$row[0]->send_id}}' id="btn_delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @for($i=1; $i<$c; $i++)
                                        <tr>
                                            <td class="table_padding" >{{$row[$i]->rcv_currency_name}}</td>
                                            <td class="table_padding" >{{$row[$i]->sent_unit}} {{$row[$i]->send_currency_type}}</td>
                                            <td class="table_padding" >{{$row[$i]->receive_unit}} {{$row[$i]->rcv_currency_type}}</td>
                                        </tr>
                                    @endfor
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    @if($count!=0)
                    <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                            <div class="col-auto d-flex">
                                <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p>
                                <a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                                <a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                            </div>
                        <div class="col-auto d-flex">
                            <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                            <ul class="mb-0 pagination"></ul>
                            <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @include('includes.admin.footer')
    </div>

    {{--  Edit modal  --}}
    <div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Currency Merger</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="edit_currency_body">
                    <form method="POST" action="{{ route('currency.updateMerger') }}" enctype="multipart/form-data" id="currency_merger_edit">
                        @csrf
                        <input type="hidden" id="dataId" name="dataId">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="edit_currency" class="form-label">Currency</label>
                                <select name="edit_currency" id="edit_currency" class="form-select form-control readOnly @error('currency') is-invalid @enderror" data-parsley-required @change="getReceiveCurrency">

                                </select>
                                @error('currency')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="edit_currency_type" class="form-label">Currency Type</label>
                                <input type="text" class="form-control readOnly" name="edit_currency_type" id="edit_currency_type" readonly data-parsley-required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="edit_min_amount" class="form-label">Minimum sent amount</label>
                                <input type="number" class="form-control @error('min_amount') is-invalid @enderror" name="edit_min_amount" id="edit_min_amount" data-parsley-required data-parsley-min="0" step="0.01" data-parsley-type="number" value="0" min="0">
                                @error('min_amount')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="edit_max_amount" class="form-label">Maximum sent amount</label>
                                <input type="number" class="form-control @error('max_amount') is-invalid @enderror" name="edit_max_amount" id="edit_max_amount" data-parsley-required data-parsley-min="0" step="0.01" data-parsley-type="number" value="0" min="0">
                                @error('max_amount')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <h6><b>Receive currency details</b></h6>
                            <div class="col-md-12" id="inc_currency">
                                <div class="table-responsive">
                                    <table class="table table-custom table-bordered data-field-table currency_table" id="currency_table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="checkbox-area checkbox-area-header" for="all-raw" style="padding-left: 30px!important;margin-bottom: 2px!important;">
                                                        <input @click="SelectAllRawFunc" type="checkbox" name="all" id="all-raw">&nbsp;
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <th style="color: white !important; font-size: 12px !important;">Receive Currency</th>
                                                <th style="color: white !important; font-size: 12px !important;">Receive Currency Type</th>
                                                <th style="color: white !important; font-size: 12px !important;">Sent Currency Amount</th>
                                                <th style="color: white !important; font-size: 12px !important;">Receive Currency Amount</th>
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
                                                <select @change="getReceiveCurrencyType(i)" name="edit_receive_currency_id[]" :id="'edit_receive_currency_id'+i" class="custom-field receive_currency_id @error('receive_currency_id.*') is-invalid @enderror" :data-id="i" required>

                                                </select>
                                                @error('receive_currency_id.*')
                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                @enderror
                                            </td>
                                            <td width="180px">
                                                <input type="text" style="border: inherit;" class="readOnly custom-field text-center" name="edit_receive_currency_type[]" :id = "'edit_receive_currency_type'+i" :data-id="i" data-parsley-required="true">
                                            </td>
                                            <td width="150px">
                                                <input class="custom-field text-end @error('sent_amount') is-invalid @enderror" style="padding-right: 30px;" type="number" value="0" name="edit_sent_amount[]" :id="'edit_sent_amount'+i" :data-id="i" data-parsley-required="true" data-parsley-min="0" step="0.01" data-parsley-type="number">
                                                @error('sent_amount')
                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                @enderror
                                            </td>
                                            <td width="150px">
                                                <input class="custom-field text-end @error('receive_amount') is-invalid @enderror" style="padding-right: 30px;" type="number" value="0" name="edit_receive_amount[]" :id="'edit_receive_amount'+i" :data-id="i" data-parsley-required="true" data-parsley-min="0" step="0.01" data-parsley-type="number">
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
                                                <span @click="AddMoreRaw" id="add_row" style="padding: 0px 5px 0px 5px" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></span>
                                                <span @click="removeItemRaw" style="padding: 0px 5px 0px 5px" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></span>
                                            </td>
                                        </tr>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="is_active_input"></label>
                                <input type="checkbox" class="form-check-input" name="is_active_input" id="is_active_input"><span> Is active</span>
                                <input type="hidden" name="is_active" id="is_active" value="0">
                            </div>
                        </div>

                        <button class="btn btn-primary btn-sm mb-3 mt-3 text-end float-end" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--  Delete modal  --}}

    <div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete currency</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('currency_merge.delete') }}" enctype="multipart/form-data">
                    <div class="modal-body">

                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="delete_id" name="delete_id">
                        <h5>Are you sure you want to delete?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="{{asset('assets/js/page/currency_merger_view.js')}}"></script>
@endsection
