@extends('page.layouts.main')

@section('container')

<div class="pagetitle">
    <h1>Details Aspirasi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">Details Aspirasi</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
@if(session()->has('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<section class="section dashboard">
    <div class="card">
        <div class="card-body">

            <!-- Floating Labels Form -->
            <form class="row g-3">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $aspirasi["id"] }}">
                <div class="col-12 mt-5">
                    <div class="form-floating">
                        <input class="form-control bg-light" type="text" value="{{ $aspirasi["user"]["nama"] }}" readonly>
                        <label>Aspirasi Dari</label>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <div class="form-floating">
                        <input class="form-control bg-light" type="text" value="{{ $aspirasi["user"]["nik"] }}" readonly>
                        <label>Nik Aspirasi</label>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <div class="form-floating">
                        <input class="form-control bg-light" type="text" value="{{ Carbon\Carbon::parse($aspirasi["user"]["tanggal_lahir"])->age }}" readonly>
                        <label>Umur Aspirasi (Tahun)</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control bg-light" style="height: 100px;" readonly>{{ $aspirasi["isi_aspirasi"] }}</textarea>
                        <label for="floatingTextarea">Isi Aduan</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control bg-light" style="height: 100px;" readonly>{{ $aspirasi["user"]["alamat"] }}</textarea>
                        <label for="floatingTextarea">Tempat Aspirasi</label>
                    </div>
                </div>

                @isset($aspirasi["gambar"])
                    <div class="col-12">
                        <img src="{{ asset($aspirasi["gambar"]) }}" style="width: 100%; object-fit: cover;" height="400" alt="">
                    </div>
                @endisset


                <div class="text-center">
                    <a href="/admin/dashboard" class="btn btn-primary">Kembali</a>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
</section>

@endsection
