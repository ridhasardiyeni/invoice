@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                        <br>
                            <div class="col-md-6">
                                <h3 class="card-title"><b>Manajemen Product</b> </h3>
                            </div>
                            <div class="col-md-12">
                                <a href="{{route('product.create')}}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="box-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {!!session('success')!!}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</td>
                                    <th>Nama Product </th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Stock</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1?>
                                @forelse($products as $product)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{str_limit($product->description,50)}}</td>
                                    <td>Rp{{number_format($product->price)}}</td>
                                    <td>{{$product->stock}}</td>
                                    <td>{{$product->created_at->format('d-m-Y')}}</td>
                                    <td>
                                        <form action="{{url('/product/'.$product->id)}}" method="post">
                                        @csrf
                                            <input type="hidden" name="_method" value="DELETE" class="form-control">
                                            <a href="{{route('product.edit',$product->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>   
                                    <td class="text-center" colspan="6">Tidak Ada Data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection