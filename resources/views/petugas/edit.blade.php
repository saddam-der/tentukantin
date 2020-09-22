@extends('layout')

@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Edit Petugas
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
                    
                    <form  action="{{ route('petugas.update',$petugas->id_user) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_makanan">Nama </label> 
                            <input type="text" name="name" class="form-control" aria-describedby="title" value="{{ $petugas->name }}">
                        </div>
                        <div class="form-group">
                            <label for="harga_makanan">Email</label> 
                            <input type="text" name="email" class="form-control"  aria-describedby="publisher" value="{{ $petugas->email }}">
                        </div>
                        <div class="form-group">
                            <label for="harga_makanan">Password</label> 
                            <input type="password" name="password" class="form-control"  aria-describedby="publisher">
                        </div>

                        <input type="hidden" name="level" value="{{ $petugas->level }}">
                        <input type="hidden" name="id_user" value="{{ $petugas->id_user }}">
                        <div class="form-group">
                            <div class="card mb-3" style="">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img class="rounded" src="{{ asset('storage/' . $petugas->foto) }}" alt="{{ $petugas->name }}" width="300">
                                    </div>
                                    <div class="col-md-7 ml-5">
                                        <div class="card-body">
                                            <div class="custom-file">
                                                <input type="file" name="foto" class="custom-file-input">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                        <a class="btn btn-primary float-right mr-2" href="{{  route('admin.petugas') }}">Cancel</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
