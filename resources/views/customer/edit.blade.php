@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="card-title">Edit Data Customer</h3>
                    </div>
                    <div class="box-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
                        <form action="{{route('customer.update', $customer->id)}}" method="post">
                        @csrf
                            <input type="hidden" name="_method" class="form-control" value="PUT">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" value="{{$customer->name}}">
                            </div>
                            <div class="form-group">
                                <label for="">No Telpon</label>
                                <input type="number" name="phone" class="form-control" value="{{$customer->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="address" cols="10" rows="5" class="form-control">{{$customer->address}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" value="{{$customer->email}}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection