@extends('dashboard.templates.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New</h1>
    </div>
<div class="col-lg-8">
    {{-- normal nya /dashboard/posts/store tetapi karena menggunakan resourch cukup /dashboard/posts --}}
    <form action="/datapasien" method="post" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama_pasien" class="form-label">nama pasient</label>
          <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" id="nama_pasien" name="nama_pasien" required autofocus value="{{ old('nama_pasien') }}">
          @error('nama_pasien')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">alamat</label>
          <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required autofocus value="{{ old('alamat') }}">
          @error('alamat')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="telepon" class="form-label">telepon</label>
          <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" required autofocus value="{{ old('telepon') }}">
          @error('telepon')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="rumahsakit" class="form-label">rumah sakit</label>
            <select class="form-select" name="id_rumah_sakit">              
              @foreach ($datapasien as $dp)
               @if (old('id_rumah_sakit') == $dp->id)
               <option value="{{ $dp->id }}" selected>{{ $dp->nama_rumah_sakit }}</option> 
               @else  
               <option value="{{ $dp->id }}">{{ $dp->nama_rumah_sakit }}</option>   
               @endif
                
              @endforeach
            </select>
          </div>
        
          
        <button type="submit" class="btn btn-primary">tambah</button>
      </form>
</div>

@endsection
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
            $('#id_rumah_sakit').on('change', function() {
               var categoryID = $(this).val();
               if(categoryID) {
                   $.ajax({
                       url: '/getCourse/'+categoryID,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)
                       {
                         if(data){
                            $('#course').empty();
                            $('#course').append('<option hidden>Choose Course</option>'); 
                            $.each(data, function(key, course){
                                $('select[name="course"]').append('<option value="'+ key +'">' + course.name+ '</option>');
                            });
                        }else{
                            $('#course').empty();
                        }
                     }
                   });
               }else{
                 $('#course').empty();
               }
            });
            });
        </script>