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
                    <a class="btn btn-success" href="{{ route('register') }}">Tambah Kasir</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama </th>
                    <th>Email</th>
                    <th class="text-center">Level</th>
                    <th class="text-center">Foto</th>
                    <th width="180px" class="text-center">Action</th>
                </tr>
                @foreach ($petugas as $key => $item)
                @if($item->level == "kasir")
                <tr>
                    <td class="text-center">{{ $key+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td class="text-center">{{ $item->level }}</td>
                    <td class="text-center"><img width="150px" height="150px" src="{{ asset('storage/' . $item->foto) }}"></td>
                    <td class="text-center">
                        <form action="{{ route('petugas.destroy',$item->id_user) }}" method="POST">

                            {{-- <a class="btn btn-primary" href="{{ route('petugas.edit', $item->id_user) }}">Edit</a> --}}

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </table>
        </div>
    </div>

</div>

@endsection