@extends('layout')

@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Tambah Petugas
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
                    <form method="POST" action="{{ route('register') }}"" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nama_makanan">Nama </label> 
                            <input type="text" name="name" class="form-control">
                        </div>                        
                        <div class="form-group">
                            <label for="harga_makanan">Email</label> 
                            <input type="text" name="email" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label for="harga_makanan">Password</label> 
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="my-input">Level</label>
                            <select class="form-control" name="level">
                                <option value="kasir" >Kasir</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="card mb-3" style="">
                                <div class="row no-gutters">
                                    <div class="col-md-12 ">
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
                        <a class="btn btn-primary float-right mr-2" href="{{  route('admin.index') }}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
