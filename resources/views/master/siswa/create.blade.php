@extends('layouts.app')
@section('internalCSS')
<!-- <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"
    integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
<link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/select2-bootstrap4.css') }}" />
<style>
    .select2-selection__rendered {
        margin: 4.5px;
    }
</style>
@endsection
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Master Data</h1>
        </div>
        @if(count($errors) > 0 )
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    {{$errors->first()}}

                </div>
            </div>
            @endif
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Siswa</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('master_siswa.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input class="form-control" name="nama" placeholder="Rinaldi ...">
                                @error('nama')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <small class="text-danger">Nama lengkap harus diisi</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIS</label>
                                <input class="form-control" name="nis" placeholder="01...">
                                <small>NIS tidak bisa diubah setelah disimpan</small> <br/>
                                @error('nis')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <small class="text-danger">NIS harus diisi</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NISN</label>
                                <input class="form-control" name="nisn" placeholder="02...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input class="form-control" name="tempat_lahir" placeholder="Medan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type='date' name='tanggal_lahir' class='form-control'>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control select-jeniskel" name="jenis_kelamin">
                                    <option value="Laki-Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Agama</label>
                                <input class="form-control" name="agama" placeholder="Islam">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat Lengkap</label>
                                <textarea class=" form-control" placeholder="Jalan ..." name="alamat"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Telpon/HP</label>
                                <input class="form-control" name="no_hp" placeholder="08...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>kelas</label>
                                <select class="form-control select-kelas" name="kelas">
                                    @foreach ($kelases as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->kelas }} {{$kelas->nama }}
                                        {{ $kelas->rombel }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="...@gmail.com">
                            </div>
                        </div>

                    </div>
                    <!-- <div class="col-md-5">
                        <div class="form-group">
                            <label>Nama Guru</label>
                            <input class="form-control" name="title" placeholder="Masukkan Judul Berita">
                        </div>
                    </div> -->


                    <a class="btn btn-light" href="{{url()->previous()}}" role="button">Kembali</a>
                    <button class="btn btn-success" type="submit"> Submit </button>
                </form>
            </div>
        </div>

    </section>
</div>
@endsection
@section('internalScript')
<script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".select-kelas").val("");
        $(".select-jeniskel").val("");
        $('.select-kelas').select2({
            val: '',
            placeholder: "Pilih Kelas",
            theme: 'bootstrap4',
            width: 'style',
        });
        $('.select-jeniskel').select2({
            minimumResultsForSearch: Infinity,
            val: '',
            placeholder: "Pilih Jenis Kelamin",
            theme: 'bootstrap4',
            width: 'style',
        });
    });
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script> -->
@endsection