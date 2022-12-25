@extends('layouts.main')

@section("title", "Edit Profile")

@section('content_app')

<div class="pagetitle">
    <h1>Edit Profile</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">Edit Profile</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

@if(session()->has('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($errors->any())
            
@foreach ($errors->all() as $error)
    <p style="color: rgb(237, 44, 44);">{{ $error }}</p>
@endforeach

@endif

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-5">

            {{-- <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Admin</h5>

                    <!-- Vertical Form -->
                    <form action="/editpegawai" method="POST" class="row g-3">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $pegawai->id }}">
                        <div class="col-12">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="{{ $pegawai->nama }}">
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $pegawai->email }}">
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="col-12">
                            <label for="repassword" class="form-label">Re-Password</label>
                            <input type="password" class="form-control" id="repassword" name="repassword">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form><!-- Vertical Form -->
                    <!-- End General Form Elements -->

                </div>
            </div> --}}

        </div>

        <div class="col-lg-7">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Pegawai</h5>

                    {{-- <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col" width="17%">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $u)
                            <tr>
                                <th scope="row">{{ $n++ }}</th>
                                <td>{{ $u->nama }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->jurusan }}</td>
                                <td>
                                  <a href="/editpegawai/{{ $u->id }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a> 
                                  <a href="/hapuspegawai/{{ $u->id }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> --}}

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
