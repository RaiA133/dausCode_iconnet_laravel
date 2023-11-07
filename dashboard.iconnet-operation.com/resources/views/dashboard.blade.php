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

<section class="section dashboard">
    <div class="col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-body px-lg-5 py-4">
                    
                    <div class="d-sm-flex justify-content-between mt-3">

                        <!-- Pills Tabs -->
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-bold mb-xs-5 active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Kode FAT
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-bold" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false" tabindex="-1">OLT HOSTNAME
                                    </button>
                                </li>
                            </ul>

                        <!-- General Form Elements -->
                            <div class="d-flex align-items-center mb-3">
                                <label for="regionSelect" class="ps-2 me-2 fw-bold">Region : </label>
                                <form action="" method="POST">
                                    <select id="regionSelect" class="form-select" onchange="ubahRegion(this.value)" aria-label="Default select example" >
                                        <option value="BANDUNG" {{ (Request::segment(2) == "BANDUNG") ? "selected" : "" }}>Bandung</option>
                                        <option value="TASIKMALAYA" {{ (Request::segment(2) == "TASIKMALAYA") ? "selected" : "" }}>Tasikmalaya</option>
                                        <option value="CIREBON" {{ (Request::segment(2) == "CIREBON") ? "selected" : "" }}>Cirebon</option>
                                        <option value="FDT_FAT" {{ (Request::segment(2) == "FDT_FAT") ? "selected" : "" }}>FDT_FAT</option>
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

                    <div class="tab-content" id="myTabContent">
                        
                        @include('include.dashboard.fat')
                        
                        @include('include.dashboard.olt')

                    </div>

                </div>
            </div>

        </div>
        <!-- End Right side columns -->

    </div>


</section>

<script> const regionData = '<?php echo json_encode($dataRegion); ?>'; </script>

{{-- scriptFAT.js --}}
<script src="{{ asset('assets/js/dashboard/scriptFAT.js') }}"></script>

{{-- scriptOLT.js --}}
<script src="{{ asset('assets/js/dashboard/scriptOLT.js') }}"></script>

{{-- <script src="{{ asset('assets/js/dashboard/scriptFAT.js') }}" rel="stylesheet"></script>
<script src="{{ asset('assets/js/dashboard/scriptOLT.js') }}" rel="stylesheet"></script> --}}
{{-- <script src="./assets/js/dashboard/scriptFAT.js"rel="stylesheet"></script>
<script src="./assets/js/dashboard/scriptOLT.js"rel="stylesheet"></script> --}}

@endsection
