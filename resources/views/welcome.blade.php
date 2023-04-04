@extends('layouts.app')

@section('content')

    @include('includes.front-end.sections.slider')


    @include('includes.front-end.sections.currency_tool')


    @include('includes.front-end.sections.about_us')


    @include('includes.front-end.sections.exchange_rate')


    @include('includes.front-end.sections.we_provide')


    @include('includes.front-end.sections.partner')


    @include('includes.front-end.sections.features')


    @include('includes.front-end.sections.currency_reserve')


    @include('includes.front-end.sections.testimonial')


    @include('includes.front-end.sections.blog')

@endsection

@section('script')
    <script src="{{asset('/')}}front-end/js/page/slider.js"></script>
@endsection
