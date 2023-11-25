@extends('layout.app')

@section('content')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><span>Home</span></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- script untuk menerima $mapData
                    yang berisi data lokasi
                    dari controller dan mengirimnya ke file javascpt -->
    <script>
        // Simpan jsonData sebagai variabel global  
        window.jsonData = {!! json_encode($mapsData) !!};
        window.jsonDataDetail = {!! json_encode($data) !!};
    </script>

    <section class="section dashboard">
        <div class="col-lg-12">
            <div class="row">
                <div class="card">
                    <div class="card-body px-lg-5 py-4">

                        <div class="d-sm-flex justify-content-between mt-3">

                            <!-- Nav tabs -->
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-bold mb-xs-5 active" id="pills-home-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">Maps
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-bold" id="olt-tab" data-bs-toggle="pill"
                                        data-bs-target="#olt" type="button" role="tab" aria-controls="olt"
                                        aria-selected="false" tabindex="-1">OLT HOSTNAME
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-bold" id="FDT-tab" data-bs-toggle="pill"
                                        data-bs-target="#FDT" type="button" role="tab" aria-controls="FDT"
                                        aria-selected="false" tabindex="-1">FDT
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-bold" id="fat-tab" data-bs-toggle="pill"
                                        data-bs-target="#fat" type="button" role="tab" aria-controls="fat"
                                        aria-selected="false" tabindex="-1">FAT
                                    </button>
                                </li>
                            </ul>


                            <!-- General Form Elements -->
                            <div class="d-flex align-items-center mb-3">
                                <label for="regionSelect" class="ps-2 me-2 fw-bold">Region : </label>
                                <form action="" method="POST">
                                    <select id="regionSelect" class="form-select" onchange="ubahRegion(this.value)"
                                        aria-label="Default select example">
                                        <option value="BANDUNG" {{ Request::segment(2) == 'BANDUNG' ? 'selected' : '' }}>
                                            Bandung</option>
                                        <option value="TASIKMALAYA"
                                            {{ Request::segment(2) == 'TASIKMALAYA' ? 'selected' : '' }}>Tasikmalaya
                                        </option>
                                        <option value="CIREBON" {{ Request::segment(2) == 'CIREBON' ? 'selected' : '' }}>
                                            Cirebon</option>
                                        {{-- <option value="FDT_FAT" {{ (Request::segment(2) == "FDT_FAT") ? "selected" : "" }}>FDT_FAT</option> --}}
                                        <!-- Tambahkan pilihan lain sesuai kebutuhan -->
                                    </select>
                                    <script>
                                        const host = window.location.origin;

                                        function ubahRegion(region) {
                                            window.location.href = host + '/dashboard/' + region;
                                        }
                                    </script>
                                </form>
                            </div>
                            <!-- End General Form Elements -->

                        </div>

                        <div class="tab-content">

                            @include('include.dashboard.maps')
                            @include('include.dashboard.olt')
                            @include('include.dashboard.fdt')
                            @include('include.dashboard.fat')

                        </div>

                    </div>
                </div>

            </div>
            <!-- End Right side columns -->

        </div>


    </section>

    <script>
        const regionData = '<?php echo json_encode($dataRegion); ?>';
    </script>

    {{-- scriptFAT.js --}}
    <script src="{{ asset('assets/js/dashboard/scriptFAT.js') }}"></script>

    {{-- scriptOLT.js --}}
    <script src="{{ asset('assets/js/dashboard/scriptOLT.js') }}"></script>

    {{-- scriptFDT.js --}}
    <script src="{{ asset('assets/js/dashboard/scriptFDT.js') }}"></script>
    <!-- Script to handle tab switch -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.nav-link');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove 'active' class from all tab panes
                    document.querySelectorAll('.tab-pane').forEach(pane => {
                        pane.classList.remove('show', 'active');
                    });

                    // Add 'active' class to the clicked tab pane
                    const targetPaneId = this.getAttribute('data-bs-target').substring(1);
                    document.getElementById(targetPaneId).classList.add('show', 'active');
                });
            });
        });
    </script>
@endsection
