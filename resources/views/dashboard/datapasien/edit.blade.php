@extends('dashboard.templates.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Rumah Sakit</h1>
    </div>
<div class="col-lg-8">
    <form action="/datapasien/{{ $datapasien->id }}" method="post" class="mb-5" enctype="multipart/form-data">
      {{-- bisa put atau patch --}}
      @method('put')
        @csrf
        <input type="hidden" class="form-control" id="tes" name="tes" value="{{ $datapasien->id }}">
        <div class="mb-3">
          <label for="nama_pasien" class="form-label">nama pasien</label>
          <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" id="nama_pasien" name="nama_pasien" required autofocus value="{{ old('nama_pasien',$datapasien->nama_pasien) }}">
          @error('nama_pasien')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="alamat" class="form-label">alamat</label>
          <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required autofocus value="{{ old('alamat',$datapasien->alamat) }}">
          @error('alamat')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="telepon" class="form-label">telepon</label>
          <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" required autofocus value="{{ old('telepon',$datapasien->telepon) }}">
          @error('telepon')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
          @enderror
        </div>

         <div class="mb-3">
            <label for="rumahsakit" class="form-label">rumah sakit</label>
            <select class="form-select" name="id_rumah_sakit">              
              @foreach ($datapasiens as $dp)
               @if (old('id_rumah_sakit') == $dp->id)
               <option value="{{ $dp->id }}" selected>{{ $dp->nama_rumah_sakit }}</option> 
               @else  
               <option value="{{ $dp->id }}">{{ $dp->nama_rumah_sakit }}</option>   
               @endif
                
              @endforeach
            </select>
          </div>
          
        
        
        <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
</div>

@endsection
