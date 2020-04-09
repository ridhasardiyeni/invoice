@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="card-title">Manajemen Data Customer</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('customer.create')}}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {!!session('sucesss')!!}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>No Telp</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                @forelse($customers as $customer)
                                    <tr>
                                        <td>{{$i++}}.</td>
                                        <td>{{ $customer->name}}</td>
                                        <td>{{$customer->phone}}</td>
                                        <td>{{str_limit($customer->address,50)}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>
                                            <form action="{{url('/customer/'.$customer->id)}}" method="post">
                                            @csrf
                                                <input type="hidden" name="_method" class="form-control" value="DELETE">
                                                <a href="{{route('customer.edit',$customer->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                                <button class="btn btn-danger btn-sm">Hapus</button>
                                            </form> 
                                        </td>
                                        <td>
                                            <form action="{{ route('invoice.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="customer_id" value="{{ $customer->id }}" class="form-control">
                                                <button class="btn btn-primary btn-sm">Buat Invoice</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="5">
                                            Tidak Ada Data
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="float-right">
                            {{$customers->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection