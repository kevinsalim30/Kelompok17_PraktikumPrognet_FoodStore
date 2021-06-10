@extends('admin')
@section('css')
<style>
    .dataTables_filter {
        float: right !important;
    }

</style>
@endsection
@section('page-contents')
@if(Session::has('success'))
<div class="alert alert-success">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        Data Berhasil Dimasukan
    </div>
</div>
@endif

@if(Session::has('edits'))
<div class="alert alert-success">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        Data Berhasil Dirubah
    </div>
</div>
@endif

@if(Session::has('delete'))
<div class="alert alert-danger">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        Data Berhasil Dihapus
    </div>
</div>
@endif
    <div class="panel">
      <div class="panel-heading">
          <h3 class="panel-title">Product</h3>
      </div>
      <div class="panel-body">
          {{-- ------------------------------------------TOMBOL TAMBAH DATA---------------------------------------- --}}
          <button type="button" class="btn btn-info " data-toggle="modal" data-target="#tambahdata">
            <i class="fa fa-plus-square"></i>
            Tambah Data
        </button>
          {{-- ------------------------------------------Section & Tambah data---------------------------------------- --}}
          <br>
          <br>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Makanan</th>
          <th>Harga</th>
          <th>Deskripsi</th>
          <th>Rating</th>
          <th>Stok</th>
          <th>Berat</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
      @forelse ($data as $item)
        <tr>
          <td>{{$loop->iteration }}</td>
          <td>{{$item->product_name}}</td>
          <td>{{$item->price}}</td>
          <td>{{$item->description}}</td>
          <td>{{$item->product_rate}}</td>
          <td>{{$item->stock}}</td>
          <td>{{$item->weight}}</td>
          <td class="text-center">
        {{-- TOMBOL DELETE DAN EDIT --}}
        <form action="/products/{{$item->id}}" method="POST">
          @csrf
          {{method_field('DELETE')}}

          {{-- TOMBOL EDIT --}}
          <a href="/products/{{$item->id}}/edit" class="btn btn-primary">Edit

          </a>

          {{-- TOMBOL DELETE --}}
          <button type="submit" name="submit" class="btn btn-danger">Delete

          </button>
      </form>
  </td>
  </tr>

  @empty
  <tr>
  <td class="text-center" colspan="3">
      <p>Tidak ada data</p>
  </td>
  </tr>
  @endforelse
      </tbody>
    </table>
  </div>

  </body>
  </html>

  <!--------------------------------------- Modal Tambah data--------------------------------------------- -->
  <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Menambahkan Data Baru</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="/products" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-body">
                      {{-- Nama Product --}}
                      <div class="form-group row">
                          <label class="col-sm-5 col-form-label">Nama Makanan</label>
                          <div class="col-sm-10">
                              <input name="product_name" type="text" class="form-control"
                                  placeholder="Nama produk yang ingin ditambahkan">
                          </div>
                      </div>
                      {{-- Price --}}
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input name="price" type="number" class="form-control"
                                placeholder="Harga produk yang ingin ditambahkan">
                        </div>
                    </div>
                    {{-- Description --}}
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input name="description" type="text" class="form-control"
                                placeholder="Deskripsi produk yang ingin ditambahkan">
                        </div>
                    </div>
                    {{-- Product Rate --}}
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Rating</label>
                        <div class="col-sm-10">
                            <input name="product_rate" type="number" class="form-control"
                                placeholder="Rating produk yang ingin ditambahkan">
                        </div>
                    </div>
                    {{-- Stock --}}
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input name="stock" type="number" class="form-control"
                                placeholder="Stok produk yang ingin ditambahkan">
                        </div>
                    </div>
                    {{-- Weight --}}
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Berat</label>
                        <div class="col-sm-10">
                            <input name="weight" type="number" class="form-control"
                                placeholder="Berat produk yang ingin ditambahkan">
                        </div>
                    </div>
                    {{-- product images --}}
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Gambar Makanan</label>

                    <div class="form-group bmd-form-group form-file-upload form-file-multiple">
                        <input type="file" multiple="" name="product_images[]" class="inputFileHidden">
                </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  @endsection
  {{-- javascript tambahan --}}
  @section('javascript')
  <!--Java Script untuk Data Table-->
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
  <script>
      $(document).ready(function () {
          $('#example').DataTable();
      });

  </script>

  @endsection
