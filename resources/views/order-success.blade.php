@extends('layouts.app')

@section('content')
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
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center mt-3">
                                <h3 class="text-success"><b>{{$success}}</b></h3>
                                <h5>Thank you for exchanging with us. Your order no. is <span class="text-success" style="font-family: Arial,sans-serif !important;"><b>{{$order_no}}</b></span></h5>
                                <p>Please visit your <a href="" class="text-primary" style="text-decoration: none">dashboard</a> to get update of order.</p>
                                <p style="font-weight: bold">Return to <a href="{{route('/')}}" class="text-success" style="text-decoration: none;">Home</a></p>
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
