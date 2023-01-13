@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="mb-9">
            <div class="row g-2 mb-4">
                <div class="col-auto">
                    <h2 class="mb-0">Users</h2>
                </div>
            </div>
            <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">All <span class="text-700 fw-semi-bold">({{$count}})</span></a></li>
            </ul>
            <div id="products" data-list='{"valueNames":["name","email","email_verified_at","is_admin"],"page":10,"pagination":true}'>
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
                            <button class="btn btn-primary float-end btn-sm mb-0"><span class="fas fa-plus me-2"></span>Add</button>
                        </div>
                    </div>
                </div>
                <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
                    <div class="table-responsive scrollbar-overlay mx-n1 px-1">
                        <table class="table fs--1 mb-0">
                            <thead>
                            <tr>
                                <th class="sort align-middle pe-5" scope="col" data-sort="name">Name</th>
                                <th class="sort align-middle pe-5" scope="col" data-sort="email">Email</th>
                                <th class="sort align-middle pe-5" scope="col" data-sort="email_verified_at">Verification Status</th>
                                <th class="sort align-middle pe-5" scope="col" data-sort="is_admin">Role</th>
                            </tr>
                            </thead>
                            <tbody class="list" id="customers-table-body">
                                @if($count ==0)
                                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                        <td colspan="4" class="text-center">No data found</td>
                                    </tr>
                                @endif
                                @foreach($users as $row)
                                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                        <td class="name align-middle white-space-nowrap pe-5">
                                            <p class="mb-0 text-1100 fw-bold">{{$row->name}}</p>
                                        </td>
                                        <td class="email align-middle white-space-nowrap pe-5"><a class="fw-semi-bold" href="mailto:{{$row->email}}">{{$row->email}}</a></td>
                                        <td class="total-orders align-middle white-space-nowrap fw-semi-bold text-1000">
                                            <a href="@if($row->email_verified_at==null) {{route('users.verify',['id'=>\Illuminate\Support\Facades\Auth::id()])}} @else # @endif">
                                                <span class="badge badge-phoenix fs--2 badge-phoenix-{{$row->email_verified_at==null ? 'danger':'success'}}">
                                                    <span class="badge-label">{{$row->email_verified_at==null ? 'Not verified':'Verified'}}</span>
                                                    <span class="ms-1" data-feather="{{$row->email_verified_at==null ? 'x':'check'}}" style="height:12.8px;width:12.8px;"></span>
                                                </span>
                                            </a>
                                        </td>
                                        <td class="total-spent align-middle white-space-nowrap fw-bold ps-3 text-1100">{{$row->is_admin==1 ? "Admin" : "User"}}</td>
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
        <footer class="footer position-absolute">
            <div class="row g-0 justify-content-between align-items-center h-100">
                <div class="col-12 col-sm-auto text-center">
                    <p class="mb-0 mt-2 mt-sm-0 text-900">Thank you for creating with Phoenix<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2022 &copy;<a class="mx-1" href="https://themewagon.com/">Themewagon</a></p>
                </div>
                <div class="col-12 col-sm-auto text-center">
                    <p class="mb-0 text-600">v1.7.0</p>
                </div>
            </div>
        </footer>
    </div>
@endsection
