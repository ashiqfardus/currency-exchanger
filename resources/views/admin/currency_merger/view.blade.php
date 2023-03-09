@extends('layouts.admin')

@section('content')
    <style>
        .table_padding{
            padding: 5px .5rem !important;
        }
    </style>
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
            <div id="products" data-list='{"valueNames":["send_id","min","max","receive_id","send_unit", "receive_unit"],"page":10,"pagination":true}'>
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
                                <th class="sort align-middle" scope="col" data-sort="receive_unit">Action</th>
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
                <div class="modal-body">
                    <form method="POST" action="{{ route('currency.updateReserve') }}" enctype="multipart/form-data" id="update_reserve">
                        @csrf
                        <input type="hidden" id="dataId" name="dataId">
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

    <script src="{{asset('assets/js/page/currency_merger_view.js')}}"></script>
@endsection
