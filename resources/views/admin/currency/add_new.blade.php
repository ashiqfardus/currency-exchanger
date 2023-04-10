@extends('layouts.admin')

@section('content')
    <style>
        .select2-selection { overflow: hidden; }
        .select2-selection__rendered { white-space: normal; word-break: break-all; }
    </style>
    <div class="content">
        <div class="mb-9">
            <div class="row g-2 mb-4">
                <div class="col-auto">
                    <h3 class="mb-0">Add new Currency</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="card" style="width: 75rem;">
                    <div class="card-body">
                        <form method="POST" action="{{ route('currency.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <label class="form-label" for="name">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" placeholder="Name"  name="name" value="{{ old('name') }}" data-parsley-required="true"/>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <label for="reserve" class="form-label">Reserve</label>
                                    <input type="number" class="form-control @error('reserve') is-invalid @enderror" id="reserve" placeholder="Reserve amount" name="reserve" value="{{old('reserve')}}" data-parsley-required="true" data-parsley-min="0" step="0.01" data-parsley-type="number">
                                    @error('reserve')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <label for="currency_type" class="form-label">Currency Type</label>
                                    <select name="currency_type" id="currency_type" class="form-select form-control" data-parsley-required>
                                        <option value="">Select currency type</option>
                                        @foreach($currency_types as $currency)
                                            <option value="{{$currency->id}}">{{$currency->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <label for="account_details" class="form-label">Account Details</label>
                                    <input type="text" class="form-control @error('account_details') is-invalid @enderror" id="account_details" placeholder="Account details" name="account_details" value="{{old('account_details')}}" data-parsley-required="true">
                                    @error('account_details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <label class="form-label" for="instruction">Instruction</label>
                                    <textarea name="instruction" id="instruction" cols="30" rows="7" class="form-control @error('instruction') is-invalid @enderror" required>{{old('instruction')}}</textarea>
                                    @error('instruction')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <label class="form-label" for="image">Image</label>
                                    <input type="file" name="image" id="input-file-now" class="dropify form-control" data-height="140" data-max-file-size="3M" data-allowed-file-extensions="jpg png jpeg gif" data-parsley-required="true"/>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 mt-5">
                                    <label for="is_active_input"></label>
                                    <input type="checkbox" class="form-check-input" name="is_active_input" id="is_active_input" checked><span> Is active</span>
                                    <input type="hidden" name="is_active" id="is_active" value="1">
                                </div>
                            </div>


                            <button class="btn btn-primary mb-3 mt-3 text-end float-end" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.admin.footer')
    </div>
    <script src="{{asset('assets/js/page/currency.js')}}"></script>
@endsection
