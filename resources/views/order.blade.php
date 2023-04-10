@extends('layouts.app')

@section('content')
    <style>
        .fake-input { position: relative;}
        .fake-input input { border:none; background:#fff; display:block; width: 100%; box-sizing: border-box; padding-left: 40px!important;}
        .fake-input img { position: absolute; top: 40px; width: 35px; padding: 5px; }
        .information-div{padding-left: 25px; padding-right: 25px;}
        .information-text-div{
            border: 1px solid #15d708;
            background-color: #e5e5e5;
            border-radius: 15px;
            padding: 10px;
        }
    </style>
    <div class="content-wrapper">

        <div class="breadcrumb-wrap bg-f br-1">
            <div class="container">
                <div class="breadcrumb-title">
                    <h2>Exchange Currency</h2>
                    <ul class="breadcrumb-menu list-style">
                        <li><a href="{{'/'}}">Home </a></li>
                        <li>Place Order</li>
                    </ul>
                </div>
            </div>
        </div>


        <section class="convert-wrap ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                        <div class="section-title style1 text-center mb-40">
                            <span>Currency Exchanger</span>
                            <h2>The Reliable, Cheap, &amp; Fastest Way To Exchange Currency</h2>
                        </div>
                    </div>
                </div>
                <div class="convert-box">
                    <div class="convert-tabcontent">
                        <div class="col-md-8">
                            <form action="#" class="convert-form">
                                <div class="row align-items-center">
                                    <div class="row">
                                        <div class="col-md-6 fake-input form-group">
                                            <label for="send">Send</label>
                                            <input type="text" class="form-control" name="send" id="send" value="{{$formData['send_currency_name']}}" readonly required>
                                            <img src="{{asset('/')}}assets/images/currency/{{$formData['send_currency_image']}}" alt="{{$formData['send_currency_image']}}" class="">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="send_amount">Amount</label>
                                            <input type="text" class="form-control" name="send_amount" id="send_amount" value="{{$formData['send_amount']}} {{$formData['send_currency_type']}}" readonly required>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-30">
                                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                            <span class="convert-icon">
                                                <i class="ri-arrow-up-down-fill"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 fake-input form-group">
                                            <label for="receive">Receive</label>
                                            <input type="text" class="form-control" name="receive" id="receive" value="{{$formData['receive_currency_name']}}" readonly required>
                                            <img src="{{asset('/')}}assets/images/currency/{{$formData['receive_currency_image']}}" alt="{{$formData['receive_currency_image']}}" class="">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="receive_amount">Amount</label>
                                            <input type="text" class="form-control" name="receive_amount" id="receive_amount" value="{{$formData['receive_amount']}} {{$formData['receive_currency_type']}}" readonly required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <label for="buyer_name">Your Name <span class="required-color">*</span></label>
                                            <input type="text" name="buyer_name" id="buyer_name" class="form-control" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <label for="buyer_email">Your Email <span class="required-color">*</span></label>
                                            <input type="email" name="buyer_email" id="buyer_email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <label for="account_details">Your {{$formData['receive_currency_name']}} Account <span class="required-color">*</span></label>
                                            <input type="text" name="account_details" id="account_details" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row mt-3 information-div">
                                        <div class="col-lg-12 col-md-12 col-sm-12 information-text-div">
                                            <h3><i class="ri-information-fill"></i><b>Instructions</b></h3>
                                            <p>উপরের দেওয়া Nogad Personal নাম্বারে Send Money করে আপনার Nogad নাম্বার এবং ট্রানজেকশন আইডি পাবেন সেই আইডিটি নিচের বক্সে বসিয়ে এবং আপনে যে টাকা
                                                Sent Money করেছেন তার একটা ScreenShot নিবেন এবং Payment Proof ( Choose File) এ ক্লিক করে Confrim বাটুনে ক্লিক করুন।</p>
                                        </div>
                                    </div>



                                </div>
                                <div class="row mt-20 align-items-center">
                                    <div class="col-xl-6 col-lg-4 text-lg-end">
                                        <button type="submit" class="btn style1" style="padding: 4px 8px;">Place Order<i
                                                class="ri-arrow-right-s-line"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('script')

@endsection
