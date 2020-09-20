@extends('layout')

@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Edit Makanan
                </div>
                <div class="card-body shadow-lg">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" action="{{ route('admin.update',$admin->id_masakan) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_makanan">Nama Makanan</label> 
                            <input type="text" name="nama_masakan" class="form-control" aria-describedby="title" value="{{ $admin->nama_masakan }}">
                        </div>
                        <div class="form-group">
                            <label for="harga_makanan">harga</label> 
                            <input type="text" name="harga" class="form-control"  aria-describedby="publisher" value="{{ $admin->harga }}">
                        </div>
                        <div class="form-group">
                            <label for="rincian_makanan">Status</label> 
                            <select name="status" class="custom-select">
                                <option value="ada">Ada</option>
                                <option value="habis">Habis</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="card mb-3" style="">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img class="rounded" src="{{ asset('storage/' . $admin->gambar) }}" alt="{{ $admin->nama_masakan }}" width="300">
                                    </div>
                                    <div class="col-md-7 ml-5">
                                        <div class="card-body">
                                            <div class="custom-file">
                                                <input type="file" name="gambar_masakan" class="custom-file-input">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                        <a class="btn btn-primary float-right mr-2" href="{{  route('admin.index') }}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
