@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    @if(Auth::user()->is_admin==1)
                            {{ __('You are logged in as admin!') }}
                    @else
                            {{ __('You are logged in as User!') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
