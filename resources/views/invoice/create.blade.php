@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="card-title">Buat Invoice Baru</h3>
                    </div>
                    <div class="box-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
                        <form action="{{route('invoice.store')}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="">Customer</label>
                                <select name="customer_id" class="form-control" required>
                                    <option value="">Pilih</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}} - {{$customer->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger btn-sm">Buat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection