@extends('layouts.admin')

@section('content')
    <style>
        .select2-selection { overflow: hidden; }
        .select2-selection__rendered { white-space: normal; word-break: break-all; }
        .table>:not(caption)>*>*{
            padding: 0.4rem 0.5rem !important;
        }
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
                        <form method="POST" action="{{ route('currency.updateSave') }}" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-responsive table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>Name</th>
                                        <th>Logo</th>
                                        <th>Currency Type</th>
                                        <th>Reserve</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($currency as $row)
                                        <tr>
                                            <td>
                                                {{$row->name}}
                                                <input type="hidden" name="id[]" value="{{$row->id}}">
                                            </td>
                                            <td class="text-center">
                                                <img src="{{asset('assets/images/currency/'.$row->image)}}" alt="{{$row->image}}" width="10%">
                                            </td>
                                            <td class="text-center">
                                                {{$row->currency_type_name}}
                                            </td>
                                            <td>
                                                <input type="number" name="reserve[]" value="{{$row->reserve}}" class="form-control form-control-sm float-end text-end  @error('reserve.*') is-invalid @enderror" min="0" style="width: 65%" data-parsley-required="true" data-parsley-min="0" step="0.01" data-parsley-type="number">
                                                @error('reserve.*')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            <button class="btn btn-primary mb-3 mt-3 text-end float-end" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.admin.footer')
    </div>
    <script src="{{asset('assets/js/page/currency.js')}}"></script>
    <script>

    </script>
@endsection

