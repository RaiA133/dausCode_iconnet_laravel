<!-- OLT Tab Pane -->
<div class="tab-pane fade" id="olt" role="tabpanel" aria-labelledby="olt-tab">
    <!-- Your OLT Content Goes Here -->
    <h5 class="card-title pb-2 pt-4">Berdasarkan Data OLT</h5>
    <hr class="mt-0 pt-0">
    <!-- OLT -->

    <!-- FORM SEACRH DATA OLT-->
    <div class="col-md-8 top-0 end-0">
        <input id="searchInputOLT" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    </div>
    <!-- end FORM SEACRH DATA OLT -->


    <div class="datatable-container">
        <table class="table datatable datatable-table ">
            <thead id="olt-search-area">

                <!-- list modals button (KODE olt)-->
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>OLT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyOLT">
                        {{-- looping olt tracker untuk me$oltTracker adalah array sementara 
                        yang melacak OLT yang sudah ditampilkan. Sebelum menampilkan baris baru, 
                        kita memeriksa apakah OLT tersebut sudah ada dalam $oltTracker. Jika belum, 
                        kita menampilkan baris dan menambahkan OLT ke dalam $oltTracker. 
                        Ini akan memastikan bahwa OLT yang sama hanya ditampilkan sekali. --}}
                        @php
                            $oltTracker = [];
                            $nomorUrut = 1;
                            $jsonDataOltKey = [];
                            $countDataOLT = []; // Variabel untuk melacak jumlah kemunculan setiap dataOLT
                        @endphp

                        @foreach ($data as $i => $row)
                            @php
                                $dataOLT = $row[9];
                            @endphp

                            @if (!in_array($dataOLT, $oltTracker))
                                <tr>
                                    <td>{{ $nomorUrut }}</td>
                                    <td>{{ $dataOLT }}</td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalOLT"
                                            class="btn btn-info btn-sm olt-code"
                                            onclick="handleLihatClickOlt('{{ $dataOLT }}');">Lihat OLT</a>
                                    </td>
                                </tr>

                                @php
                                    $oltTracker[] = $dataOLT;
                                    $nomorUrut++;
                                    $jsonDataOltKey[] = $dataOLT;

                                    // Mengecek dan menghitung kemunculan dataOLT
                                    if (isset($countDataOLT[$dataOLT])) {
                                        $countDataOLT[$dataOLT]++;
                                    } else {
                                        $countDataOLT[$dataOLT] = 1;
                                    }
                                @endphp
                            @endif
                        @endforeach
                        {{-- Menampilkan hasil jumlah kemunculan dataOLT --}}
                        @php
                            // print_r($countDataOLT);
                        @endphp
                    </tbody>

                </table>
        </table>
    </div>

    <!-- MODAL OLT-->
    <div class="modal fade" id="modalOLT" tabindex="-1" aria-labelledby="modalOLTLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header pb-2 mx-2">
                    <h1 class="modal-title fs-5" id="modalOLTLabelLabel">
                        <b>OLT REGION</b> | <span title="region">{{ $region }}</span>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="olt-modal-close" style="margin-bottom:-5px;"></button>
                </div>
                <div class="modal-body pt-0">
                    <div class="col-12">
                        <div class="row">
                            <div class="d-sm-flex justify-content-start align-items-center my-3">
                                <label for="oltModalTitle" class="ms-2 col-form-label fw-bold">Olt Code : <h4
                                        id="olt-9" class="ms-2 col-form-label fw-bold"></h4> </label>
                                <div title="Kode olt" class="ms-2 col-form-label" id="oltModalTitle"></div>
                            </div>
                            <hr class="mb-0">
                        </div>
                        <div class="col-lg-12 col-sm-12 table-responsive pt-lg-3" id="myTableOLT">
                            <table class="table" id="detail-olt">
                                <tbody>
                                    <tr>
                                        <th>Label Lapangan</th>
                                        <td id="olt-0"></td>
                                        <th>LABEL ICRM</th>
                                        <td id="olt-1"></td>

                                    </tr>
                                    <tr>
                                        <th>INISIAL ODP</th>
                                        <td id="olt-3"></td>
                                        <th>JENIS ODP</th>
                                        <td id="olt-4"></td>
                                    </tr>
                                    <tr>
                                        <th>KOORDINAT</th>
                                        <td id="olt-7"></td>
                                        <th>STATUS FAT</th>
                                        <td id="olt-8"></td>
                                    </tr>
                                    <tr>
                                        <th>HOSTNAME OLT</th>
                                        <td id="olt-9"></td>
                                        <th>BRAND OLT</th>
                                        <td id="olt-10"></td>
                                    </tr>
                                    <tr>
                                        <th>ASAL OLT</th>
                                        <td id="olt-11"></td>
                                        <th>BASE OLT</th>
                                        <td id="olt-12"></td>
                                    </tr>
                                    <tr>
                                        <th>KAB/KOTA</th>
                                        <td id="olt-14"></td>
                                        <th>CLUSTER</th>
                                        <td id="olt-15"></td>
                                    </tr>
                                    <tr>
                                        <th>KAPASITAS</th>
                                        <td id="olt-16"></td>
                                        <th>HC</th>
                                        <td id="olt-17"></td>

                                    </tr>
                                    <tr>
                                        <th>IDLE</th>
                                        <td id="olt-18"></td>
                                        <th>UTILITY</th>
                                        <td id="olt-19"></td>
                                    <tr>
                                        <th>TANGGAL INSTALASI</th>
                                        <td id="olt-20"></td>
                                        <th>TANGGAL INSTALASI2</th>
                                        <td id="olt-21"></td>
                                    </tr>

                                    <tr>
                                      
                                        <th>Jumlah Fat</th>
                                        <td id="olt-22"></td>
                                    </tr>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="result" class="col-lg-12 col-sm-12 table-responsive pt-lg-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
