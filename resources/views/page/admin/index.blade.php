@extends("page.layouts.main")

@section("title", "Admin Dashboard")

@section("container")
    

  <div class="pagetitle">
    <h1>List Aspirasi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        @if(session()->get("role") == 1)
          <li class="breadcrumb-item">Admin</li>
        @else
          <li class="breadcrumb-item">Masyrakat</li>
        @endif
        <li class="breadcrumb-item active">List Aspirasi</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  @if(session()->has('success'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  
  @if(session()->has('loginError'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <section class="section dashboard">
    <div class="card">
      <div class="card-body pt-5">
  
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Waktu</th>
              <th scope="col">Nama Pengirim</th>
              {{-- <th scope="col">Alamat Pengirim</th> --}}
              <th scope="col">Isi Aspirasi</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($aspirasis as $aspirasi)
            <tr>
              <th scope="row">{{ $aspirasi["created_at"] }}</th>
              <td>{{ $aspirasi["user"]["nama"] }}</td>
              <td>{{ $aspirasi["isi_aspirasi"] }}</td>
              <td>
                @switch($aspirasi["status"])
                    @case(0)
                      <span class="badge bg-primary">{{ 'Belum di baca' }}</span>
                      @break
                    @case(1)
                    <span class="badge bg-warning">{{ 'Sudah di baca' }}</span>
                      @break
                @endswitch
              </td>
              <td>
                <a href="/admin/show/{{ $aspirasi["id"] }}/aspirasi" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a> 
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
  
      </div>
    </div>
  </section>
  

@endsection