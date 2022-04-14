@extends('dashboard.templates.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Rumah Sakit</h1>
    </div>
<div class="col-lg-8">
    <form action="/dashboard/{{ $datarumahsakit->id }}" method="post" class="mb-5" enctype="multipart/form-data">
      {{-- bisa put atau patch --}}
      @method('put')
        @csrf
        <input type="hidden" class="form-control" id="tes" name="tes" value="{{ $datarumahsakit->id }}">
        <div class="mb-3">
          <label for="nama_rumah_sakit" class="form-label">nama rumah sakit</label>
          <input type="text" class="form-control @error('nama_rumah_sakit') is-invalid @enderror" id="nama_rumah_sakit" name="nama_rumah_sakit" required autofocus value="{{ old('nama_rumah_sakit',$datarumahsakit->nama_rumah_sakit) }}">
          @error('nama_rumah_sakit')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="alamat" class="form-label">alamat</label>
          <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required autofocus value="{{ old('alamat',$datarumahsakit->alamat) }}">
          @error('alamat')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">email</label>
          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ old('email',$datarumahsakit->email) }}">
          @error('email')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="telepon" class="form-label">telepon</label>
          <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" required autofocus value="{{ old('telepon',$datarumahsakit->telepon) }}">
          @error('telepon')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
          @enderror
        </div>
        
        
        <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
</div>

@endsection
