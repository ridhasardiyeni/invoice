@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="card-title">Edit Data Product</h3>
                    </div>
                    <div class="box-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
                        <form action="{{route('product.update', $product->id)}}" method="post">
                        @csrf
                            <input type="hidden" name="_method" class="form-control" value="PUT">
                            <div class="form-group">
                                <label for="">Nama Product</label>
                                <input type="text" name="title" class="form-control" value="{{$product->title}}">
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="description" cols="10" rows="10" class="form-control">{{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="price" class="form-control" value="{{$product->price}}">
                            </div>
                            <div class="form-group">
                                <label for="">Stock</label>
                                <input type="number" name="stock" class="form-control" value="{{$product->stock}}">
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