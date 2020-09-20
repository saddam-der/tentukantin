@extends('layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-5">
            <div class="card">
                <div class="card-header">                    
                    <div class="d-flex">
                        <div class="p-2 "><h3> <i class="fas fa-shopping-cart"> Checkout </i> </h3></div>
                        @if(!empty($pesanan))
                        <div class="ml-auto p-2">Tanggal Pesan : {{ $pesanan->tanggal_pesan }}</div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" style="100%">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Masakan</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Total Harga</th>
                                <th class="text-center" style="width: 160px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($pesanan_details as $pesanan_detail)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$pesanan_detail->masakan->nama_masakan}}</td>
                                <td class="text-center">{{$pesanan_detail->jumlah}}</td>
                                <td class="text-center">Rp. {{ number_format($pesanan_detail->masakan->harga)}}</td>
                                <td>Rp. {{ number_format($pesanan_detail->jumlah_harga)}}</td>
                                <td class="text-center" >
                                    <form action=" {{url('hapus')}}/{{ $pesanan_detail->id_masakan }} " method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"> Hapus</i> </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-right"> <strong> Total Harga : </strong></td>
                                <td >Rp. {{ number_format($pesanan->jumlah_harga) }} </td>
                                <td class="text-center">
                                    <a href="{{ url('confirm') }}" class="btn btn-success"> <i class="fa fa-shopping-cart"> Check Out</i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection