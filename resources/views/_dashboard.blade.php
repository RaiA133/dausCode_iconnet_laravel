@extends('layout.app')

@section('content')
{{-- {{ dd($fat) }} --}}
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body px-lg-5 py-4">
                    <div class="d-flex align-items-center justify-content-between d-block d-sm-flex mt-3">

                        <!-- Pills Tabs -->
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fw-bold active" id="pills-home-tab" data-bs-toggle="pill"
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
                                <select id="regionSelect" class="form-select" onchange="window.location.href=this.value" aria-label="Default select example" >
                                    <option value="BANDUNG" {{ (Request::segment(2) == "BANDUNG") ? "selected" : "" }}>Bandung</option>
                                    <option value="TASIKMALAYA" {{ (Request::segment(2) == "TASIKMALAYA") ? "selected" : "" }}>Tasikmalaya</option>
                                    <option value="CIREBON" {{ (Request::segment(2) == "CIREBON") ? "selected" : "" }}>Cirebon</option>
                                    <option value="FDT_FAT" {{ (Request::segment(2) == "FDT_FAT") ? "selected" : "" }}>FDT_FAT</option>
                                    <!-- Tambahkan pilihan lain sesuai kebutuhan -->
                                </select>
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

                                    <!-- FORM SEACRH DATA -->
                                    <div class="col-md-5 col-sm-6 top-0 end-0">
                                        <form class="d-flex" role="search">
                                            <input id="searchInput" class="form-control me-2" type="search"
                                                placeholder="Search" aria-label="Search">
                                            <button id="searchButton" class="btn btn-outline-success me-2"
                                                type="submit">Search</button>
                                        </form>
                                    </div>
                                    <!-- end FORM SEACRH DATA -->

                                </div>

                                <div class="datatable-container">
                                    <table class="table datatable datatable-table">
                                        <thead id="fat-search-area">

                                            {{-- modals button --}}
                                            @for ($i = 1; $i < sizeof($fat); $i++) 
                                            <tr>
                                                <td>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="fat-code" onclick="fatCode('{{ $fat[$i][0] }}')">{{ $fat[$i][0] }}</a>
                                                </td>
                                            </th>
                                            @endfor

                                        </tbody>
                                    </table>
                                </div>

                                {{-- modal --}}
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-6 border">
                                                        <div id="map"></div>
                                                    </div>
                                                    <div class="col-6">
                                                        <table>
                                                            <tbody>
                                                                @for ($i = 0; $i < sizeof($fat[0]); $i++)
                                                                <tr>
                                                                    <th>{{ $fat[0][$i] }}</th>
                                                                    <td class="px-2">:</td>
                                                                    <span id="fat-details">
                                                                        {{-- @if ($fat[$i][0] == 'var dari params')
                                                                            {{-- <td>{{  ==  }}</td> --}}
                                                                        {{-- @endif --}}
                                                                    </span>
                                                                </tr>
                                                                @endfor

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary">Save changes</button>
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
                            <h5 class="card-title">Berdasarkan OLT Hostname</h5>
                            <hr>

                            <!-- Accordion without outline borders -->
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            OLT HOSTNAE
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Placeholder content for this accordion, which is
                                            intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                            first item's accordion body.</div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Accordion without outline borders -->

                        </div>

                    </div><!-- End Pills Tabs -->

                </div>
            </div>

        </div>
        <!-- End Right side columns -->

    </div>
</section>

<script src="{{ asset('app.js') }}"></script>
@endsection
