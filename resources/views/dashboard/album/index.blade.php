@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-5 border-bottom">
    <h3>Data Album</h3>
</div>
<br>

@if (session()->has('success'))
      <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
      </div>
      @endif

      <div class="card-body p-0">
        <div class="table-responsive">
          <a href="/dashboard/album/create" class="btn btn-primary mb-3">Tambah</a>
          <table class="table table-striped table-md">
            <tr>
              <th>#</th>
              <th>Judul Album</th>
              <th>Deskripsi</th>
              <th>Tanggal Unggah</th>
              <th>User Id</th>
            </tr>
            @foreach ($album as $album)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$album->album_name}}</td>
              <td>{{$album->description}}</td>
              <td>{{$album->date_created}}</td>
              <td>{{$album->userId}}</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
      <div class="card-footer text-right">
        {{-- {!! $inventory->links()!!} --}}
      </div>
    </div>
  </div>
@endsection