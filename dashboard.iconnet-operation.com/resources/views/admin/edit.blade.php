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
                        <h5 class="card-title">Edit Operator atau Administrator Baru</h5>

                        <!-- No Labels Form -->
                        <form class="row g-3" action="/admin/update/{{ $user->id }}" method="POST">
                            @csrf @method('put')
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{ $user->name }}">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password" class="form-control" placeholder="Password" value="{{ $user->password }}">
                            </div>
                            <div class="col-md-12">
                              <select id="inputState" name="role" class="form-select">
                                <option selected disabled>=== Pilih Role ===</option>
                                <option value="Operator" {{ $user->role == 'Operator' ? 'selected' : '' }}>Operator</option>
                                <option value="Administrator" {{ $user->role == 'Administrator' ? 'selected' : '' }}>Administrator</option>
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
