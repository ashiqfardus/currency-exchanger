@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="mb-9">
            <div class="row g-2 mb-4">
                <div class="col-auto">
                    <h3 class="mb-0">Currency Details</h3>
                </div>
            </div>
            <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">All <span class="text-700 fw-semi-bold">({{$count}})</span></a></li>
            </ul>
            <div id="products" data-list='{"valueNames":["name","currency_type","reserve","image","is_active"],"page":10,"pagination":true}'>
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
                            <a href="{{route('currency.create')}}" class="btn btn-primary float-end btn-sm mb-0"><span class="fas fa-plus me-2"></span>Add</a>
                        </div>
                    </div>
                </div>
                <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
                    <div class="table-responsive scrollbar-overlay mx-n1 px-1">
                        <table class="table fs--1 mb-0">
                            <thead>

                            <tr>
                                <th class="sort align-middle" scope="col" data-sort="name">Name</th>
                                <th class="sort align-middle" scope="col" data-sort="currency_type">Type</th>
                                <th class="sort align-middle" scope="col" data-sort="reserve">Reserve</th>
                                <th class="sort align-middle" scope="col" data-sort="image">Image</th>
                                <th class="sort align-middle" scope="col" data-sort="is_active">Active Status</th>
                                <th class="sort align-middle text-center" scope="col" data-sort="action">Action</th>
                            </tr>
                            </thead>
                            <tbody class="list" id="customers-table-body">
                                @if($count ==0)
                                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                        <td colspan="6" class="text-center">No data found</td>
                                    </tr>
                                @endif
                                @foreach($data as $row)
                                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                        <td class="name align-middle white-space-nowrap pe-5">
                                            <p class="mb-0 text-1100 fw-bold">{{$row->name}}</p>
                                        </td>
                                        <td class="currency_type align-middle white-space-nowrap pe-5">{{$row->currency_type_name}}</td>
                                        <td class="reserve align-middle white-space-nowrap pe-5">{{$row->reserve}}</td>

                                        <td class="image align-middle white-space-nowrap fw-semi-bold text-1000">
                                            <img src="{{asset('assets/images/user/'.$row->image)}}" alt="{{$row->image}}" width="80px">
                                        </td>
                                        <td class="is_active align-middle white-space-nowrap fw-bold ps-3 text-1100">
                                            <a href="{{route('currency.activate',['id'=>$row->id])}}">
                                                <span class="badge badge-phoenix fs--2 badge-phoenix-{{$row->is_active==0 ? 'danger':'success'}}">
                                                    <span class="badge-label">{{$row->is_active==0 ? 'Inactive':'Active'}}</span>
                                                    <span class="ms-1" data-feather="{{$row->is_active==0 ? 'x':'check'}}" style="height:12.8px;width:12.8px;"></span>
                                                </span>
                                            </a>
                                        </td>
                                        <td class="action align-middle text-center white-space-nowrap fw-bold ps-3 text-1100">
                                            <a class="btn btn-phoenix-primary btn-sm"  data-toggle="tooltip" data-placement="bottom" title="Edit" data-id='{{$row->id}}' id="btn_view">
                                                <i class="fas fa-pencil font-15"></i>
                                            </a>
                                            <a class="btn btn-phoenix-success btn-sm"  data-toggle="tooltip" data-placement="bottom" title="Update reserve" data-id='{{$row->id}}' id="btn_view">
                                                <i class="fas fa-dollar font-15"></i>
                                            </a>
                                            <a class="btn btn-phoenix-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Delete" data-id='{{$row->id}}' id="btn_delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
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
@endsection
