@extends('page.layouts.main')

@section('container')

<div class="pagetitle">
    <h1>Tambah Aspirasi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Masyarakat</li>
            <li class="breadcrumb-item active">Tambah Aspirasi</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
    <div class="card">
        <div class="card-body">

            <!-- Floating Labels Form -->
            <form class="row g-3" action="{{ route("masyarakat.store.aspirasi") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 mt-5">
                    <div class="form-floating">
                        <textarea class="form-control @error('isi_aspirasi') is-invalid @enderror" name="isi_aspirasi" id="isi_aspirasi" style="height: 250px;"></textarea>
                        <label for="floatingTextarea">Masukkan Keluhan</label>
                        @error('isi_aspirasi')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                  <input class="form-control" type="file" name="gambar" id="gambar">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
</section>

@endsection
