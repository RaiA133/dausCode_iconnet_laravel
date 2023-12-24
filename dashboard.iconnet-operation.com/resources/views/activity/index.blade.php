@extends('layout.app')

@section('content')
    <div class="pagetitle">
        <h1>Aktifitas User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Aktifitas User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> </h5>
                        {{-- <a href="/admin/create" class="btn btn-primary">Tambah</a> --}}

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($activity as $item)
                              <tr>
                                  <th>{{ $loop->iteration }}</th>
                                  <td>
                                      @if ($item->created_at instanceof \Carbon\Carbon)
                                          <time datetime="{{ $item->created_at->format('Y-m-d H:i:s') }}">
                                              {{ $item->created_at->format('d M, Y H:i:s') }}
                                          </time>
                                      @else
                                          {{ $item->created_at }} {{-- Tampilkan nilai aslinya jika bukan objek DateTime --}}
                                      @endif
                                  </td>
                                  <td>{{ $item->description }}</td>
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
