@extends('layouts.main')

@section('title', 'Edit Buku')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Data Buku</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('update_buku', $buku->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="kode_buku">Kode Buku</label>
                        <input type="text" name="kode_buku" class="form-control" value="{{ old('kode_buku', $buku->kode_buku) }}">
                    </div>

                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $buku->kategori) }}">
                    </div>

                    <div class="form-group">
                        <label for="nama_penerbit">Nama Penerbit</label>
                        <input type="text" name="nama_penerbit" class="form-control" value="{{ old('nama_penerbit', $buku->nama_penerbit) }}">
                    </div>

                    <div class="form-group">
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text" name="judul_buku" class="form-control" value="{{ old('judul_buku', $buku->judul_buku) }}">
                    </div>

                    <div class="form-group">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input type="text" name="tahun_terbit" class="form-control" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('lihat_buku') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection