@extends('dashboard')

@section('content')



<div class="container">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Nama Makanan</th>
                <th style="width:10%">Harga</th>
                <th style="width:8%">Jumlah</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"> Aksi </th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0 ?>
            @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            <?php $total += $details['harga'] * $details['jumlah'] ?>
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"><img src="{{ $details['gambar'] }}" width="100" height="100"
                                class="img-responsive" /></div>
                        <div class="col-sm-9">
                            <h4 class="nomargin">{{ $details['nama_masakan'] }}</h4>
                        </div>
                    </div>
                </td>
                <td data-th="Price">Rp.{{ $details['harga'] }}</td>
                <td data-th="Quantity">
                    <input type="number" value="{{ $details['jumlah'] }}" class="form-control quantity" />
                </td>
                <td data-th="Subtotal" class="text-center">Rp.{{ $details['harga'] * $details['jumlah'] }}</td>
                <td class="actions" data-th="">
                    <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                    <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                </td>   
            </tr>
            @endforeach
            @endif
        </tbody>
        </tbody>
        <tfoot>    
            <tr>
                <td colspan="3" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total Rp.{{ $total }}</strong></td>
            </tr>
            <tr>
                <form action="{{route('order')}}" method="get">
                <td colspan="4" class="hidden-xs">
                    <label for="">Nomer Meja</label>

                    <input type="hidden" name="id_masakan" value="{{ $details['id_masakan'] }}">
                    
                    <select name="id_pesan" id="">
                        @foreach($id_pes as $item)
                        <option value="{{$item->id_pesan}}">{{$item->no_meja}}</option>
                        @endforeach
                    </select>
                </td>
                <td><button type="submit" name="" id="" class="btn btn-primary" btn-lg btn-block">Pesan</button></td>
                </form>
            </tr>
            
            
        </tfoot>
    </table>
</div>

@endsection

@section('scripts')


<script type="text/javascript">
    $(".update-cart").click(function (e) {
       e.preventDefault();

       var ele = $(this);

        $.ajax({
           url: '{{ url('update-keranjang') }}',
           method: "patch",
           data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), jumlah: ele.parents("tr").find(".quantity").val()},
           success: function (response) {
               window.location.reload();
           }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Are you sure")) {
            $.ajax({
                url: '{{ url('remove-keranjang') }}',
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>   

@endsection
