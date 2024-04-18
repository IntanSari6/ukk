@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-5 border-bottom">
    <h3>Data Foto</h3>
</div>
<br>

@if (session()->has('success'))
      <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
      </div>
      @endif

      <div class="card-body p-0">
        <div class="table-responsive">
          <a href="/dashboard/photo-data/create" class="btn btn-primary mb-3">Tambah</a>
          <table class="table table-striped table-md">
            <tr>
              <th>#</th>
              <th>Judul Foto</th>
              <th>Deskripsi Foto</th>
              <th>Tanggal Unggah</th>
              <th>Lokasi File</th>
              <th>Album Id</th>
              <th>User Id</th>
            </tr>
            @foreach ($photo as $photo)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$photo->photo_title}}</td>
              <td>{{$photo->photo_description}}</td>
              <td>{{$photo->upload_date}}</td>
              <td>{{$photo->file_location}}</td>
              <td>{{$photo->albumId}}</td>
              <td>{{$photo->userId}}</td>
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
