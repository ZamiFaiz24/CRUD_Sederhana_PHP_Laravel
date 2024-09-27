@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Barang</h1>
        <a href="{{ route('gudang.create') }}" class="btn btn-success">Tambah Barang</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Waktu Ditambahkan</th>
                <th>Waktu Diupdate</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gudangs as $gudang)
                <tr>
                    <td>
                        @if($gudang->gambar)
                            <img src="{{ asset('images/' . $gudang->gambar) }}" alt="{{ $gudang->nama_barang }}" width="50">
                        @else
                            <span>Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>{{ $gudang->nama_barang }}</td>
                    <td>{{ $gudang->stok }}</td>
                    <td>Rp {{ number_format($gudang->harga, 2, ',', '.') }}</td>
                    <td>{{ $gudang->deskripsi_barang }}</td>
                    <td>{{ $gudang->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $gudang->updated_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <a href="{{ route('gudang.edit', $gudang->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('gudang.destroy', $gudang->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" 
                                onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
