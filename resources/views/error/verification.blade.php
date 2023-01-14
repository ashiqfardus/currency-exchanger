@extends('layouts.auth')

@section('content')
    <main class="main" id="top">
        <div class="container-fluid px-0" data-layout="container">
            <div class="px-3">
                <div class="row min-vh-100 flex-center p-5">
                    <div class="col-12 col-xl-10 col-xxl-8">
                        <div class="row justify-content-center g-5">
                            <div class="col-12 col-lg-6 text-center order-lg-1">
                                <img class="img-fluid w-md-50 w-lg-100 d-dark-none" src="../../assets/img/spot-illustrations/404-illustration.png" alt="" width="540" />
                                <img class="img-fluid w-md-50 w-lg-100 d-light-none" src="../../assets/img/spot-illustrations/dark_404-illustration.png" alt="" width="540" />
                            </div>
                            <div class="col-12 col-lg-6 text-center text-lg-start">
                                <h2 class="text-800 fw-bolder mb-3">Account not approved!!</h2>
                                <p class="text-900 mb-5">Please wait until an admin approve your account. </p>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger btn-outline-dark" type="submit">{{ __('Cancel') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
