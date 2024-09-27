@extends('layouts.app')

@section('content')
    <h1>Tambah Barang</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('gudang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" 
                value="{{ old('nama_barang') }}" required>
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" 
                value="{{ old('stok') }}" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" 
                value="{{ old('harga') }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi_barang">Deskripsi Barang</label>
            <textarea name="deskripsi_barang" id="deskripsi_barang" class="form-control">{{ old('deskripsi_barang') }}</textarea>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar Barang</label>
            <input type="file" name="gambar" id="gambar" class="form-control-file" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection
