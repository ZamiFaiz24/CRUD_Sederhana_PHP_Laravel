@extends('layouts.app')

@section('content')
    <h1>Edit Barang</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('gudang.update', $gudang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" 
                value="{{ old('nama_barang', $gudang->nama_barang) }}" required>
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" 
                value="{{ old('stok', $gudang->stok) }}" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" 
                value="{{ old('harga', $gudang->harga) }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi_barang">Deskripsi Barang</label>
            <textarea name="deskripsi_barang" id="deskripsi_barang" class="form-control">{{ old('deskripsi_barang', $gudang->deskripsi_barang) }}</textarea>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar Barang</label><br>
            @if($gudang->gambar)
                <img src="{{ asset('images/' . $gudang->gambar) }}" alt="{{ $gudang->nama_barang }}" width="100" class="mb-2">
            @else
                <span>Tidak ada gambar</span>
            @endif
            <input type="file" name="gambar" id="gambar" class="form-control-file" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
