@extends('dashboard.templates.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $datarumahsakit->nama_rumah_sakit }}</h1>
             <h4 class="mb-3">{{ $datarumahsakit->alamat }}</h4>
              <h4 class="mb-3">{{ $datarumahsakit->email }}</h4>
               <h4 class="mb-3">{{ $datarumahsakit->telepon }}</h4>
            <a href="/dashboard" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my post</a>
            
        </div>
    </div>
</div>
@endsection