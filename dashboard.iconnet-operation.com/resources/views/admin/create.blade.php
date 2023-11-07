@extends('layout.app')

@section('content')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Operator atau Administrator Baru</h5>

                        <!-- No Labels Form -->
                        <form class="row g-3" action="/admin/store" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required >
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Email"required>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password" class="form-control" placeholder="Password" min="8">
                            </div>
                            <div class="col-md-12">
                              <select id="inputState" name="role" class="form-select">
                                <option selected disabled>=== Pilih Role ===</option>
                                <option value="Operator">Operator</option>
                                <option value="Administrator">Administrator</option>
                              </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('admin.index') }}"
                                    class = "btn btn-secondary">Kembali
                                </a>
                            </div>
                        </form><!-- End No Labels Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
