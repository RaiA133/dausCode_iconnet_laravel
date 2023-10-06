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

<section class="section dashboard py-5">
    <div class="row">

        <div class="col-lg-12">

            <!-- SECTION SELECT -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pilih Region</h5>

                    <!-- General Form Elements -->
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <select id="regionSelect" class="form-select" aria-label="Default select example">
                                    <option value="BANDUNG">Bandung</option>
                                    <option value="TASIKMALAYA">Tasikmalaya</option>
                                    <option value="CIREBON">Cirebon</option>
                                    <option value="FDT_FAT">FDT_FAT</option>
                                    <!-- Tambahkan pilihan lain sesuai kebutuhan -->
                                </select>
                            </div>
                        </div>
                    </form>
                    <!-- End General Form Elements -->

                </div>
            </div>
            <!-- END SECTION SELECT -->

            <!-- SECTION DATA BERDASARKAN REGION -->

            <div class="card">
                <div class="card-body px-lg-5 py-4">
                    <!-- <h5 class="card-title">Pills Tabs</h5> -->



                    <div class="d-flex align-items-center justify-content-between d-block d-sm-flex">

                        <!-- Pills Tabs -->
                        <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Kode FAT</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false" tabindex="-1">OLT
                                    HOSTNAME</button>
                            </li>
                        </ul>

                        <!-- FORM SEACRH DATA -->
                        <div class="col-md-5 col-sm-6   top-0 end-0 py-3">
                            <form class="d-flex" role="search">
                                <input id="searchInput" class="form-control me-2" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button id="searchButton" class="btn btn-outline-success me-2"
                                    type="button">Search</button>
                            </form>
                        </div>
                        <!-- end FORM SEACRH DATA -->

                    </div>

                    <div class="tab-content pt-2" id="myTabContent">

                        <div class="tab-pane fade active show" id="pills-home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <!-- FAT -->
                            <h5 class="card-title">Berdasarkan Kode FAT</h5>
                            <hr>


                            <!-- DROPDOWN / ACORDION -->
                            <div class="accordion accordion-flush" id="accordionFlushExample">

                                <!-- BUNGKUS DALAM ACORDION -->
                                <div class="accordion-item">

                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed fw-bold" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne" id="FAT">
                                            Kode FAT 1#
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">


                                        <!-- DETAIL DARI SETIAP FAT DARI DATABASE SHEET -->
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6 d-flex justify-content-center">
                                                    <div id="map"></div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="accordion-body">
                                                        <div class="tab-pane fade show active profile-overview mx-lg-3"
                                                            id="profile-overview" role="tabpanel">
                                                            <h5 class="card-title mx-3 fw-bold my-0">Details</h5>

                                                            <ul class="list-group list-group-flush" id="detail">

                                                                <!-- data diulang disini -->

                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end DETAIL DARI SETIAP FAT DARI DATABASE SHEET -->


                                        <!-- BAGIAN TOMBOL YOUR LOCATION & FORM INPUT KOOR MANUAL -->
                                        <div class="mx-4 my-4">
                                            <div class="row mb-4">
                                                <div class="col-6">
                                                    <input type="text" class="form-control"
                                                        placeholder="Insert Coordinates Manualy" id="manualLocInput">
                                                </div>
                                                <div class="col-6 manualLocBtn">
                                                    <button type="button" class="btn btn-dark" id="manualLocBtn">Submit
                                                        & Calculate nearest branch</button>
                                                </div>
                                                <div class="form-text ms-2" style="color: black">
                                                    Masukan Longitude dan Latitude, dan wajib dipisahkan oleh koma ( , )
                                                    example : -6.901918368189132, 107.61895899001425
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-dark mb-2" id="getLocation">Get Your
                                                Location Automatically & Calculate nearest branch</button>

                                            <hr>
                                            <div id="view-hasil" class="form-text ms-2">

                                                {{-- HASIL KOORDINAT MANUAL / OTOMATIS --}}

                                            </div>

                                        </div>



                                        <hr class="mb-5">
                                        <!-- end BAGIAN TOMBOL YOUR LOCATION & FORM INPUT KOOR MANUAL -->


                                        {{-- <div  style="margin-top: 20px; font-size: 25px;"></div> --}}
                                        <hr>
                                        <h3>JARAK TERDEKAT : </h3>
                                        <div class="container-table">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Alamat Tujuan</th>
                                                        <th scope="col">Jarak Ke Tujuan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" id="noTabel">1</th>
                                                        <td id="alamatTujuanTabel">-</td>
                                                        <td id="jarakTujuanTabel">-</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <p style="margin-top: -10px;" id="hasil-jarak"></p>

                                    </div>
                                    <!-- end BUNGKUS DALAM ACORDION -->

                                </div>
                            </div>
                            <!-- end DROPDOWN / ACORDION -->

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

<script src="assets/js/iconnet.js"></script>
<script src="assets/js/locTerdekat.js"></script>
@endsection
