@extends('layout')

@section('content')

<div class="container-fluid">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>
            <p>{{ $message }}</p>
        </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
        <div class="card">
            <div class="card-header">
                <div class="col-lg-12 margin-tb mt-3 mb-3">
                    <div class="text-right">
                        <a class="btn btn-success" href="{{ route('admin.create') }}">Tambah Makanan</a>
                    </div>
                </div>
            </div>
            <div class="card-body">


                <table class="table table-striped table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Nama Makanan</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Gambar</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($makanan as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->nama_masakan }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->status }}</td>
                        <td class="text-center"><img width="150px" src="{{ asset('storage/' . $item->gambar) }}"></td>
                        <td class="text-center">
                            <form action="{{ route('admin.destroy',$item->id_masakan) }}" method="POST">

                                <a class="btn btn-primary" href="{{ route('admin.edit',$item->id_masakan) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        




    </div>
</div>
@endsection