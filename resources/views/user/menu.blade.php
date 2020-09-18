@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($menu as $item)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" width="100px" height="200px" src="" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#" data-toggle="modal" data-target="#view_{{$item->id_masakan}}">{{ $item->nama_masakan }}</a>
                    </h4>
                    <h5>Rp.{{ $item->harga }}</h5>
                    <p class="card-text"></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted"> tesa</small>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    {{ $menu->links() }}
</div>

<!-- Modal -->
<div class="modal fade" id="view_{{$item->id_masakan}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pesan {{ $item->nama_masakan }} ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary float-right"><a href="{{url('tambah/'.$item->id_masakan)}}" class="text-light">Tambah Ke Keranjang</a></button>
            </div>
        </div>
    </div>
</div>


@endsection