@extends('layouts.app')

@section('content')
    <style>
        .fake-input { position: relative;}
        .fake-input input { border:none; display:block; width: 100%; box-sizing: border-box; padding-left: 40px!important;}
        .fake-input img { position: absolute; top: 40px; width: 35px; padding: 5px; }
        .information-div{padding-left: 25px; padding-right: 25px;}
        .information-text-div{
            border: 1px solid #15d708;
            background-color: #e5e5e5;
            border-radius: 15px;
            padding: 10px;
        }
        .disabled{
            background-color: #e5e5e5 !important;
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
                        <div class="row">
                            <div class="col-md-8 mt-3" style="border-right: 1px solid #00A79D;">
                                <form action="{{route('order.store')}}" class="convert-form" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="send_id" value="{{$formData['send_id']}}">
                                    <input type="hidden" name="receive_id" value="{{$formData['receive_id']}}">
                                    <input type="hidden" name="send_unit" value="{{$formData['send_unit']}}">
                                    <input type="hidden" name="receive_unit" value="{{$formData['receive_unit']}}">
                                    <div class="row align-items-center">
                                        <div class="row">
                                            <div class="col-md-6 fake-input form-group">
                                                <label for="send">Send</label>
                                                <input type="text" class="form-control disabled" name="send" id="send" value="{{$formData['send_currency_name']}}" readonly required>
                                                <img src="{{asset('/')}}assets/images/currency/{{$formData['send_currency_image']}}" alt="{{$formData['send_currency_image']}}" class="">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="send_amount">Amount</label>
                                                <input type="text" class="form-control disabled" name="send_amount_show" id="send_amount_show" value="{{$formData['send_amount']}} {{$formData['send_currency_type']}}" readonly required>
                                                <input type="hidden" name="send_amount" id="send_amount" value="{{$formData['send_amount']}}" readonly required>
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
                                                <input type="text" class="form-control disabled" name="receive" id="receive" value="{{$formData['receive_currency_name']}}" readonly required>
                                                <img src="{{asset('/')}}assets/images/currency/{{$formData['receive_currency_image']}}" alt="{{$formData['receive_currency_image']}}" class="">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="receive_amount">Amount</label>
                                                <input type="text" class="form-control disabled" name="receive_amount_show" id="receive_amount_show" value="{{$formData['receive_amount']}} {{$formData['receive_currency_type']}}" readonly required>
                                                <input type="hidden" name="receive_amount" id="receive_amount" value="{{$formData['receive_amount']}}" readonly required>
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
                                        <div class="row mt-3">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <h3>Our Payment ( {{$formData['send_currency_name']}} ) Account Details</h3>
                                                <p>Please make payment to our account and insert your payment details in the field below.</p>
                                                <h3 class="text-center" style="color: #00A79D;"><b>{{$formData['account_details']}}</b></h3>
                                            </div>
                                        </div>

                                        <div class="row mt-3 information-div">
                                            <div class="col-lg-12 col-md-12 col-sm-12 information-text-div">
                                                <h3><i class="ri-information-fill"></i><b>Instructions</b></h3>
                                                <p>{{$formData['instruction']}}</p>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <label for="payment_details">Your Payment Details <span style="color: red">*</span></label>
                                                <textarea name="payment_details" id="payment_details" cols="30" rows="5" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <label for="payment_proof">Payment Proof <span style="color: green">( JPG,JPEG,GIF )</span> <span style="color: red">*</span></label>
                                                <input type="file" class="form-control" name="payment_proof" id="payment_proof" accept="image/*" required>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row mt-20 align-items-center">
                                        <div class="col-xl-12 col-lg-12 text-lg-end">
                                            <button type="submit" class="btn style1">Place Order</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4 mt-3">
                                <h3 class="text-center" ><i class="ri-refresh-line"></i> <b style="text-decoration: underline;">Your Exchange</b></h3>
                                <div class="row mt-3">
                                    <table class="table table-striped table-bordered" style="margin-left: 15px;">
                                        <tbody>
                                            <tr>
                                                <td><i class="ri-arrow-up-line"></i> Amount Send</td>
                                                <td>{{number_format($formData['send_amount'],2, '.', '')}} {{$formData['send_currency_type']}}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="ri-arrow-down-line"></i> Amount Receive</td>
                                                <td>{{$formData['receive_amount']}} {{$formData['receive_currency_type']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Exchange Rate</td>
                                                <td>{{$formData['send_unit']}} {{$formData['send_currency_type']}} = {{$formData['receive_unit']}} {{$formData['receive_currency_type']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Exchange Date</td>
                                                <td>{{date('d-m-Y h:i A')}}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Total for Pay</th>
                                                <th>{{number_format($formData['send_amount'],2, '.', '')}} {{$formData['send_currency_type']}}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('script')

@endsection
