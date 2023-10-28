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
                <div class="col-xs-12 card-body px-lg-5 py-4">
                    <div class="d-flex align-items-center justify-content-between d-block d-sm-flex mt-3">

                        <!-- Pills Tabs -->
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-bold mb-xs-5 active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Kode FAT</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-bold" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false" tabindex="-1">OLT
                                        HOSTNAME</button>
                                </li>
                            </ul>

                        <!-- General Form Elements -->
                            <div class="d-flex align-items-center">
                                <label for="regionSelect" class="me-2 fw-bold">Region : </label>
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

                    <div class="tab-content pt-2" id="myTabContent">
                        <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="home-tab">
                            <!-- FAT -->
                            <h5 class="card-title pb-2 pt-4">Berdasarkan Kode FAT</h5>
                            <hr class="mt-0 pt-0">
                            
                            <!-- LIST FAT -->
                            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">

                                <div class="datatable-top mb-3">
                                    
                                    <div class="datatable-dropdown">
                                        <label>
                                            <select class="datatable-selector me-4 border">
                                                <option value="5">5</option>
                                                <option value="10" selected="">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                                <option value="25">25</option>
                                            </select> <span class="form-text">entries per page</span>
                                        </label>
                                    </div>

                                    <!-- FORM SEACRH DATA FAT-->
                                    <div class="col-md-5 col-sm-6 top-0 end-0">
                                        <form class="d-flex" role="search">
                                            <input id="searchInputFAT" class="form-control me-2" type="search"
                                                placeholder="Search" aria-label="Search">
                                            <button id="searchButtonFAT" class="btn btn-outline-success me-2"
                                                type="submit">Search</button>
                                        </form>
                                    </div>
                                    <!-- end FORM SEACRH DATA FAT -->

                                </div>

                                <div class="datatable-container">
                                    <table class="table datatable datatable-table">
                                        <thead id="fat-search-area">

                                            {{-- list modals button (KODE FAT) --}}
                                            @for ($i = 1; $i < sizeof($dataRegion); $i++) 
                                            @php $dataFAT = $dataRegion[$i][0] @endphp
                                            <tr>
                                                <td>
                                                    <label>{{ $i }}. </label>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalFAT" class="fat-code" onclick="fatCode('{{ $dataFAT }}');">{{ $dataFAT }}</a>
 
                                                </td>
                                            </th>
                                            @endfor

                                        </tbody>
                                    </table>
                                </div>
            

                                {{-- MODAL FAT --}}
                                <div class="modal fade" id="modalFAT" tabindex="-1" aria-labelledby="modalFATLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header pb-2 mx-2">
                                                <h1 class="modal-title fs-5" id="modalFATLabelLabel">FAT details | {{ $region }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="fat-modal-close" style="margin-bottom:-5px;"></button>
                                            </div>
                                            <div class="modal-body pt-0">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-12 py-3">
                                                            <div id="map" class="border bg-body-secondary"></div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-12 table-responsive pt-lg-3">
                                                            <table class="border table table-striped mb-0" id="myTableFAT">

                                                                {{-- data FAT detail diulang disini --}}

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="datatable-bottom">
                                    <div class="datatable-info form-text">Showing 1 to 5 of 5 entries</div>
                                    <nav class="datatable-pagination">
                                        <ul class="datatable-pagination-list"></ul>
                                    </nav>
                                </div>

                            </div>
                            <!-- end LIST FAT -->

                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="profile-tab">

                            <!-- OLT -->
                            <h5 class="card-title pb-2 pt-4">Berdasarkan OLT Hostname</h5>
                            <hr class="mt-0 pt-0">

                            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                <div class="datatable-top mb-3">

                                    <div class="datatable-dropdown">
                                        <label>
                                            <select class="datatable-selector me-4 border">
                                                <option value="5">5</option>
                                                <option value="10" selected="">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                                <option value="25">25</option>
                                            </select> <span class="form-text">entries per page</span>
                                        </label>
                                    </div>

                                    <!-- FORM SEACRH DATA OLT -->
                                    <div class="col-md-5 col-sm-6 top-0 end-0">
                                        <form class="d-flex" role="search">
                                            <input id="searchInputOLT" class="form-control me-2" type="search"
                                                placeholder="Search" aria-label="Search">
                                            <button id="searchButtonOLT" class="btn btn-outline-success me-2"
                                                type="submit">Search</button>
                                        </form>
                                    </div>
                                    <!-- end FORM SEACRH DATA OLT -->

                                </div>

                                <div class="datatable-container">
                                    <table class="table datatable datatable-table">
                                        <thead id="olt-search-area">

                                            {{-- list modals button (KODE OLT) --}}
                                            @for ($i = 1; $i < sizeof($dataRegion); $i++) 
                                            @php $dataOLT = $dataRegion[$i][5] @endphp
                                            <tr>
                                                <td>
                                                    <label>{{ $i }}. </label>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalOLT" class="olt-code" onclick="oltCode('{{ $dataOLT }}');">{{ $dataOLT }}</a>
 
                                                </td>
                                            </th>
                                            @endfor

                                        </tbody>
                                    </table>
                                </div>

                                {{-- MODAL OLT --}}
                                <div class="modal fade" id="modalOLT" tabindex="-1" aria-labelledby="modalOLTLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                      <div class="modal-content">
                                        <div class="modal-header pb-2 mx-2">
                                        <h1 class="modal-title fs-5" id="modalOLTLabel">OLT details | {{ $region }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="olt-modal-close" style="margin-bottom:-5px;"></button>
                                        </div>
                                        <div class="modal-body pt-0">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-12 py-3">
                                                        <div id="map" class="border bg-body-secondary"></div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12 table-responsive pt-lg-3">
                                                        <table class="border table table-striped mb-0" id="myTableOLT">

                                                            {{-- data OLT detail diulang disini --}}

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                <div class="datatable-bottom">
                                    <div class="datatable-info form-text">Showing 1 to 5 of 5 entries</div>
                                    <nav class="datatable-pagination">
                                        <ul class="datatable-pagination-list"></ul>
                                    </nav>
                                </div>


                            </div>
                            

                        </div>

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
