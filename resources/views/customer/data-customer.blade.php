@extends('template')
@section('title','Data Customer')
@section('css')
@endsection

@section('konten')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Button trigger modal -->
<div class="row">
    <div class="col-md-4">
        <button type="button" class="btn btn-primary mb-3 mt-3" style="margin-left:20px;" data-toggle="modal"
            data-target="#coba">
            Create Customer</button>
    </div>

    <div class="col-md-4">
        <button type="button" class="btn btn-danger mb-3  mt-3" data-toggle="modal" data-target="#import">
            <i class="fa fa-plus-circle mr-2"></i>Import Excel</button>
    </div>

    <div class="col-md-4">
        <a href="/export-excel"><button type="button" class="btn btn-success mb-3 mt-3" style="margin-left:20px;">
                Export Excel</button></a>
    </div>
</div>

<table class="table table-hover table-striped table-bordered table-responsive">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Email</th>
            <th>HP</th>
            <th>Perusahaan</th>
        </tr>
    </thead>
    <tbody>
        @php $nomor=1; @endphp
        @foreach($customer as $c)
        <tr>
            <td>@php echo $nomor++; @endphp</td>
            <td>{{$c->nama_customer}}</td>
            <td>{{$c->alamat_customer}}</td>
            <td>{{$c->kota_customer}}</td>
            <td>{{$c->email_customer}}</td>
            <td>{{$c->hp_customer}}</td>
            <td>{{$c->perusahaan_customer}}</td>
        </tr>
        @endforeach
    </tbody>
</table>


<!-- modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="coba">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('/data-customer-store') }}">
                    @csrf

                    <label for="Nama">Nama</label>
                    <div class="form-group">
                        <input type="text" class="demo-code-preview form-control mt-1" placeholder="Nama Lengkap"
                            name="nama" value="{{ old('nama') }}" required>
                    </div>

                    <label for="Alamat">Alamat</label>
                    <div class="form-group">
                        <input type="text" class="demo-code-preview form-control mt-1" placeholder="Alamat Lengkap"
                            name="alamat" value="{{ old('alamat') }}" required>
                    </div>

                    <label for="Alamat">Kota</label>
                    <div class="form-group">
                        <input type="text" class="demo-code-preview form-control mt-1" placeholder="Kota" name="kota"
                            value="{{ old('kota') }}" required>
                    </div>

                    <label for="Alamat">Email</label>
                    <div class="form-group">
                        <input type="email" class="demo-code-preview form-control mt-1" placeholder="Email" name="email"
                            value="{{ old('email') }}" required>
                    </div>

                    <label for="Telp">Hp</label>
                    <div class="form-group">
                        <input type="number" class="demo-code-preview form-control mt-1" id="telp" placeholder="Telepon"
                            name="telp" value="{{ old('telp') }}" required>
                    </div>

                    <label for="Telp">Perusahaan</label>
                    <div class="form-group">
                        <input type="text" class="demo-code-preview form-control mt-1" id="telp" placeholder="Telepon"
                            name="perusahaan" value="{{ old('perusahaan') }}" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Insert</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- tutup modal -->

<!-- modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="import">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('/import-excel') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="Nama">File</label>
                    <div class="custom-file">
                        <input name="file" type="file" class="custom-file-input" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Insert</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- tutup modal -->
@endsection

@section('script')

@endsection

