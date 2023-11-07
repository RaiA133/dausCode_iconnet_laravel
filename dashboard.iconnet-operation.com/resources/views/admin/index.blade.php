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
              <h5 class="card-title"> </h5>
              <a href="/admin/create" class="btn btn-primary">Tambah</a>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Position</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($user as $item)
                  <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->role }}</td>
                  
                    <td class="text-center">
                      <a href="{{ route('admin.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                      {{-- <form action="{{ route('admin.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm pl-2" 
                          data-confirm-delete= "true">Hapus</button>
                      </form> --}}
                      <a href="{{ route('admin.destroy', $item->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

@endsection