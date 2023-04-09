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
                        <form action="#" class="convert-form">
                            <div class="row">

                            </div>
                            <div class="row mt-20 align-items-center">
                                <div class="col-xl-6 col-lg-4 text-lg-end">
                                    <button type="submit" class="btn style1">Place Order<i
                                            class="ri-arrow-right-s-line"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('script')

@endsection
