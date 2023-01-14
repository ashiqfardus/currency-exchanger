@extends('layouts.auth')

@section('content')
    <main class="main" id="top">
        <div class="container-fluid px-0" data-layout="container">
            <div class="px-3">
                <div class="row min-vh-100 flex-center p-5">
                    <div class="col-12 col-xl-10 col-xxl-8">
                        <div class="row justify-content-center g-5">

                            <div class="col-6 col-lg-6 text-center text-lg-start">
                                <p class="text-900 mb-5">You don't have permission to access this page. </p>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger btn-outline-dark" type="submit">{{ __('Cancel') }}</button>
                                </form>
                            </div>
                            <div class="col-6 col-lg-6 text-center order-lg-1">
                                <h1 style="color: #4a8ff3; font-size: 100px">403 Access Forbidden</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
