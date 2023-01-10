@extends('layouts.auth')

@section('content')
        <div class="container-fluid px-0" data-layout="container">
            <div class="container">
                <div class="row flex-center min-vh-100 py-5">
                    <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3"><a class="d-flex flex-center text-decoration-none mb-4" href="{{route('/')}}">
                            <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block"><img src="{{asset('assets/img/icons/logo.png')}}" alt="phoenix" width="58" /></div>
                        </a>
                        <div class="text-center mb-7">
                            <h3 class="text-1000">Verify your email address.</h3>
                        </div>
                        @if (session('resent'))
                            <div class="alert alert-soft-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        <p class="text-center">
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }}
                        </p>
                        <div class="row">
                            <div class="col-md-7">
                                <form method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button class="btn btn-secondary w-100" type="submit">{{ __('Resend verification mail') }}</button>
                                </form>
                            </div>
                            <div class="col-md-1">
                                <p class="text-center" style="padding-top: 10px;" >OR</p>
                            </div>
                            <div class="col-md-4">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger btn-outline-dark w-100" type="submit">{{ __('Cancel') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
