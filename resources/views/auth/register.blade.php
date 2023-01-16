@extends('layouts.auth')

@section('content')
    <main class="main" id="top">
        <div class="container-fluid px-0" data-layout="container">
            <div class="container">
                <div class="row flex-center min-vh-100 py-5">
                    <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3"><a class="d-flex flex-center text-decoration-none mb-4" href="{{route('/')}}">
                            <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block"><img src="{{asset('assets/img/icons/logo.png')}}" alt="phoenix" width="58" /></div>
                        </a>
                        <div class="text-center mb-7">
                            <h3 class="text-1000">Sign Up</h3>
                            <p class="text-700">Create your account today</p>
                        </div>
                        <div class="position-relative mt-4">
                            <hr class="bg-200" />
                            <div class="divider-content-center">Use Email</div>
                        </div>
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 text-start">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" placeholder="Name"  name="name" value="{{ old('name') }}" data-parsley-required="true" autocomplete="name" autofocus />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 text-start">
                                <label class="form-label" for="email">Email address</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" placeholder="name@example.com" name="email" value="{{ old('email') }}" data-parsley-required="true" autocomplete="email"/>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 text-start">
                                <label class="form-label" for="phone">Phone</label>
                                <input class="form-control @error('phone') is-invalid @enderror" id="phone" data-parsley-type="number" data-parsley-length="[11, 11]" placeholder="01XXX XXXXXX" name="phone" value="{{ old('phone') }}" data-parsley-required="true" autocomplete="phone"/>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-12">
                                    <label class="form-label" for="password">Password</label>
                                    <input class="form-control form-icon-input @error('password') is-invalid @enderror" data-parsley-minlength="8" id="password" type="password" placeholder="Password" name="password" data-parsley-required="true" autocomplete="new-password"/>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="password-confirm">Confirm Password</label>
                                    <input class="form-control form-icon-input" id="password-confirm" type="password" data-parsley-minlength="8" placeholder="Confirm Password" name="password_confirmation" data-parsley-required="true" autocomplete="new-password" />
                                </div>
                                <div class="col-md-12 code-to-copy">
                                    <label class="form-label" for="image">NID/Passport/Driving License/Birth Certificate</label>
                                    <input type="file" name="image" id="input-file-now" class="dropify" data-height="100" data-max-file-size="3M" data-allowed-file-extensions="jpg png jpeg gif" data-parsley-required="true"/>
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" id="termsService" type="checkbox" />
                                <label class="form-label fs--1 text-none" for="termsService">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label>
                            </div>
                            <button class="btn btn-primary w-100 mb-3" type="submit">Sign up</button>
                            <div class="text-center"><a class="fs--1 fw-bold" href="{{route('login')}}">Sign in to an existing account</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
