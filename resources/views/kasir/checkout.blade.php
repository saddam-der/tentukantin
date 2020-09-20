@extends('layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3> <i class="fas fa-shopping-cart"> Checkout</i> </h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Masakan</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($pesanan_detail as $pesanan_detail)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$pesanan_detail->masakan->nama_masakan}}</td>
                                <td>{{$pesanan_detail->jumlah}}</td>
                                <td>Rp. {{ number_format($pesanan_detail->masakan->harga)}}</td>
                                <td>Rp. {{ number_format($pesanan_detail->jumlah_harga)}}</td>
                                <td>
                                    <form action=" {{url('hapus')/{{ $pesanan_detail->id_masakan }}}} " method="post">
                                        @csrf
                                        {{ method_filed('DELETE') }}
                                        <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> </button>
                                    </form>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection