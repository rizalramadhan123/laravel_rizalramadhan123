@extends('dashboard.templates.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Post</h1>
    </div>
    
      <a href="/dashboard/create" class="btn btn-primary mb-3">Create new post</a>
      @if(session()->has('success'))
      <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
      </div>
      @endif
      <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">nama rumah sakit</th>
              <th scope="col">alamat</th>
              <th scope="col">email</th>
              <th scope="col">telepon</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($datarumahsakit as $drt)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $drt->nama_rumah_sakit}}</td>
                    <td>{{ $drt->alamat }}</td>
                    <td>{{ $drt->email }}</td>
                    <td>{{ $drt->telepon }}</td>

                    <td>
                        <form action="/dashboard/show" method="post" class="d-inline">
                          @csrf
                          <input type="hidden" name="tes" value="{{ $drt->id }}">
                          <button class="badge bg-primary border-0" >lihat</button>
                        </form>
                        <form action="/dashboard/edit" method="post" class="d-inline">
                          @csrf
                          <input type="hidden" name="tes" value="{{ $drt->id }}">
                          <button class="badge bg-warning border-0" >edit</button>
                        </form>
                        <form action="/dashboard/{{ $drt->id }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <input type="hidden" name="tes" value="{{ $drt->id }}">
                          <button class="badge bg-danger border-0" onclick="confirm('yakin dihapus?')">hapus</button>
                        </form>
                    
                    </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
<script>
 $(".deleteRecord").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: "/dashboard/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            console.log("it Works");
        }
    });
   
});
</script>
  
@endsection