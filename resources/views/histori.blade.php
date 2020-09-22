@extends('layout')

@section('content')
<div class="container-fluid">
    

    
    <div class="card">
        <div class="card-header">
            <div class="col-lg-12 mt-3 mb-3">
                
                   <h2> <i class="fa fa-history"> Histori </i> </h2>
                
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <tr>
                    <th class="text-center">No</th>
                    <th>Tanggal Pesan </th>
                    <th class="text-center">Jumlah Harga</th>
                    <th class="text-center">Jumlah Bayar</th>
                    <th class="text-center">Status</th>
                    <th width="180px" class="text-center">Action</th>
                </tr>
                @foreach ($pesanans as $item)
                
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal_pesan }}</td>
                    <td class="text-center">{{ $item->jumlah_harga }}</td>
                    <td class="text-center">{{ $item->total_bayar }}</td>
                    <td class="text-center">{{ $item->status }}</td>
                    <td class="text-center">
                        <a href="{{ url('histori') }}/{{ $item->id_pesan }}" class="btn btn-info"> <i class="fa fa-info"></i> Detail</a>
                    </td>
                </tr>
                
                @endforeach
            </table>
        </div>
    </div>

</div>

@endsection